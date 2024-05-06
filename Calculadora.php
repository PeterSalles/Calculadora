<?php
session_start();

// Função para realizar a adição
function adicao($valor1, $valor2)
{
    if (is_numeric($valor1) && is_numeric($valor2)) {
        return $valor1 + $valor2;
    } else {
        return "Valores inválidos";
    }
}

// Função para realizar a subtração
function subtracao($valor1, $valor2)
{
    if (is_numeric($valor1) && is_numeric($valor2)) {
        return $valor1 - $valor2;
    } else {
        return "Valores inválidos";
    }
}

// Função para realizar a multiplicação
function multiplicacao($valor1, $valor2)
{
    if (is_numeric($valor1) && is_numeric($valor2)) {
        return $valor1 * $valor2;
    } else {
        return "Valores inválidos";
    }
}

// Função para realizar a divisão
function Divisao($valor1, $valor2)
{
    if (is_numeric($valor1) && is_numeric($valor2) && $valor2 != 0) {
        return $valor1 / $valor2;
    } else {
        return "Divisor é zero ou valores inválidos";
    }
}

// Função para realizar a potenciação
function potenciacao($valor1, $valor2)
{
    if (is_numeric($valor1) && is_numeric($valor2)) {
        return $valor1 ** $valor2;
    } else {
        return "Valores inválidos";
    }
}

// Função para calcular o fatorial
function fatorial($valor1)
{
    if (is_numeric($valor1)) {
        $fatorial = 1;
        for ($i = $valor1; $i >= 1; $i--) {
            $fatorial *= $i;
        }
        return $fatorial;
    } else {
        return "Valor inválido";
    }
}

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se a operação foi selecionada
    if (isset($_POST["operacao"])) {
        $operacao = $_POST["operacao"];
        $operacaoselecionada = true;
    } else {
        $operacao = "Selecione o operador";
        $operacaoselecionada = false;
    }

    // Obtém e valida o valor1
    if (isset($_POST["valor1"]) || $operacaoselecionada == true) {
        $valor1 = floatval($_POST["valor1"]);
    } else {
        $valor1 = "";
    }

    // Obtém e valida o valor2
    if (isset($_POST["valor2"]) || $operacaoselecionada == true) {
        $valor2 = floatval($_POST["valor2"]);
    } else {
        $valor2 = "";
    }
}

// Limpa os valores padrão de 0
if ($valor1 == 0) {
    $valor1 = "";
}
if ($valor2 == 0) {
    $valor2 = "";
}

// Se um dos valores for 0, limpa a operação
if ($valor1 == 0 || $valor2 == 0) {
    $operacao = "";
}

// Inicializa o resultado como 0
$resultado = 0;

// Realiza a operação selecionada
if (isset($operacao)) {
    switch ($operacao) {
        case '-':
            $resultado = subtracao($valor1, $valor2);
            break;
        case '+':
            $resultado = adicao($valor1, $valor2);
            break;
        case '*':
            $resultado = multiplicacao($valor1, $valor2);
            break;
        case '/':
            $resultado = Divisao($valor1, $valor2);
            break;
        case '**':
            $resultado = potenciacao($valor1, $valor2);
            break;
        case '!':
            $resultado = fatorial($valor1);
            break;
        default:
            $resultado = "";
            break;
    }
} else {
    $operacao = "Null";
}

// Salva a expressão e o resultado no histórico
if (isset($_POST['salvar'])) {
    $_SESSION['historico'][] = "{$valor1} {$operacao} {$valor2} = {$resultado}";
}

// Limpa o histórico se o botão "Apagar Histórico" for pressionado
if (isset($_POST['apagar_historico'])) {
    unset($_SESSION['historico']);
}
