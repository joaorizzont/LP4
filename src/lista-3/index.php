<?php

$tipo = $_POST["tipo"] ?? "";
$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function calcularResultado($tipo)
    {
        $num1 = (int) ($_POST["num1"] ?? 0);
        $num2 = (int) ($_POST["num2"] ?? 0);
        $num3 = (int) ($_POST["num3"] ?? 0);
        $num4 = (int) ($_POST["num4"] ?? 0);
        $num5 = (int) ($_POST["num5"] ?? 0);
        $num6 = (int) ($_POST["num6"] ?? 0);
        $num7 = (int) ($_POST["num7"] ?? 0);
        $produto = (float) ($_POST["produto"] ?? 0);
        $mes = (int) ($_POST["mes"] ?? 0);

        switch ($tipo) {
            case "menorValor":
                $numeros = [$num1, $num2, $num3, $num4, $num5, $num6, $num7];
                $menor = min($numeros);
                $posicao = array_search($menor, $numeros) + 1;
                return "Menor valor: $menor, Posição: $posicao";
                
            case "somaTriplo":
                return $num1 == $num2 ? 3 * ($num1 + $num2) : $num1 + $num2;
                
            case "ordemCrescente":
                if ($num1 == $num2) {
                    return "Números iguais: $num1";
                } else {
                    $numeros = [$num1, $num2];
                    sort($numeros);
                    return implode(" ", $numeros);
                }

            case "desconto":
                return $produto > 100 ? $produto * 0.85 : $produto;
                
            case "mesNome":
                switch ($mes) {
                    case 1: return "Janeiro";
                    case 2: return "Fevereiro";
                    case 3: return "Março";
                    case 4: return "Abril";
                    case 5: return "Maio";
                    case 6: return "Junho";
                    case 7: return "Julho";
                    case 8: return "Agosto";
                    case 9: return "Setembro";
                    case 10: return "Outubro";
                    case 11: return "Novembro";
                    case 12: return "Dezembro";
                    default: return "Mês inválido";
                }

            case "loopFor":
                $result = "";
                for ($i = 1; $i <= $num1; $i++) {
                    $result .= $i . " ";
                }
                return rtrim($result);

            case "loopWhile":
                $soma = 0;
                $i = 1;
                while ($i <= $num1) {
                    $soma += $i;
                    $i++;
                }
                return $soma;

            case "loopDoWhile":
                $result = "";
                $i = $num1;
                do {
                    $result .= $i . " ";
                    $i--;
                } while ($i >= 1);
                return rtrim($result);

            case "fatorial":
                $fatorial = 1;
                for ($i = 1; $i <= $num1; $i++) {
                    $fatorial *= $i;
                }
                return $fatorial;

            case "tabuada":
                $result = "";
                for ($i = 1; $i <= 10; $i++) {
                    $result .= $num1 . " x " . $i . " = " . ($num1 * $i) . "<br>";
                }
                return $result;
        }
    }

    if (!empty($_POST["tipo"]) && !empty(array_filter($_POST))) {
        $resultado = calcularResultado($_POST["tipo"]);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Exercícios 3 - PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Lista de Exercícios 3 - PHP</h1>

        <form method="POST" class="space-y-4">
            <label class="block text-lg font-medium">Escolha o cálculo:</label>
            <select name="tipo" onchange="this.form.submit()" class="w-full p-2 border rounded-lg">
                <option value="">-- Selecione --</option>
                <option value="menorValor" <?= ($tipo == "menorValor") ? "selected" : "" ?>>Menor Valor e Posição</option>
                <option value="somaTriplo" <?= ($tipo == "somaTriplo") ? "selected" : "" ?>>Soma ou Triplo da Soma</option>
                <option value="ordemCrescente" <?= ($tipo == "ordemCrescente") ? "selected" : "" ?>>Ordem Crescente</option>
                <option value="desconto" <?= ($tipo == "desconto") ? "selected" : "" ?>>Desconto em Produto</option>
                <option value="mesNome" <?= ($tipo == "mesNome") ? "selected" : "" ?>>Nome do Mês</option>
                <option value="loopFor" <?= ($tipo == "loopFor") ? "selected" : "" ?>>Loop For (1 até o número)</option>
                <option value="loopWhile" <?= ($tipo == "loopWhile") ? "selected" : "" ?>>Loop While (Soma até o número)</option>
                <option value="loopDoWhile" <?= ($tipo == "loopDoWhile") ? "selected" : "" ?>>Loop Do-While (Contagem regressiva)</option>
                <option value="fatorial" <?= ($tipo == "fatorial") ? "selected" : "" ?>>Fatorial</option>
                <option value="tabuada" <?= ($tipo == "tabuada") ? "selected" : "" ?>>Tabuada</option>
            </select>

            <?php if ($tipo == "menorValor"): ?>
                <input type="number" name="num1" placeholder="Número 1" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num2" placeholder="Número 2" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num3" placeholder="Número 3" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num4" placeholder="Número 4" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num5" placeholder="Número 5" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num6" placeholder="Número 6" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num7" placeholder="Número 7" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "somaTriplo"): ?>
                <input type="number" name="num1" placeholder="Número 1" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num2" placeholder="Número 2" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "ordemCrescente"): ?>
                <input type="number" name="num1" placeholder="Número A" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num2" placeholder="Número B" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "desconto"): ?>
                <input type="number" name="produto" placeholder="Valor do Produto" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "mesNome"): ?>
                <input type="number" name="mes" placeholder="Número do Mês" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "loopFor" || $tipo == "loopWhile" || $tipo == "loopDoWhile" || $tipo == "fatorial" || $tipo == "tabuada"): ?>
                <input type="number" name="num1" placeholder="Número" required class="w-full p-2 border rounded-lg">
            <?php endif; ?>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Calcular</button>
        </form>

        <?php if (isset($resultado)): ?>
            <h2 class="text-xl font-semibold text-center mt-6">Resultado:
                <span class="text-blue-600"><?php echo $resultado; ?></span>
            </h2>
        <?php endif; ?>
    </div>
</body>

</html>
