<?php

$tipo = $_POST["tipo"] ?? "";
$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function calcularResultado($tipo)
    {
        (float) $num1 = $_POST["num1"] ?? 0;
        (float) $num2 = $_POST["num2"] ?? 0;
        (float) $nota1 = $_POST["nota1"] ?? 0;
        (float) $nota2 = $_POST["nota2"] ?? 0;
        (float) $nota3 = $_POST["nota3"] ?? 0;
        (float) $celsius = $_POST["celsius"] ?? 0;
        (float) $fahrenheit = $_POST["fahrenheit"] ?? 0;
        (float) $largura = $_POST["largura"] ?? 0;
        (float) $altura = $_POST["altura"] ?? 0;
        (float) $raio = $_POST["raio"] ?? 0;
        (float) $base = $_POST["base"] ?? 0;
        (float) $expoente = $_POST["expoente"] ?? 0;
        (float) $metros = $_POST["metros"] ?? 0;
        (float) $km = $_POST["km"] ?? 0;
        (float) $peso = $_POST["peso"] ?? 0;
        (float) $preco = $_POST["preco"] ?? 0;
        (float) $percentual = $_POST["percentual"] ?? 0;
        (float) $capital = $_POST["capital"] ?? 0;
        (float) $taxa = $_POST["taxa"] ?? 0;
        (float) $periodo = $_POST["periodo"] ?? 0;
        (float) $dias = $_POST["dias"] ?? 0;
        (float) $distancia = $_POST["distancia"] ?? 0;
        (float) $tempo = $_POST["tempo"] ?? 1;

        switch ($tipo) {
            case "soma":
                return  $num1 +  $num2;
            case "subtracao":
                return  $num1 - $num2;
            case "multiplicacao":
                return $num1 * $num2;
            case "divisao":
                return $num2 != 0 ? $num1 / $num2 : "Erro: Divisão por zero";
            case "media":
                return ($nota1 + $nota2 + $nota3) / 3;
            case "celsiusParaFahrenheit":
                return ($celsius * 9 / 5) + 32;
            case "fahrenheitParaCelsius":
                return ($fahrenheit - 32) * 5 / 9;
            case "areaRetangulo":
                return $largura * $altura;
            case "areaCirculo":
                return pi() * pow($raio, 2);
            case "perimetroRetangulo":
                return 2 * ($largura + $altura);
            case "perimetroCirculo":
                return 2 * pi() * $raio;
            case "potencia":
                return pow($base, $expoente);
            case "metrosParaCm":
                return $metros * 100;
            case "kmParaMilhas":
                return $km * 0.621371;
            case "imc":
                return $peso / pow($altura, 2);
            case "desconto":
                return $preco - ($preco * ($percentual / 100));
            case "jurosSimples":
                return $capital * ($taxa / 100) * $periodo;
            case "jurosCompostos":
                return $capital * pow((1 + ($taxa / 100)), $periodo);
            case "diasParaSegundos":
                return [
                    "horas" => $dias * 24,
                    "minutos" => $dias * 24 * 60,
                    "segundos" => $dias * 24 * 60 * 60
                ];
            case "velocidadeMedia":
                return $distancia / $tempo;
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
    <title>Lista de Exercícios 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Lista de Exercícios 2 - PHP</h1>

        <form method="POST" class="space-y-4">
            <label class="block text-lg font-medium">Escolha o cálculo:</label>
            <select name="tipo" onchange="this.form.submit()" class="w-full p-2 border rounded-lg">
                <option value="">-- Selecione --</option>
                <option value="soma" <?= ($tipo == "soma") ? "selected" : "" ?>>Soma</option>
                <option value="subtracao" <?= ($tipo == "subtracao") ? "selected" : "" ?>>Subtração</option>
                <option value="multiplicacao" <?= ($tipo == "multiplicacao") ? "selected" : "" ?>>Multiplicação</option>
                <option value="divisao" <?= ($tipo == "divisao") ? "selected" : "" ?>>Divisão</option>
                <option value="media" <?= ($tipo == "media") ? "selected" : "" ?>>Média</option>
                <option value="celsiusParaFahrenheit" <?= ($tipo == "celsiusParaFahrenheit") ? "selected" : "" ?>>Celsius → Fahrenheit</option>
                <option value="fahrenheitParaCelsius" <?= ($tipo == "fahrenheitParaCelsius") ? "selected" : "" ?>>Fahrenheit → Celsius</option>
                <option value="areaRetangulo" <?= ($tipo == "areaRetangulo") ? "selected" : "" ?>>Área do Retângulo</option>
                <option value="areaCirculo" <?= ($tipo == "areaCirculo") ? "selected" : "" ?>>Área do Círculo</option>
                <option value="perimetroRetangulo" <?= ($tipo == "perimetroRetangulo") ? "selected" : "" ?>>Perimetro do Retangulo</option>
                <option value="potencia" <?= ($tipo == "potencia") ? "selected" : "" ?>>Potência</option>
                <option value="metrosParaCm" <?= ($tipo == "metrosParaCm") ? "selected" : "" ?>>Metros → Centímetros</option>
                <option value="kmParaMilhas" <?= ($tipo == "kmParaMilhas") ? "selected" : "" ?>>Quilômetros → Milhas</option>
                <option value="imc" <?= ($tipo == "imc") ? "selected" : "" ?>>IMC</option>
                <option value="desconto" <?= ($tipo == "desconto") ? "selected" : "" ?>>Desconto</option>
                <option value="jurosSimples" <?= ($tipo == "jurosSimples") ? "selected" : "" ?>>Juros Simples</option>
                <option value="jurosCompostos" <?= ($tipo == "jurosCompostos") ? "selected" : "" ?>>Juros Compostos</option>
                <option value="diasParaSegundos" <?= ($tipo == "diasParaSegundos") ? "selected" : "" ?>>Dias → Segundos</option>
                <option value="velocidadeMedia" <?= ($tipo == "velocidadeMedia") ? "selected" : "" ?>>Velocidade Média</option>
            </select>

            <?php if (in_array($tipo, ["soma", "subtracao", "multiplicacao", "divisao"])): ?>
                <input type="number" name="num1" placeholder="Número 1" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="num2" placeholder="Número 2" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "media"): ?>
                <input type="number" name="nota1" placeholder="Nota 1" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="nota2" placeholder="Nota 2" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="nota3" placeholder="Nota 3" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "celsiusParaFahrenheit"): ?>
                <input type="number" name="celsius" placeholder="Temperatura (°C)" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "fahrenheitParaCelsius"): ?>
                <input type="number" name="fahrenheit" placeholder="Temperatura (°F)" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "areaRetangulo" || $tipo == "perimetroRetangulo"): ?>
                <input type="number" name="largura" placeholder="Largura" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="altura" placeholder="Altura" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "areaCirculo" || $tipo == "perimetroCirculo"): ?>
                <input type="number" name="raio" placeholder="Raio" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "potencia"): ?>
                <input type="number" name="base" placeholder="Base" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="expoente" placeholder="Expoente" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "metrosParaCm"): ?>
                <input type="number" name="metros" placeholder="Metros" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "kmParaMilhas"): ?>
                <input type="number" name="km" placeholder="Quilômetros" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "imc"): ?>
                <input type="number" name="peso" placeholder="Peso (kg)" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="altura" placeholder="Altura (m)" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "desconto"): ?>
                <input type="number" name="preco" placeholder="Preço" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="percentual" placeholder="Percentual de Desconto" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "jurosSimples"): ?>
                <input type="number" name="capital" placeholder="Capital" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="taxa" placeholder="Taxa (%)" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="periodo" placeholder="Período (anos)" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "jurosCompostos"): ?>
                <input type="number" name="capital" placeholder="Capital" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="taxa" placeholder="Taxa (%)" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="periodo" placeholder="Período (anos)" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "diasParaSegundos"): ?>
                <input type="number" name="dias" placeholder="Dias" step="any" required class="w-full p-2 border rounded-lg">
            <?php elseif ($tipo == "velocidadeMedia"): ?>
                <input type="number" name="distancia" placeholder="Distância (km)" step="any" required class="w-full p-2 border rounded-lg">
                <input type="number" name="tempo" placeholder="Tempo (h)" step="any" required class="w-full p-2 border rounded-lg">
            <?php endif; ?>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Calcular</button>
        </form>

        <?php if (isset($resultado)): ?>
            <h2 class="text-xl font-semibold text-center mt-6">Resultado:
                <span class="text-blue-600"><?php echo is_array($resultado) ? implode(", ", $resultado) : $resultado; ?></span>
            </h2>
        <?php endif; ?>
    </div>
</body>

</html>