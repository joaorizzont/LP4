<?php

$tipo = $_POST["tipo"] ?? "";
$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function processarDados($tipo)
    {
        switch ($tipo) {
            case "contatos":
                $contatos = [];
                for ($i = 1; $i <= 5; $i++) {
                    $nome = $_POST["nome$i"] ?? "";
                    $telefone = $_POST["telefone$i"] ?? "";
                    if (!empty($nome) && !empty($telefone) && !isset($contatos[$nome]) && !in_array($telefone, $contatos)) {
                        $contatos[$nome] = $telefone;
                    }
                }
                ksort($contatos);
                return $contatos;

            case "alunos":
                $alunos = [];
                for ($i = 1; $i <= 5; $i++) {
                    $nome = $_POST["nome$i"] ?? "";
                    $nota1 = $_POST["nota{$i}1"] ?? 0;
                    $nota2 = $_POST["nota{$i}2"] ?? 0;
                    $nota3 = $_POST["nota{$i}3"] ?? 0;
                    if (!empty($nome)) {
                        $media = ($nota1 + $nota2 + $nota3) / 3;
                        $alunos[$nome] = $media;
                    }
                }
                arsort($alunos);
                return $alunos;

            case "itens":
                $produtos = [];
                for ($i = 1; $i <= 5; $i++) {
                    $nome = $_POST["nome$i"] ?? "";
                    $preco = $_POST["preco$i"] ?? 0;
                    if (!empty($nome)) {
                        $preco *= 1.15;
                        $produtos[$nome] = $preco;
                    }
                }
                asort($produtos);
                return $produtos;

            case "produtos":
                $produtos = [];
                for ($i = 1; $i <= 5; $i++) {
                    $codigo = $_POST["codigo$i"] ?? "";
                    $nome = $_POST["nome$i"] ?? "";
                    $preco = $_POST["preco$i"] ?? 0;
                    if (!empty($codigo) && !empty($nome)) {
                        if ($preco > 100) {
                            $preco *= 0.9;
                        }
                        $produtos[$codigo] = ["nome" => $nome, "preco" => $preco];
                    }
                }
                uasort($produtos, fn($a, $b) => strcmp($a['nome'], $b['nome']));
                return $produtos;

            case "livros":
                $livros = [];
                for ($i = 1; $i <= 5; $i++) {
                    $titulo = $_POST["titulo$i"] ?? "";
                    $quantidade = $_POST["quantidade$i"] ?? 0;
                    if (!empty($titulo)) {
                        $livros[$titulo] = $quantidade;
                    }
                }
                ksort($livros);
                return $livros;
        }
    }
    $resultado = processarDados($tipo);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Exercícios - PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900 font-sans">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold text-center mb-6">Lista de Exercícios</h1>
        <form method="POST" class="space-y-6">
            <label class="block font-medium text-lg">Escolha a categoria:</label>
            <select name="tipo" onchange="this.form.submit()" class="block w-full p-2 border rounded-md">
                <option value="">-- Selecione --</option>
                <option value="contatos" <?= ($tipo == "contatos") ? "selected" : "" ?>>Contatos</option>
                <option value="alunos" <?= ($tipo == "alunos") ? "selected" : "" ?>>Alunos</option>
                <option value="produtos" <?= ($tipo == "produtos") ? "selected" : "" ?>>Produtos</option>
                <option value="itens" <?= ($tipo == "itens") ? "selected" : "" ?>>Itens</option>
                <option value="livros" <?= ($tipo == "livros") ? "selected" : "" ?>>Livros</option>
            </select>

            <?php if ($tipo == "contatos"): ?>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="flex space-x-4">
                        <input type="text" name="nome<?= $i ?>" placeholder="Nome <?= $i ?>" class="block w-full p-2 border rounded-md" required>
                        <input type="text" name="telefone<?= $i ?>" placeholder="Telefone <?= $i ?>" class="block w-full p-2 border rounded-md" required>
                    </div>
                <?php endfor; ?>

            <?php elseif ($tipo == "alunos"): ?>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="flex space-x-4">
                        <input type="text" name="nome<?= $i ?>" placeholder="Nome <?= $i ?>" class="block w-full p-2 border rounded-md" required>
                        <input type="number" name="nota<?= $i ?>1" placeholder="Nota 1" step="0.1" class="block w-full p-2 border rounded-md" required>
                        <input type="number" name="nota<?= $i ?>2" placeholder="Nota 2" step="0.1" class="block w-full p-2 border rounded-md" required>
                        <input type="number" name="nota<?= $i ?>3" placeholder="Nota 3" step="0.1" class="block w-full p-2 border rounded-md" required>
                    </div>
                <?php endfor; ?>

            <?php elseif ($tipo == "produtos"): ?>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="flex space-x-4">
                        <input type="text" name="codigo<?= $i ?>" placeholder="Código <?= $i ?>" class="block w-full p-2 border rounded-md" required>
                        <input type="text" name="nome<?= $i ?>" placeholder="Nome <?= $i ?>" class="block w-full p-2 border rounded-md" required>
                        <input type="number" name="preco<?= $i ?>" placeholder="Preço" step="0.01" class="block w-full p-2 border rounded-md" required>
                    </div>
                <?php endfor; ?>

            <?php elseif ($tipo == "itens"): ?>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="flex space-x-4">
                        <input type="text" name="nome<?= $i ?>" placeholder="Nome <?= $i ?>" class="block w-full p-2 border rounded-md" required>
                        <input type="number" name="preco<?= $i ?>" placeholder="Preço" step="0.01" class="block w-full p-2 border rounded-md" required>
                    </div>
                <?php endfor; ?>

            <?php elseif ($tipo == "livros"): ?>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="flex space-x-4">
                        <input type="text" name="titulo<?= $i ?>" placeholder="Título <?= $i ?>" class="block w-full p-2 border rounded-md" required>
                        <input type="number" name="quantidade<?= $i ?>" placeholder="Quantidade em estoque" class="block w-full p-2 border rounded-md" required>
                    </div>
                <?php endfor; ?>

            <?php endif; ?>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700 transition">Processar</button>
        </form>

        <?php if ($resultado): ?>
            <h2 class="text-2xl font-semibold mt-6">Resultado:</h2>
            <?php if ($tipo == "produtos"): ?>
                <h3 class="text-xl font-semibold mt-4">Produtos com preço após imposto:</h3>
                <pre class="bg-gray-100 p-4 rounded-md"><?php print_r($resultado); ?></pre>
            <?php elseif ($tipo == "livros"): ?>
                <h3 class="text-xl font-semibold mt-4">Livros em estoque:</h3>
                <ul class="list-disc ml-6">
                    <?php foreach ($resultado as $titulo => $quantidade): ?>
                        <li>
                            <?php echo $titulo . ": " . $quantidade; ?>
                            <?php if ($quantidade < 5): ?>
                                <strong class="text-red-500"> (Baixa quantidade!)</strong>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <pre class="bg-gray-100 p-4 rounded-md"><?php print_r($resultado); ?></pre>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>
