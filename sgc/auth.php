<?php
session_start();
if (!isset($_POST['submit'])) {
    header("Location: ../index.html");
    exit;
}

require "./conectaBd.php";
$user = $_POST['usuario'];
$senha = $_POST['senha'];

//BOTAR REGEX

$stmt = mysqli_prepare($conect, "SELECT * FROM logs_tb WHERE usuario = ? AND senha = ?");
mysqli_stmt_bind_param($stmt, "ss", $user, $senha);
mysqli_stmt_execute($stmt);


mysqli_stmt_store_result($stmt);
if (mysqli_stmt_num_rows($stmt) < 1) {
    header("Location: ../index.html");
    exit;
};

$_SESSION['usuario'] = $user;
header("Location: ../view/home-page.php");
exit;
