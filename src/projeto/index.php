<?php
session_start();
require_once('db/conexao.php'); // conexão com o banco

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && $password === $usuario["senha"]) {
            $_SESSION["user"] = $usuario["nome"];
            $_SESSION["user_id"] = $usuario["id"];
            header("Location: cultivos.php");
            exit();
        } else {
            $error = "E-mail ou senha inválidos.";
        }
    } else {
        $error = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="text" name="email" required class="w-full p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Senha</label>
                <input type="password" name="password" required class="w-full p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <?php if ($error): ?>
                <p class="text-red-500 text-sm mb-4"><?= $error ?></p>
            <?php endif; ?>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Entrar</button>
        </form>
    </div>
</body>
</html>
