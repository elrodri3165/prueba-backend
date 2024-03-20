<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">ABM USERS COMMENTS</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{ruta}">Menu principal</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="h3">Bienvenidos</p>
                
                    
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCreateUserComment">
                        Agregar nuevo comentario
                    </button>

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabla
                </div>
                <div class="card-body">
                    <!--CONTENIDO DE TABLA-->
                    <table id="table" class="table table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Comentario</th>
                                <th scope="col">Likes</th>
                                <th scope="col">Actulizar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Desarrollado por <a href="https://rgweb.com.ar/">RGWeb.com.ar</a></div>
                <div>

                </div>
            </div>
        </div>
    </footer>
</div>


<!-- Modal -->
<div class="modal fade" id="modalCreateUserComment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar nuevo comentario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form-create-user-comment">

                    <input type="hidden" name="" id="id" value="">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="label-user">User</span>
                        <select class="form-control" id="user">

                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="label-comment-text">Comentario</span>
                        <textarea class="form-control" id="comment-text" aria-label="Comment-text" aria-describedby="Comment-text"></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="label-likes">Likes</span>
                        <input type="number" class="form-control" id="likes" aria-label="Likes" aria-describedby="Likes">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                <button type="button" class="btn btn-dark" id="btn-create-user-comment">Agregar</button>
            </div>
        </div>
    </div>
</div>

<script>

    var modal = document.getElementById('modalCreateUserComment');

    function CleanFormUserComment(){
        document.getElementById('id').value = null;
        document.getElementById('comment-text').value = null;
        document.getElementById('likes').value = null;
        
    }

    function abrirModal(clean = true) {
        var myModal = new bootstrap.Modal(modal);
        myModal.show();
        if(clean == true){
            CleanFormUserComment();
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        cargarRegistros();
        cargarUsers();
    });

    function cargarUsers(){
        fetch('/read-users')
            .then(response => response.json())
            .then(data => {
                if (data != null) {
                    var select = document.getElementById('user');
                    for (let i = 0; i < data.length; i++) {
                        var option = document.createElement('option');
                        option.value = data[i].id; // Asignar el value desde data[i][id]
                        option.text = data[i].fullname; // Asignar el texto desde data[i][fullname]
                        select.appendChild(option); // Agregar la opción a
                    }
                }
            })
            .catch(error => {
                console.error('Error al obtener los datos:', error);
            });
    }

    function cargarRegistros() {
        fetch('/read-user-comments')
            .then(response => response.json())
            .then(data => {
                if (data != null) {
                    insertarRegistrosEnTabla(data);
                }else{
                    document.querySelector('#table tbody').innerHTML = '';
                }
            })
            .catch(error => {
                console.error('Error al obtener los datos:', error);
            });
    }

    function insertarRegistrosEnTabla(registros) {
        const tableBody = document.querySelector('#table tbody');

        // Limpiar la tabla antes de insertar los nuevos registros
        tableBody.innerHTML = '';

        // Iterar sobre cada registro y crear una fila en la tabla para cada uno
        registros.forEach(registro => {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>${registro.id}</td>
            <td>${registro.user}</td>
            <td>${registro.coment_text}</td>
            <td>${registro.likes}</td>
            <td><button type="button" onclick="UpdateUserComment(${registro.id})" class="btn btn-success">Editar</button></td>
            <td><button type="button" onclick="DeleteUserComment(${registro.id})" class="btn btn-danger">Eliminar</button></td>
        `;
            tableBody.appendChild(row);
        });
    }


    function CreateUpdateUserComment() {
        var id = document.getElementById('id').value;
        var user = document.getElementById('user').value;
        var comment_text = document.getElementById('comment-text').value;
        var likes = document.getElementById('likes').value;
        var ruta;

        if(id == null || id == ''){
            ruta = 'create-user-comment/';
        }else{
            ruta = 'update-user-comment/'
        }

        var formData = new FormData();

        formData.append('id', id);
        formData.append('user', user);
        formData.append('comment_text', comment_text);
        formData.append('likes', likes);

        const http = new XMLHttpRequest();
        const URLdomain = window.location.host;
        
        const url = '/' + ruta;

        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != 'null') {
                    swal("Correcto!", "El registro se creó con éxito!", "success");
                    CleanFormUserComment();
                } else {
                    swal("Error!", "Ocurrió un error", "error");
                }
                cargarRegistros();
            }
        }

        http.open("POST", url);
        http.send(formData);
    }

    document.getElementById('btn-create-user-comment').addEventListener("click", function() {
        CreateUpdateUserComment();
    });

    function UpdateUserComment(id) {
        fetch('/read-user-comments')
            .then(response => response.json())
            .then(data => {
                if (data != null) {
                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['id'] == id) {
                            document.getElementById('id').value = data[i]['id'];
                            document.getElementById('user').value = data[i]['user'];
                            document.getElementById('comment-text').value = data[i]['coment_text'];
                            document.getElementById('likes').value = data[i]['likes'];
                            abrirModal(false);
                        }
                    }
                }
            })
            .catch(error => {
                console.error('Error al obtener los datos:', error);
            });
    }


    function DeleteUserComment(id){
        ruta = 'delete-user-comment/';
        
        var formData = new FormData();

        formData.append('id', id);

        const http = new XMLHttpRequest();
        const URLdomain = window.location.host;
        
        const url = '/' + ruta;

        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != 'null') {
                    swal("Correcto!", "El registro se eliminó con éxito!", "success");
                    CleanFormUserComment();
                } else {
                    swal("Error!", "Ocurrió un error", "error");
                }
                cargarRegistros();
            }
        }

        http.open("POST", url);
        http.send(formData);
    }
</script>