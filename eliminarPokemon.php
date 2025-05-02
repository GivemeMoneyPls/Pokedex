<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');

$conn = new MyDatabase();

$conn->query("DELETE FROM pokemon WHERE id=" . $_GET['pokemon']);

header("Location:index.php");