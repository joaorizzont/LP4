<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? '' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50">
    <header class="bg-green-700 text-white h-12 w-full flex items-center justify-between px-4 md:px-10">
        <button id="menu-btn" class="text-white text-2xl md:hidden focus:outline-none">
            ☰
        </button>

        <nav class="hidden md:flex gap-5">
            <a href="terrenos.php" class="hover:underline">Terrenos</a>
            <a href="moradores.php" class="hover:underline">Moradores</a>
            <a href="plantas.php" class="hover:underline">Plantas</a>
        </nav>

        <div class="flex items-center gap-5">
            <h1>Bem-vindo, <?= htmlspecialchars($_SESSION["user"]) ?>!</h1>
            <a href="logout.php" class="text-white underline">Sair</a>
        </div>
    </header>

    <div id="sidebar"
        class="fixed top-0 left-0 w-64 h-full bg-green-800 text-white transform -translate-x-full transition-transform duration-300 p-5 flex flex-col gap-4">
        <button id="close-btn" class="text-white text-2xl self-end focus:outline-none">✖</button>
        <a href="terrenos.php" class="hover:underline">Terrenos</a>
        <a href="moradores.php" class="hover:underline">Moradores</a>
        <a href="plantas.php" class="hover:underline">Plantas</a>
    </div>

    <script>
        const menuBtn = document.getElementById("menu-btn");
        const closeBtn = document.getElementById("close-btn");
        const sidebar = document.getElementById("sidebar");

        menuBtn.addEventListener("click", () => {
            sidebar.classList.remove("-translate-x-full");
        });

        closeBtn.addEventListener("click", () => {
            sidebar.classList.add("-translate-x-full");
        });
    </script>
