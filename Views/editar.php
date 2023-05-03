<?php
include_once '../Config/config.php';
include_once '../Models/CalculadoraModel.php';

$data = new CalculadoraModel();
$registro = $data->getbyId($_REQUEST['id']);

foreach ($registro as $operacion) {
    $id        = $operacion->getId();
    $num_uno   = $operacion->num_uno;
    $num_dos   = $operacion->num_dos;
    $operador  = $operacion->operacion;
    $resultado = $operacion->resultado;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Editar Operación</title>
</head>

<body class="my-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Calculadora</h1>
                <hr>
                <!-- hola -->
                <!-- hkk -->
                <h3>Formulario para editar operaciones</h3>
                <form action="../Controllers/CalculadoraController.php" method="post">
                    <input type="hidden" name="c" value="3">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="mb-3">
                        <label for="num_uno" class="form-label">Número Uno</label>
                        <input type="number" class="form-control" id="num_uno" name="num_uno" value="<?= $num_uno ?>">
                    </div>
                    <div class="mb-3">
                        <label for="num_dos" class="form-label">Número Dos</label>
                        <input type="number" class="form-control" id="num_dos" name="num_dos" value="<?= $num_dos ?>">
                    </div>
                    <div class="mb-3">
                        <label for="operacion" class="form-label">Operación</label>
                        <select class="form-select" id="operacion" name="operacion" value="<?= '' ?>">
                            <option value="1">Sumar</option>
                            <option value="2">Restar</option>
                            <option value="3">Multiplicar</option>
                            <option value="4">Dividir</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>