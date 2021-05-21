<?php include_once (VIEWS.'header.php')?>
<div class="card" id="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Iniciar Sesión</a></li>
            <li class="breadcrumb-item"><a href="#">Datos de Envío</a></li>
            <li class="breadcrumb-item"><a href="#">Forma de Pago</a></li>
            <li class="breadcrumb-item"><a href="#">Verificar datos</a></li>
            <li class="breadcrumb-item">Gracias</li>
        </ol>
    </nav>
    <h2>Estimado/a <?= $data['data']->first_name ?></h2>
    <h4>
        ¡Gracias por su visita y hacer una compra! Estamos contentos de que haya encontrado lo que buscaba.
        Nuestro objetivo es que siempre esté satisfecho. Esperamos volver a verlo/a pronto.
    </h4>
    <h3>¡Qué tenga un buen día!</h3>
    <br>
    &nbsp;
    <br>
    <h3>Atentamente:</h3>
    <br>
    <h3>Sus amigos de MVCTienda</h3>
    <br>
    <div class="text-left">
        <a href="<?= ROOT ?>shop" class="btn btn-success" role="button">Regresar a la tienda</a>
    </div>
</div>
<?php include_once (VIEWS.'footer.php')?>

