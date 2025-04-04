<?php

$pageTitle = "Moradores";
require_once('components/header.php');
require_once('db/conexao.php');

$query = "SELECT * FROM moradores";
$stmt = $pdo->prepare($query);
$stmt->execute();

$moradores = $stmt->fetchAll(PDO::FETCH_ASSOC);

function getMoradorPadrao()
{
    return ["nome" => "", "documento" => "", "id" => null];
}

function reloadPage()
{
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
}

function getMoradorById($id, $moradores)
{
    foreach ($moradores as $morador) {
        if ($morador["id"] == $id) {
            return $morador;
        }
    }
    return null;
}

$moradorEditado = getMoradorPadrao();

$id = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["acao"])) {
        $acao = $_POST["acao"];

        $id = isset($_POST["id"]) && $_POST["id"] > 0 && $acao !== "reset" ? (int) $_POST["id"] : null;
        $nome = isset($_POST["nome"]) && $acao !== "reset" ? trim($_POST["nome"]) : "";
        $documento = isset($_POST["documento"]) && $acao !== "reset" ? trim($_POST["documento"]) : "";

        if ($acao === "adicionar") {
            $query = "INSERT INTO moradores(nome, documento) VALUES (?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$nome, $documento]);
            $moradorEditado = getMoradorPadrao();
            reloadPage();
        }

        if (isset($id)) {
            if ($acao === "editar") {
                $moradorEditado = getMoradorById($id, $moradores);
            }

            if ($acao === "atualizar") {
                $query = "UPDATE moradores SET nome = ?, documento = ? WHERE id = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$nome, $documento, $id]);
                $moradorEditado = getMoradorPadrao();
                reloadPage();
            }

            if ($acao === "excluir") {
                $query = "DELETE FROM moradores WHERE id = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$id]);
                $moradorEditado = getMoradorPadrao();
                reloadPage();
            }
        }
    }
}
?>

<div class="p-8 flex gap-8">
    <div class="w-1/3 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl mb-4"><?= isset($id) ? "Editar Morador" : "Adicionar Morador" ?></h2>
        <form method="POST" id="moradorForm">
            <input type="hidden" name="id" value="<?= isset($moradorEditado["id"]) ? $moradorEditado["id"] : null ?>">
            <div class="mb-4">
                <label class="block text-gray-700">Nome</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($moradorEditado["nome"]) ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Documento</label>
                <input type="text" name="documento" value="<?= htmlspecialchars($moradorEditado["documento"]) ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="flex gap-4">
                <button type="submit" name="acao" value="<?= isset($id) && $id > 0 ? "atualizar" : "adicionar" ?>" class="bg-green-600 text-white px-4 py-2 rounded">
                    <?= $moradorEditado["id"] > 0 ? "Atualizar" : "Adicionar" ?>
                </button>
                <button type="submit" name="acao" value="reset" class="bg-gray-500 text-white px-4 py-2 rounded">Resetar</button>
            </div>
        </form>
    </div>

    <div class="w-2/3 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl mb-4">Lista de Moradores</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Nome</th>
                    <th class="border p-2">Documento</th>
                    <th class="border p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($moradores as $morador) : ?>
                    <tr class="border">
                        <td class="p-2"><?= htmlspecialchars($morador["nome"]) ?></td>
                        <td class="p-2"><?= htmlspecialchars($morador["documento"]) ?></td>
                        <td class="p-2 flex gap-2">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $morador["id"] ?>">
                                <button type="submit" class="text-blue-600" name="acao" value="editar">Editar</button>
                            </form>
                            <form method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este morador?');">
                                <input type="hidden" name="id" value="<?= $morador["id"] ?>">
                                <button type="submit" class="text-red-600" name="acao" value="excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
