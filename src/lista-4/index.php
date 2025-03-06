<?php

declare(strict_types=1);

function contarCaracteres(string $palavra): int
{
    return strlen($palavra);
}

function mostrarMaiusculoMinusculo(string $palavra): array
{
    return [
        'maiúsculo' => strtoupper($palavra),
        'minúsculo' => strtolower($palavra)
    ];
}

function verificarSubString(string $palavra1, string $palavra2): bool
{
    return strpos($palavra1, $palavra2) !== false;
}

function validarData(int $dia, int $mes, int $ano): string
{
    return checkdate($mes, $dia, $ano) ? sprintf("%02d/%02d/%04d", $dia, $mes, $ano) : "Data inválida";
}

function raizQuadrada(float $numero): float
{
    return sqrt($numero);
}

function arredondarNumero(float $numero): float
{
    return round($numero);
}

function diferencaDatas(string $data1, string $data2): int
{
    $data1 = DateTime::createFromFormat('d/m/Y', $data1);
    $data2 = DateTime::createFromFormat('d/m/Y', $data2);

    if (!$data1 || !$data2) {
        throw new InvalidArgumentException("Formato de data inválido. Use dd/mm/yyyy.");
    }

    $intervalo = $data1->diff($data2);
    return $intervalo->days;
}

$caracteres = null;
$maiusculoMinusculo = null;
$subString = null;
$dataFormatada = null;
$raizQuadrada = null;
$numeroArredondado = null;
$difDias = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['palavra'])) {
        $caracteres = contarCaracteres($_POST['palavra']);
        $maiusculoMinusculo = mostrarMaiusculoMinusculo($_POST['palavra']);
    }

    if (!empty($_POST['palavra1']) && !empty($_POST['palavra2'])) {
        $subString = verificarSubString($_POST['palavra1'], $_POST['palavra2']);
    }

    if (!empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['ano'])) {
        $dataFormatada = validarData((int)$_POST['dia'], (int)$_POST['mes'], (int)$_POST['ano']);
    }

    if (!empty($_POST['numero'])) {
        $raizQuadrada = raizQuadrada((float)$_POST['numero']);
    }

    if (!empty($_POST['flutuante'])) {
        $numeroArredondado = arredondarNumero((float)$_POST['flutuante']);
    }

    if (!empty($_POST['data1']) && !empty($_POST['data2'])) {
        try {
            $difDias = diferencaDatas($_POST['data1'], $_POST['data2']);
        } catch (InvalidArgumentException $e) {
            $difDias = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Exercícios 4 - PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Lista de Exercícios 4 - PHP</h1>

        <form method="POST" class="space-y-4">


            <label class="block text-lg font-medium">Digite uma palavra:</label>
            <input type="text" name="palavra" placeholder="Digite a palavra" required class="w-full p-2 border rounded-lg">

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Verificar Caracteres</button>
            <?php if (isset($caracteres)): ?>
                <p class="text-center mt-4">Número de caracteres: <?= $caracteres ?></p>
            <?php endif; ?>


            <label class="block text-lg font-medium">Digite uma palavra:</label>
            <input type="text" name="palavra" placeholder="Digite a palavra" required class="w-full p-2 border rounded-lg">

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Maiúsculo e Minúsculo</button>
            <?php if (isset($maiusculoMinusculo)): ?>
                <p class="text-center mt-4">Maiúsculo: <?= $maiusculoMinusculo['maiúsculo'] ?><br>Minúsculo: <?= $maiusculoMinusculo['minúsculo'] ?></p>
            <?php endif; ?>


            <label class="block text-lg font-medium">Digite a primeira palavra:</label>
            <input type="text" name="palavra1" placeholder="Digite a primeira palavra" required class="w-full p-2 border rounded-lg">

            <label class="block text-lg font-medium">Digite a segunda palavra:</label>
            <input type="text" name="palavra2" placeholder="Digite a segunda palavra" required class="w-full p-2 border rounded-lg">

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Verificar Substring</button>
            <?php if (isset($subString)): ?>
                <p class="text-center mt-4"><?= $subString ? "A segunda palavra está contida na primeira." : "A segunda palavra não está contida na primeira." ?></p>
            <?php endif; ?>


            <label class="block text-lg font-medium">Digite o dia:</label>
            <input type="number" name="dia" placeholder="Dia" required class="w-full p-2 border rounded-lg">

            <label class="block text-lg font-medium">Digite o mês:</label>
            <input type="number" name="mes" placeholder="Mês" required class="w-full p-2 border rounded-lg">

            <label class="block text-lg font-medium">Digite o ano:</label>
            <input type="number" name="ano" placeholder="Ano" required class="w-full p-2 border rounded-lg">

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Validar Data</button>
            <?php if (isset($dataFormatada)): ?>
                <p class="text-center mt-4">Data formatada: <?= $dataFormatada ?></p>
            <?php endif; ?>


            <label class="block text-lg font-medium">Digite um número:</label>
            <input type="number" name="numero" placeholder="Digite o número" required class="w-full p-2 border rounded-lg">

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Calcular Raiz Quadrada</button>
            <?php if (isset($raizQuadrada)): ?>
                <p class="text-center mt-4">Raiz quadrada: <?= $raizQuadrada ?></p>
            <?php endif; ?>


            <label class="block text-lg font-medium">Digite um número decimal:</label>
            <input type="number" name="flutuante" placeholder="Digite o número" required class="w-full p-2 border rounded-lg">

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Arredondar Número</button>
            <?php if (isset($numeroArredondado)): ?>
                <p class="text-center mt-4">Número arredondado: <?= $numeroArredondado ?></p>
            <?php endif; ?>


            <label class="block text-lg font-medium">Digite a primeira data (dd/mm/YYYY):</label>
            <input type="text" name="data1" placeholder="dd/mm/YYYY" required class="w-full p-2 border rounded-lg">

            <label class="block text-lg font-medium">Digite a segunda data (dd/mm/YYYY):</label>
            <input type="text" name="data2" placeholder="dd/mm/YYYY" required class="w-full p-2 border rounded-lg">

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Calcular Diferença de Dias</button>
            <?php if (isset($difDias)): ?>
                <p class="text-center mt-4">Diferença em dias: <?= $difDias ?> dias</p>
            <?php endif; ?>

        </form>
    </div>
</body>

</html>