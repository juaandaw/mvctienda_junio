<?php include_once (VIEWS.'header.php')?>
    <div class="card" id="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Iniciar Sesión</a></li>
                <li class="breadcrumb-item">Datos de Envío</li>
                <li class="breadcrumb-item"><a href="#">Forma de Pago</a></li>
                <li class="breadcrumb-item"><a href="#">Verificar datos</a></li>
            </ol>
        </nav>
        <div class="card-header">
            <h1><?= $data['subtitle'] ?></h1>
            <p>Por favor, compruebe los datos de envío y cambie lo que considere necesario</p>
        </div>
        <div class="row">
            <div class="card-body col-3">
                <h4>Direccion de envio por defecto</h4>
                <div class="form-group text-left">
                    <label for="first_name">Nombre:</label>
                    <?= $data['data']->first_name ?? '' ?>
                </div>
                <div class="form-group text-left">
                    <label for="last_name_1">Primer apellido:</label>
                    <?= $data['data']->last_name_1 ?? '' ?>
                </div>
                <div class="form-group text-left">
                    <label for="last_name_2">Segundo apellido:</label>
                    <?= $data['data']->last_name_2 ?? '' ?>
                </div>
                <div class="form-group text-left">
                    <label for="email">Correo electrónico:</label>
                    <?= $data['data']->email ?? '' ?>
                </div>
                <div class="form-group text-left">
                    <label for="address">Dirección:</label>
                    <?= $data['data']->address ?? '' ?>
                </div>
                <div class="form-group text-left">
                    <label for="city">Ciudad:</label>
                    <?= $data['data']->city ?? '' ?>
                </div>
                <div class="form-group text-left">
                    <label for="state">Provincia:</label>
                    <?= $data['data']->state ?? '' ?>
                </div>
                <div class="form-group text-left">
                    <label for="zipcode">Código postal:</label>
                    <?= $data['data']->zipcode ?? '' ?>
                </div>
                <div class="form-group text-left">
                    <label for="country">País:</label>
                    <?= $data['data']->country ?? '' ?>
                </div>
            </div>
            <form action="<?= ROOT ?>cart/paymentmode" method="post">
            <?php foreach ($data['addresses'] as $addresses): ?>
            <button class="btn btn-warning" name="<?=$addresses->id ?>" value="<?=$addresses->id?>" type="submit">
                <div class="card-body-3">
                    <h4>Direcciones guardadas</h4>
                    <div class="form-group text-left">
                        <label for="first_name">Nombre:</label>
                        <?= $addresses->first_name ?? '' ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="last_name_1">Primer apellido:</label>
                        <?= $addresses->last_name_1 ?? '' ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="last_name_2">Segundo apellido:</label>
                        <?= $addresses->last_name_2 ?? '' ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="email">Correo electrónico:</label>
                        <?= $addresses->email ?? '' ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="address">Dirección:</label>
                        <?= $addresses->address ?? '' ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="city">Ciudad:</label>
                        <?= $addresses->city ?? '' ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="state">Provincia:</label>
                        <?= $addresses->state ?? '' ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="zipcode">Código postal:</label>
                        <?= $addresses->zipcode ?? '' ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="country">País:</label>
                        <?= $addresses->country ?? '' ?>
                    </div>
                </div>
            </button>
                <?php endforeach; ?>
            </form>
        </div>

    </div>
    <div class="form-group text-left col-12 mt-3">
        <a href="<?=ROOT?>cart/addresses" class="btn btn-warning">Cambiar direccion de envio</a>
        <a href="<?=ROOT?>cart/paymentmode" class="btn btn-success">Enviar datos</a>
    </div>
    </form>
<?php include_once (VIEWS.'footer.php')?>