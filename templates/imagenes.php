<div class="container">
    <h2>Imágenes con PHP</h2>
    <h3 class="h3imagenes">Imágen Original</h3>
    <div class="col-3">
        <img src="img/unidad4.jpg" alt="">
    </div>

    <h3 class="h3imagenes">Imágen con marca de agua</h3>
    <div class="col-3">
        <img src="functions/marcadeagua.php?archivo=unidad4.jpg" alt="">
    </div>

    <h3 class="h3imagenes">Imágen a eleccion con marca de agua</h3>
    <div class="col-3">
        <img src="functions/marcadeagua.php?archivo=apple.jpg" alt="">
    </div>

    <h3 class="h3imagenes">Vista previa de 150px x 150px tamaño fijo</h3>
    <div class="col-3">


        <?php
        $foto="img/unidad4.jpg";
        $fuente=@imagecreatefromjpeg($foto);
        $alto=$ancho=150;//defino el alto y ancho nuevo
        
        $img_ancho = imagesx($fuente);
        $img_alto = imagesy($fuente);
        
        $imagen = imagecreate($ancho,$alto); 
        imagecopyresized($imagen,$fuente,0,0,0,0,$ancho,$alto,$img_ancho,$img_alto);
        imagegif($imagen,"img/imagen_2.png");
        echo'<img src="img/imagen_2.png">';
        ?>
    </div>

    <div class="container">
        <p>Para achicar una imagen dinamicamente llamar a la funcion en la SRC de la foto</p>
        <p>Pasar por paramtro (foto) el nombre de la foto </p>
        <p>img src="functions/thumbnail.php?foto=tablero.jpg" alt=""></p>

        <div class="col-4">
            <img src="functions/thumbnail.php?foto=tablero.jpg" alt="">
        </div>
    </div>

</div>