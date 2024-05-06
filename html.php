<?php
include "Calculadora.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body class="text-bg-dark p-3">
    <form action="" method="post">
        <p class="text-center fs-1 fw-bold">Calculadora PHP</p>
        <div class="container text-center">
            <div class="row align-items-center">
                <p>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Numero 1</span>
                    <input type="number" name="valor1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                </p>
                <p>
                </p>
                <p>
                    <select class="form-select" aria-label="Default select example" id="operacao" name="operacao">
                        <option selected>Selecione a operacao</option>
                        <option value="+">Adição(+)</option>
                        <option value="-">Subtração(-)</option>
                        <option value="*">Multiplicação(*)</option>
                        <option value="/">Divisão(/)</option>
                        <option value="**">Potência(**)</option>
                        <option value="!">Fatorial(!)</option>
                    </select>
                </p>

                <div class="input-group mb-3 col">
                    <span class="input-group-text" id="inputGroup-sizing-default">Numero 2</span>
                    <input type="number" name="valor2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="salvar">Calcular</button>
        <button type="submit" class="btn btn-light" name="apagar_historico">Apagar Historico</button>
        <p>
        <div class="d-inline p-1 text-bg-success fs-3 ">Resultado:
            <?php echo "{$valor1} {$operacao} {$valor2} = {$resultado}" ?></div>
        </p>
        <div class="text-center p-1 text-bg-light fs-3 ">Histórico:
            <ul>
                <?php
                if (isset($_SESSION['historico'])) {
                    foreach ($_SESSION['historico'] as $item) {
                        echo "<li>{$item}</li>";
                    }
                }
                ?>
            </ul>
        </div>
        </div>
</body>
</html>
