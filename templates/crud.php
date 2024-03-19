<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">ABM USERS</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{ruta}">Menu principal</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="h3">Bienvenidos</p>
                    <p>Este proyecto lo realize con php nativo, me ayude de algunas clases de desarrollo propio que utilizo para hacer proyectos con una estructura MVC</p>


                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCreateUser">
                        Agregar nuevo user
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
                                <th scope="col">FullName</th>
                                <th scope="col">Email</th>
                                <th scope="col">Pass</th>
                                <th scope="col">OpenId</th>
                                <th scope="col">Cration Date</th>
                                <th scope="col">Update Date</th>
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
<div class="modal fade" id="modalCreateUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar nuevo user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form-create-user">

                    <input type="hidden" name="" id="id" value="">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="label-fullname">FullName</span>
                        <input type="text" class="form-control" id="fullname" aria-label="Fullname" aria-describedby="Fullname">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="label-email">Email</span>
                        <input type="email" class="form-control" id="email" aria-label="Email" aria-describedby="Email">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="label-email">Pass</span>
                        <input type="password" class="form-control" id="pass" aria-label="Pass" aria-describedby="Pass">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="lebel-openid">OpenId</span>
                        <input type="number" class="form-control" id="openid" aria-label="OpenId" aria-describedby="OpenId">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                <button type="button" class="btn btn-dark" id="btn-create-user">Agregar</button>
            </div>
        </div>
    </div>
</div>

<script>

    var modal = document.getElementById('modalCreateUser');

    function CleanFormUser(){
        document.getElementById('id').value = null;
        document.getElementById('fullname').value = null;
        document.getElementById('email').value = null;
        document.getElementById('pass').value = null;
        document.getElementById('openid').value = null;
    }

    function abrirModal(clean = true) {
        var myModal = new bootstrap.Modal(modal);
        myModal.show();
        if(clean == true){
            CleanFormUser();
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        cargarRegistros();
    });

    function cargarRegistros() {
        fetch('/read-users')
            .then(response => response.json())
            .then(data => {
                if (data != null) {
                    insertarRegistrosEnTabla(data);
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
            <td>${registro.fullname}</td>
            <td>${registro.email}</td>
            <td>${registro.pass}</td>
            <td>${registro.openid}</td>
            <td>${registro.creation_date}</td>
            <td>${registro.update_date}</td>
            <td><button type="button" onclick="UpdateUser(${registro.id})" class="btn btn-success">Editar</button></td>
            <td><button type="button" onclick="DeleteUser(${registro.id})" class="btn btn-danger">Eliminar</button></td>
        `;
            tableBody.appendChild(row);
        });
    }


    function CreateUpdateUser() {
        var id = document.getElementById('id').value;
        var fullname = document.getElementById('fullname').value;
        var email = document.getElementById('email').value;
        var pass = document.getElementById('pass').value;
        var openid = document.getElementById('openid').value;

        if(id == null || id == ''){
            var ruta = 'create-user/';
        }else{
            var ruta = 'update-user/'
        }

        var formData = new FormData();

        formData.append('fullname', fullname);
        formData.append('email', email);
        formData.append('pass', pass);
        formData.append('openid', openid);

        const http = new XMLHttpRequest();
        const URLdomain = window.location.host;
        
        const url = 'http://' + URLdomain + '/' + ruta;

        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != 'null') {
                    swal("Correcto!", "El registro se creó con éxito!", "success");
                    CleanFormUser();
                } else {
                    swal("Error!", "Ocurrió un error", "error");
                }
                cargarRegistros();
            }
        }

        http.open("POST", url);
        http.send(formData);
    }

    document.getElementById('btn-create-user').addEventListener("click", function() {
        CreateUpdateUser();
    });

    function UpdateUser(id) {
        fetch('/read-users')
            .then(response => response.json())
            .then(data => {
                if (data != null) {
                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['id'] == id) {
                            document.getElementById('fullname').value = data[i]['fullname'];
                            document.getElementById('email').value = data[i]['email'];
                            document.getElementById('pass').value = data[i]['pass'];
                            document.getElementById('openid').value = data[i]['openid'];
                            abrirModal(false);
                        }
                    }
                }
            })
            .catch(error => {
                console.error('Error al obtener los datos:', error);
            });
    }
</script>