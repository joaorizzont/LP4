<?php

$pageTitle = "Terrenos";
require_once('components/header.php');
require_once('db/conexao.php');

$query = "SELECT * FROM terrenos";
$stmt = $pdo->prepare($query);
$stmt->execute();


$terrenos = $stmt->fetchAll(PDO::FETCH_ASSOC);


function getTerrenoPadrao()
{
    return ["descricao" => "", "largura" => "", "profundidade" => "", "id" => null];
}

function reloadPage()
{
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
}

function getTerrenoById($id, $terrenos)
{
    foreach ($terrenos as $terreno) {
        if ($terreno["id"] == $id) {
            return $terreno;
        }
    }
    return null;
}


$terrenoEditado = getTerrenoPadrao();

$id = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["acao"])) {
        $acao = $_POST["acao"];

        $id = isset($_POST["id"]) && $_POST["id"] >  0  && $acao !== "reset" ? (int) $_POST["id"] : null;
        $descricao = isset($_POST["descricao"]) && $acao !== "reset" ? trim($_POST["descricao"]) : "";
        $largura = isset($_POST["largura"]) && $acao !== "reset" ? (int) $_POST["largura"] : "";
        $profundidade = isset($_POST["profundidade"])  && $acao !== "reset" ? (int) $_POST["profundidade"] : "";

        if ($acao === "adicionar") {
            $query = "INSERT INTO terrenos(descricao, largura, profundidade) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$descricao, $largura, $profundidade]);
            $terrenoEditado = getTerrenoPadrao();
            reloadPage();
        }

        if (isset($id)) {
            if ($acao === "editar") {
                $terrenoEditado = getTerrenoById($id, $terrenos);
            }

            if ($acao === "atualizar") {
                $query = "UPDATE terrenos SET descricao = ?, largura = ?, profundidade = ? WHERE id = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$descricao, $largura, $profundidade, $id]);
                $terrenoEditado = getTerrenoPadrao();
                reloadPage();
            }

            if ($acao === "excluir") {
                $query = "DELETE FROM terrenos WHERE id = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$id]);
                $terrenoEditado = getTerrenoPadrao();
                reloadPage();
            }
        }
    }
}
?>

<div class="p-8 flex gap-8">
    <div class="w-1/3 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl mb-4"><?= isset($id) ? "Editar Terreno" : "Adicionar Terreno" ?></h2>
        <form method="POST" id="terrenoForm">
            <input type="hidden" name="id" value="<?= isset($terrenoEditado["id"]) ? $terrenoEditado["id"] : null ?>">
            <div class="mb-4">
                <label class="block text-gray-700">Descrição</label>
                <input type="text" name="descricao" value="<?= htmlspecialchars($terrenoEditado["descricao"]) ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Largura (m)</label>
                <input type="number" name="largura" value="<?= htmlspecialchars($terrenoEditado["largura"]) ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Profundidade (m)</label>
                <input type="number" name="profundidade" value="<?= htmlspecialchars($terrenoEditado["profundidade"]) ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="flex gap-4">
                <button type="submit" name="acao" value="<?= isset($id) && $id > 0 ? "atualizar" : "adicionar" ?>" class="bg-green-600 text-white px-4 py-2 rounded">
                    <?= $terrenoEditado["id"] > 0  ?  "Atualizar" : "Adicionar" ?>
                </button>
                <button type="submit" name="acao" value="reset" class="bg-gray-500 text-white px-4 py-2 rounded">Resetar</button>
            </div>
        </form>
    </div>

    <div class="w-2/3 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl mb-4">Lista de Terrenos</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Descrição</th>
                    <th class="border p-2">Largura (m)</th>
                    <th class="border p-2">Profundidade (m)</th>
                    <th class="border p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($terrenos as $index => $terreno) : ?>
                    <tr class="border">
                        <td class="p-2"><?= htmlspecialchars($terreno["descricao"]) ?></td>
                        <td class="p-2"><?= htmlspecialchars($terreno["largura"]) ?></td>
                        <td class="p-2"><?= htmlspecialchars($terreno["profundidade"]) ?></td>
                        <td class="p-2 flex gap-2">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $terreno["id"]  ?>">
                                <button type="submit" class="text-blue-600" name="acao" value="editar">Editar</button>
                            </form>
                            <form method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este terreno?');">
                                <input type="hidden" name="id" value="<?= $terreno["id"] ?>">
                                <button type="submit" class="text-red-600" name="acao" value="excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>