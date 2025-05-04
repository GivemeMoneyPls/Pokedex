<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');


$user = $_POST['user'];
$pass = $_POST['pass'];

$conn = new MyDatabase();

$result = $conn->query("SELECT * FROM users WHERE user = '$user' AND pass = '$pass'");

if (mysqli_num_rows($result) == 1 && $user != "") {
    $_SESSION['user'] = $user;
    $_SESSION['messageExito'] = "Logueado correctamente";
}else{
    $_SESSION['messageError'] = "Usuario no registrado";
}

header('Location: index.php');
