<?php include_once (VIEWS.'header.php')?>
<div class="card" id="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Iniciar Sesión</a></li>
            <li class="breadcrumb-item"><a href="#">Datos de Envío</a></li>
            <li class="breadcrumb-item">Forma de Pago</li>
            <li class="breadcrumb-item"><a href="#">Verificar datos</a></li>
        </ol>
    </nav>
    <div class="card-header">
        <h1><?= $data['subtitle'] ?></h1>
        <p>Por favor, elija la forma de pago</p>
    </div>
    <div class="card-body">
        <form action="<?= ROOT ?>cart/verify/" method="post">
            <div class="radio">
                <label><input type="radio" name="payment" value="cc1">Tarjeta de crédito MasterCard</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="payment" value="cc2">Tarjeta de crédito Visa</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="payment" value="dc">Tarjeta de débito</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="payment" value="cash">Efectivo</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="payment" value="paypal">Paypal</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="payment" value="bitcoins">Bitcoins</label>
            </div>
            <div class="form-group text-left">
                <input type="submit" value="Enviar datos" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
<?php include_once (VIEWS.'footer.php')?>

