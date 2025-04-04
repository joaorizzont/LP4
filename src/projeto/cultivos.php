<?php
$pageTitle = "Cultivos";
require_once('components/header.php');
require_once('db/conexao.php');

$terrenos = $pdo->query("SELECT * FROM terrenos")->fetchAll(PDO::FETCH_ASSOC);
$moradores = $pdo->query("SELECT * FROM moradores")->fetchAll(PDO::FETCH_ASSOC);
$plantas = $pdo->query("SELECT * FROM plantas")->fetchAll(PDO::FETCH_ASSOC);
$cultivos = $pdo->query("SELECT c.*, t.descricao AS terreno, m.nome AS morador, p.especie AS planta 
                        FROM cultivos c 
                        JOIN terrenos t ON c.terreno_id = t.id 
                        JOIN moradores m ON c.morador_id = m.id 
                        JOIN plantas p ON c.planta_id = p.id")->fetchAll(PDO::FETCH_ASSOC);

function getCultivoPadrao()
{
    return ["inicio" => "", "fim" => "", "terreno_id" => "", "morador_id" => "", "planta_id" => "", "id" => null];
}

function reloadPage()
{
    echo '<meta http-equiv="Refresh" content="0;">';
}

$cultivoEditado = getCultivoPadrao();
$id = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["acao"])) {
        $acao = $_POST["acao"];
        $id = isset($_POST["id"]) && $_POST["id"] > 0 ? (int) $_POST["id"] : null;
        $inicio = $_POST["inicio"] ?? "";
        $fim = $_POST["fim"] ?? "";
        $terreno_id = $_POST["terreno_id"] ?? "";
        $morador_id = $_POST["morador_id"] ?? "";
        $planta_id = $_POST["planta_id"] ?? "";

        if ($acao === "adicionar") {
            $stmt = $pdo->prepare("INSERT INTO cultivos (inicio, fim, terreno_id, morador_id, planta_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$inicio, $fim, $terreno_id, $morador_id, $planta_id]);
            reloadPage();
        }

        if (isset($id)) {
            if ($acao === "atualizar") {
                $stmt = $pdo->prepare("UPDATE cultivos SET inicio = ?, fim = ?, terreno_id = ?, morador_id = ?, planta_id = ? WHERE id = ?");
                $stmt->execute([$inicio, $fim, $terreno_id, $morador_id, $planta_id, $id]);
                reloadPage();
            }
            if ($acao === "excluir") {
                $stmt = $pdo->prepare("DELETE FROM cultivos WHERE id = ?");
                $stmt->execute([$id]);
                reloadPage();
            }
        }
    }
}
?>

<div class="p-8 flex gap-8">
    <div class="w-1/3 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl mb-4">Registrar Cultivo</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $cultivoEditado['id'] ?>">
            <div class="mb-4">
                <label class="block text-gray-700">Data de Início</label>
                <input type="date" name="inicio" value="<?= $cultivoEditado['inicio'] ?>" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Data de Fim</label>
                <input type="date" name="fim" value="<?= $cultivoEditado['fim'] ?>" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Terreno</label>
                <select name="terreno_id" class="w-full p-2 border rounded" required>
                    <?php foreach ($terrenos as $terreno): ?>
                        <option value="<?= $terreno['id'] ?>"><?= $terreno['descricao'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Morador</label>
                <select name="morador_id" class="w-full p-2 border rounded" required>
                    <?php foreach ($moradores as $morador): ?>
                        <option value="<?= $morador['id'] ?>"><?= $morador['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Planta</label>
                <select name="planta_id" class="w-full p-2 border rounded" required>
                    <?php foreach ($plantas as $planta): ?>
                        <option value="<?= $planta['id'] ?>"><?= $planta['especie'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="acao" value="adicionar" class="bg-green-600 text-white px-4 py-2 rounded">Registrar</button>
        </form>
    </div>

    <div class="w-2/3 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl mb-4">Lista de Cultivos</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Início</th>
                    <th class="border p-2">Fim</th>
                    <th class="border p-2">Terreno</th>
                    <th class="border p-2">Morador</th>
                    <th class="border p-2">Planta</th>
                    <th class="border p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cultivos as $cultivo): ?>
                    <tr class="border">
                        <td class="p-2"><?= date('d/m/Y', strtotime($cultivo['inicio'])) ?></td>
                        <td class="p-2"><?= date('d/m/Y', strtotime($cultivo['fim'])) ?></td>
                        <td class="p-2"><?= $cultivo['terreno'] ?></td>
                        <td class="p-2"><?= $cultivo['morador'] ?></td>
                        <td class="p-2"><?= $cultivo['planta'] ?></td>
                        <td class="p-2 flex gap-2">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $cultivo['id'] ?>">
                                <button type="submit" name="acao" value="excluir" class="text-red-600" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>