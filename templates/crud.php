<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">ABM categorias del cuerpo de Bomberos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{ruta}">Menu principal</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="h3">Bienvenidos</p>
                    <p>Este proyecto lo realize con php nativo, me ayude de algunas clases de desarrollo propio que utilizo para hacer proyectos con una estructura MVC</p>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Llamar a la función para cargar los registros cuando la página cargue
    cargarRegistros();
});

function cargarRegistros() {
    fetch('/read-users')
        .then(response => response.json())
        .then(data => {
            // Llamar a la función para insertar los registros en la tabla
            insertarRegistrosEnTabla(data);
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
        `;
        tableBody.appendChild(row);
    });
}
</script>