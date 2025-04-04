<?php

$pageTitle = "Plantas";
require_once('components/header.php');
require_once('db/conexao.php');

$query = "SELECT * FROM plantas";
$stmt = $pdo->prepare($query);
$stmt->execute();

$plantas = $stmt->fetchAll(PDO::FETCH_ASSOC);

function getPlantaPadrao()
{
    return ["especie" => "", "codigo" => "", "imagem" => "", "id" => null];
}

function reloadPage()
{
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
}

function getPlantaById($id, $plantas)
{
    foreach ($plantas as $planta) {
        if ($planta["id"] == $id) {
            return $planta;
        }
    }
    return null;
}

$plantaEditada = getPlantaPadrao();

$id = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["acao"])) {
        $acao = $_POST["acao"];

        $id = isset($_POST["id"]) && $_POST["id"] > 0 && $acao !== "reset" ? (int) $_POST["id"] : null;
        $especie = isset($_POST["especie"]) && $acao !== "reset" ? trim($_POST["especie"]) : "";
        $codigo = isset($_POST["codigo"]) && $acao !== "reset" ? trim($_POST["codigo"]) : "";
        $imagem = isset($_POST["imagem"]) && $acao !== "reset" ? trim($_POST["imagem"]) : "";

        if ($acao === "adicionar") {
            $query = "INSERT INTO plantas(especie, codigo, imagem) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$especie, $codigo, $imagem]);
            $plantaEditada = getPlantaPadrao();
            reloadPage();
        }

        if (isset($id)) {
            if ($acao === "editar") {
                $plantaEditada = getPlantaById($id, $plantas);
            }

            if ($acao === "atualizar") {
                $query = "UPDATE plantas SET especie = ?, codigo = ?, imagem = ? WHERE id = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$especie, $codigo, $imagem, $id]);
                $plantaEditada = getPlantaPadrao();
                reloadPage();
            }

            if ($acao === "excluir") {
                $query = "DELETE FROM plantas WHERE id = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$id]);
                $plantaEditada = getPlantaPadrao();
                reloadPage();
            }
        }
    }
}
?>

<div class="p-8 flex gap-8">
    <div class="w-1/3 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl mb-4"><?= isset($id) ? "Editar Planta" : "Adicionar Planta" ?></h2>
        <form method="POST" id="plantaForm">
            <input type="hidden" name="id" value="<?= isset($plantaEditada["id"]) ? $plantaEditada["id"] : null ?>">
            <div class="mb-4">
                <label class="block text-gray-700">Espécie</label>
                <input type="text" name="especie" value="<?= htmlspecialchars($plantaEditada["especie"]) ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Código</label>
                <input type="text" name="codigo" value="<?= htmlspecialchars($plantaEditada["codigo"]) ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Imagem (URL)</label>
                <input type="text" name="imagem" value="<?= htmlspecialchars($plantaEditada["imagem"]) ?>" class="w-full p-2 border rounded">
            </div>
            <div class="flex gap-4">
                <button type="submit" name="acao" value="<?= isset($id) && $id > 0 ? "atualizar" : "adicionar" ?>" class="bg-green-600 text-white px-4 py-2 rounded">
                    <?= $plantaEditada["id"] > 0 ? "Atualizar" : "Adicionar" ?>
                </button>
                <button type="submit" name="acao" value="reset" class="bg-gray-500 text-white px-4 py-2 rounded">Resetar</button>
            </div>
        </form>
    </div>

    <div class="w-2/3 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl mb-4">Lista de Plantas</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Espécie</th>
                    <th class="border p-2">Código</th>
                    <th class="border p-2">Imagem</th>
                    <th class="border p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($plantas as $index => $planta) : ?>
                    <tr class="border">
                        <td class="p-2"><?= htmlspecialchars($planta["especie"]) ?></td>
                        <td class="p-2"><?= htmlspecialchars($planta["codigo"]) ?></td>
                        <td class="p-2">
                            <img src="<?= htmlspecialchars($planta["imagem"]) ?>" alt="<?= htmlspecialchars($planta["especie"]) ?>" class="h-16 w-16 object-cover">
                        </td>
                        <td class="p-2 flex gap-2">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $planta["id"] ?>">
                                <button type="submit" class="text-blue-600" name="acao" value="editar">Editar</button>
                            </form>
                            <form method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta planta?');">
                                <input type="hidden" name="id" value="<?= $planta["id"] ?>">
                                <button type="submit" class="text-red-600" name="acao" value="excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
