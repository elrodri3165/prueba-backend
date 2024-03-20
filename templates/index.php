<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="mt-5 mb-5">
                <p class="fs-3">Este proyecto lo realize con php nativo, me ayude de algunas clases de desarrollo propio que utilizo para hacer proyectos con una estructura MVC</p>
                <p class="fs-3">Los ENDPOINTS solicitados responden al método post</p>
            </div>

            <h3>CRUD USERS</h3>
            <div class="mb-3">
                <p class="fs-6 m-0">CREATE USER</p>
                <p class="fs-6 m-0">Parámetros: string fullname, string email, string pass, int openid</p>
                <a class="link" href="{ruta}create-user">{ruta}create-user</a>  
            </div>

            <div class="mb-3">
                <p class="fs-6 m-0">READ USERS</p>
                <p class="fs-6 m-0">Sin parámetros</p>
                <a class="link" href="{ruta}create-user">{ruta}read-users</a>
            </div>

            <div class="mb-3">
                <p class="fs-6 m-0">UPDATE USER</p>
                <p class="fs-6 m-0">Parámetros: int id, string fullname, string email, string pass, int openid, DateTime update_date</p>
                <a class="link" href="{ruta}update-user">{ruta}update-users</a>
            </div>

            <div class="mb-3">
                <p class="fs-6 m-0">DELETE USER</p>
                <p class="fs-6 m-0">Parámetros: int id</p>
                <a class="link" href="{ruta}delete-user">{ruta}delete-users</a>
            </div>

            <hr>
            <h3>CRUD USERS_COMMENT</h3>
            <div class="mb-3">
                <p class="fs-6 m-0">CREATE USER_COMMENT</p>
                <p class="fs-6 m-0">Parámetros: int id, int user, string coment_text, int likes</p>
                <a class="link mb-5" href="{ruta}create-user">{ruta}create-user</a>  
            </div>

            <div class="mb-3">
                <p class="fs-6 m-0">READ USER_COMMENTS</p>
                <p class="fs-6 m-0">Parámetros: sin parámetros</p>
                <a class="link mb-5" href="{ruta}create-user">{ruta}read-users</a>
            </div>

            <div class="mb-3">
                <p class="fs-6 m-0">UPDATE USER_COMMENT</p>
                <p class="fs-6 m-0">Parámetros: int id, int user, string coment_text, int likes, DateTime update_date</p>
                <a class="link mb-5" href="{ruta}update-user">{ruta}update-users</a>
            </div>

            <div class="mb-3">
                <p class="fs-6 m-0">DELETE USER_COMMENT</p>
                <p class="fs-6 m-0">Parámetros: int id</p>
                <a class="link mb-5" href="{ruta}delete-user">{ruta}delete-users</a>
            </div>

        </div>
    </main>
</div>