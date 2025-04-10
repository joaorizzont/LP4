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
$tipo = $_POST['tipo'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($tipo === 'caracteres' && !empty($_POST['palavra'])) {
        $caracteres = contarCaracteres($_POST['palavra']);
    } elseif ($tipo === 'maiusculoMinusculo' && !empty($_POST['palavra'])) {
        $maiusculoMinusculo = mostrarMaiusculoMinusculo($_POST['palavra']);
    } elseif ($tipo === 'substring' && !empty($_POST['palavra1']) && !empty($_POST['palavra2'])) {
        $subString = verificarSubString($_POST['palavra1'], $_POST['palavra2']);
    } elseif ($tipo === 'validarData' && !empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['ano'])) {
        $dataFormatada = validarData((int)$_POST['dia'], (int)$_POST['mes'], (int)$_POST['ano']);
    } elseif ($tipo === 'raizQuadrada' && isset($_POST['numero'])) {
        $raizQuadrada = raizQuadrada((float)$_POST['numero']);
    } elseif ($tipo === 'arredondarNumero' && isset($_POST['flutuante'])) {
        $numeroArredondado = arredondarNumero((float)$_POST['flutuante']);
    } elseif ($tipo === 'diferencaDatas' && !empty($_POST['data1']) && !empty($_POST['data2'])) {
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
    <title>Lista de Exercícios 4 - PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-start min-h-screen py-10">
    <div class="w-full max-w-2xl px-4">
        <h1 class="text-3xl font-bold text-center mb-10">Lista de Exercícios 4 - PHP</h1>

        <form method="POST" class="mb-6 space-y-4 bg-white p-6 rounded-lg shadow">
            <label class="block mb-2 text-lg font-medium">Escolha um exercício:</label>
            <select name="tipo" class="w-full p-2 border rounded-lg" onchange="this.form.submit()">
                <option value="">-- Selecione --</option>
                <option value="caracteres" <?= $tipo === 'caracteres' ? 'selected' : '' ?>>Contar Caracteres</option>
                <option value="maiusculoMinusculo" <?= $tipo === 'maiusculoMinusculo' ? 'selected' : '' ?>>Maiúsculo e Minúsculo</option>
                <option value="substring" <?= $tipo === 'substring' ? 'selected' : '' ?>>Verificar Substring</option>
                <option value="validarData" <?= $tipo === 'validarData' ? 'selected' : '' ?>>Validar Data</option>
                <option value="raizQuadrada" <?= $tipo === 'raizQuadrada' ? 'selected' : '' ?>>Raiz Quadrada</option>
                <option value="arredondarNumero" <?= $tipo === 'arredondarNumero' ? 'selected' : '' ?>>Arredondar Número</option>
                <option value="diferencaDatas" <?= $tipo === 'diferencaDatas' ? 'selected' : '' ?>>Diferença entre Datas</option>
            </select>
        </form>

        <?php if ($tipo === 'caracteres'): ?>
            <form method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                <input type="hidden" name="tipo" value="caracteres">
                <input type="text" name="palavra" placeholder="Digite a palavra" required class="w-full p-2 border rounded-lg">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Verificar</button>
                <?php if ($caracteres !== null): ?>
                    <p class="text-center mt-2">Número de caracteres: <?= $caracteres ?></p>
                <?php endif; ?>
            </form>
        <?php elseif ($tipo === 'maiusculoMinusculo'): ?>
            <form method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                <input type="hidden" name="tipo" value="maiusculoMinusculo">
                <input type="text" name="palavra" placeholder="Digite a palavra" required class="w-full p-2 border rounded-lg">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Converter</button>
                <?php if ($maiusculoMinusculo !== null): ?>
                    <p class="text-center mt-2">Maiúsculo: <?= $maiusculoMinusculo['maiúsculo'] ?><br>Minúsculo: <?= $maiusculoMinusculo['minúsculo'] ?></p>
                <?php endif; ?>
            </form>
        <?php elseif ($tipo === 'substring'): ?>
            <form method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                <input type="hidden" name="tipo" value="substring">
                <input type="text" name="palavra1" placeholder="Digite a primeira palavra" required class="w-full p-2 border rounded-lg">
                <input type="text" name="palavra2" placeholder="Digite a segunda palavra" required class="w-full p-2 border rounded-lg">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Verificar</button>
                <?php if ($subString !== null): ?>
                    <p class="text-center mt-2"><?= $subString ? "A segunda palavra está contida na primeira." : "A segunda palavra não está contida na primeira." ?></p>
                <?php endif; ?>
            </form>
        <?php elseif ($tipo === 'validarData'): ?>
            <form method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                <input type="hidden" name="tipo" value="validarData">
                <input type="number" name="dia" placeholder="Dia" required class="w-full p-2 border rounded-lg">
                <input type="number" name="mes" placeholder="Mês" required class="w-full p-2 border rounded-lg">
                <input type="number" name="ano" placeholder="Ano" required class="w-full p-2 border rounded-lg">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Validar</button>
                <?php if ($dataFormatada !== null): ?>
                    <p class="text-center mt-2">Data formatada: <?= $dataFormatada ?></p>
                <?php endif; ?>
            </form>
        <?php elseif ($tipo === 'raizQuadrada'): ?>
            <form method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                <input type="hidden" name="tipo" value="raizQuadrada">
                <input type="number" name="numero" placeholder="Digite o número" required class="w-full p-2 border rounded-lg">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Calcular</button>
                <?php if ($raizQuadrada !== null): ?>
                    <p class="text-center mt-2">Raiz quadrada: <?= $raizQuadrada ?></p>
                <?php endif; ?>
            </form>
        <?php elseif ($tipo === 'arredondarNumero'): ?>
            <form method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                <input type="hidden" name="tipo" value="arredondarNumero">
                <input type="number" step="any" name="flutuante" placeholder="Digite o número" required class="w-full p-2 border rounded-lg">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Arredondar</button>
                <?php if ($numeroArredondado !== null): ?>
                    <p class="text-center mt-2">Número arredondado: <?= $numeroArredondado ?></p>
                <?php endif; ?>
            </form>
        <?php elseif ($tipo === 'diferencaDatas'): ?>
            <form method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                <input type="hidden" name="tipo" value="diferencaDatas">
                <input type="text" name="data1" placeholder="Primeira data (dd/mm/YYYY)" required class="w-full p-2 border rounded-lg">
                <input type="text" name="data2" placeholder="Segunda data (dd/mm/YYYY)" required class="w-full p-2 border rounded-lg">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Calcular</button>
                <?php if ($difDias !== null): ?>
                    <p class="text-center mt-2">Diferença em dias: <?= $difDias ?> dias</p>
                <?php endif; ?>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>