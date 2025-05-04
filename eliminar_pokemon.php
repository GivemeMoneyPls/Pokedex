<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/sin_permisos.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');

$conn = new MyDatabase();

$result = $conn->query("DELETE FROM pokemon WHERE id=" . $_GET['idPokemon']);

if ($result) {
    $_SESSION['messageExito'] = "Pokemon eliminado exitosamente";
}else{
    $_SESSION['messageError'] = "Error al eliminar pokemon";
}

header("Location:index.php");