<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['messageError'] = "No tenes permisos para realizar esta accion";
    header("location: index.php");
}