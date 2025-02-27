<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: http://localhost:8080");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link href="../output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Formulario 1</h1>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nome Completo</label>
                <p class="mt-1 p-2 bg-gray-50 rounded">
                    <?php echo isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) . ' ' : ''; ?>
                    <?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : 'N/A'; ?>
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <p class="mt-1 p-2 bg-gray-50 rounded">
                    <?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : 'N/A'; ?>
                </p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Cidade</label>
                    <p class="mt-1 p-2 bg-gray-50 rounded">
                        <?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : 'N/A'; ?>
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Estado</label>
                    <p class="mt-1 p-2 bg-gray-50 rounded">
                        <?php echo isset($_POST['state']) ? htmlspecialchars($_POST['state']) : 'N/A'; ?>
                    </p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">CEP</label>
                <p class="mt-1 p-2 bg-gray-50 rounded">
                    <?php echo isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : 'N/A'; ?>
                </p>
            </div>
        </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>