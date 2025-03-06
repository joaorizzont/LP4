<?php

declare(strict_types=1);

function adicionarContato(array $contatos, string $nome, string $telefone): array {
    if (isset($contatos[$nome]) || in_array($telefone, $contatos, true)) {
        return $contatos;
    }

    $contatos[$nome] = $telefone;
    ksort($contatos);
    return $contatos;
}


function adicionarAluno(array $alunos, string $nome, array $notas): array {
    if (count($notas) === 0) {
        throw new InvalidArgumentException("A lista de notas não pode estar vazia.");
    }
    
    $media = array_sum($notas) / count($notas);
    $alunos[$nome] = $media;
    arsort($alunos);
    return $alunos;
}


function adicionarProduto(array $produtos, string $codigo, string $nome, float $preco): array {
    if ($preco > 100) {
        $preco *= 0.9; 
    }

    $produtos[$codigo] = ['nome' => $nome, 'preco' => $preco];
    ksort($produtos);
    return $produtos;
}


function adicionarItem(array $itens, string $nome, float $preco): array {
    $preco *= 1.15;
    $itens[$nome] = $preco;
    asort($itens);
    return $itens;
}


function adicionarLivro(array $livros, string $titulo, int $quantidade): array {
    $livros[$titulo] = $quantidade;
    ksort($livros);
    return $livros;
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Exercícios 5 - PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Lista de Exercícios 5 - PHP</h1>

        <form method="POST" class="space-y-4">
            

            <h2 class="text-xl font-semibold">Contatos (Nome e Telefone)</h2>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label class="block text-lg font-medium">Nome do Contato <?= $i ?>:</label>
                <input type="text" name="contato_nome<?= $i ?>" placeholder="Digite o nome" class="w-full p-2 border rounded-lg">

                <label class="block text-lg font-medium">Telefone do Contato <?= $i ?>:</label>
                <input type="text" name="contato_telefone<?= $i ?>" placeholder="Digite o telefone" class="w-full p-2 border rounded-lg">
            <?php endfor; ?>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Adicionar Contatos</button>
            
            <?php if (!empty($contatos)): ?>
                <h3 class="text-xl font-semibold mt-4">Contatos Ordenados:</h3>
                <ul>
                    <?php foreach ($contatos as $nome => $telefone): ?>
                        <li><?= $nome ?> - <?= $telefone ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            

            <h2 class="text-xl font-semibold">Alunos (Nome e Notas)</h2>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label class="block text-lg font-medium">Nome do Aluno <?= $i ?>:</label>
                <input type="text" name="aluno_nome<?= $i ?>" placeholder="Digite o nome" class="w-full p-2 border rounded-lg">

                <label class="block text-lg font-medium">Notas do Aluno <?= $i ?> (separadas por vírgula):</label>
                <input type="text" name="aluno_notas<?= $i ?>" placeholder="Digite as notas" class="w-full p-2 border rounded-lg">
            <?php endfor; ?>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Adicionar Alunos</button>
            
            <?php if (!empty($alunos)): ?>
                <h3 class="text-xl font-semibold mt-4">Alunos Ordenados por Média:</h3>
                <ul>
                    <?php foreach ($alunos as $nome => $media): ?>
                        <li><?= $nome ?> - Média: <?= number_format($media, 2) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>


            <h2 class="text-xl font-semibold">Produtos (Código, Nome e Preço)</h2>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label class="block text-lg font-medium">Código do Produto <?= $i ?>:</label>
                <input type="text" name="produto_codigo<?= $i ?>" placeholder="Digite o código" class="w-full p-2 border rounded-lg">

                <label class="block text-lg font-medium">Nome do Produto <?= $i ?>:</label>
                <input type="text" name="produto_nome<?= $i ?>" placeholder="Digite o nome" class="w-full p-2 border rounded-lg">

                <label class="block text-lg font-medium">Preço do Produto <?= $i ?>:</label>
                <input type="text" name="produto_preco<?= $i ?>" placeholder="Digite o preço" class="w-full p-2 border rounded-lg">
            <?php endfor; ?>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Adicionar Produtos</button>
            
            <?php if (!empty($produtos)): ?>
                <h3 class="text-xl font-semibold mt-4">Produtos com Desconto:</h3>
                <ul>
                    <?php foreach ($produtos as $codigo => $produto): ?>
                        <li><?= $produto['nome'] ?> - Preço: R$ <?= number_format($produto['preco'], 2) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <h2 class="text-xl font-semibold">Itens (Nome e Preço)</h2>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label class="block text-lg font-medium">Nome do Item <?= $i ?>:</label>
                <input type="text" name="item_nome<?= $i ?>" placeholder="Digite o nome" class="w-full p-2 border rounded-lg">

                <label class="block text-lg font-medium">Preço do Item <?= $i ?>:</label>
                <input type="text" name="item_preco<?= $i ?>" placeholder="Digite o preço" class="w-full p-2 border rounded-lg">
            <?php endfor; ?>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Adicionar Itens</button>
            
            <?php if (!empty($itens)): ?>
                <h3 class="text-xl font-semibold mt-4">Itens com Imposto Aplicado:</h3>
                <ul>
                    <?php foreach ($itens as $nome => $preco): ?>
                        <li><?= $nome ?> - Preço com Imposto: R$ <?= number_format($preco, 2) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <!-- Exercício 5 - Livros -->
            <h2 class="text-xl font-semibold">Livros (Título e Quantidade em Estoque)</h2>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label class="block text-lg font-medium">Título do Livro <?= $i ?>:</label>
                <input type="text" name="livro_titulo<?= $i ?>" placeholder="Digite o título" class="w-full p-2 border rounded-lg">

                <label class="block text-lg font-medium">Quantidade em Estoque do Livro <?= $i ?>:</label>
                <input type="text" name="livro_quantidade<?= $i ?>" placeholder="Digite a quantidade" class="w-full p-2 border rounded-lg">
            <?php endfor; ?>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Adicionar Livros</button>
            
            <?php if (!empty($livros)): ?>
                <h3 class="text-xl font-semibold mt-4">Livros Ordenados:</h3>
                <ul>
                    <?php foreach ($livros as $titulo => $quantidade): ?>
                        <li><?= $titulo ?> - Quantidade: <?= $quantidade ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </form>
    </div>
</body>

</html>
