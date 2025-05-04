<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/sin_permisos.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');

$conn = new MyDatabase();

$nombreObtenido = $_POST['nombreCreacion'];
$tipo1Obtenido = $_POST['tipo1Creacion'];
$tipo2Obtenido = $_POST['tipo2Creacion'];
$descripcionObtenido = $_POST['descripcionCreacion'];
$numeroPokedex = $_POST['numeroPokedexCreacion'];
$fasePokemonObtenido = $_POST['fasePokemonCreacion'];
$evolucionesObtenido = $_POST['evolucionesCreacion'];


if ( empty($nombreObtenido) ||
    empty($tipo1Obtenido) ||
    empty($descripcionObtenido) ||
    empty($numeroPokedex) ||
    empty($fasePokemonObtenido) ||
    empty($evolucionesObtenido))
{
    $_SESSION['messageError'] = "Rellene todos los campos por favor";
    header("location: crear_pokemon.php");
}else{
if (isset($_FILES['imagenCreacion']) && $_FILES['imagenCreacion']['error'] === UPLOAD_ERR_OK) {
    $nombreTmp = $_FILES['imagenCreacion']['tmp_name'];
    $nombreOriginal = $_FILES['imagenCreacion']['name'];
    $nombreDestino = 'imgPokemon/' . basename($nombreOriginal);

    // Crear carpeta si no existe
    if (!is_dir('imgPokemon')) {
        mkdir('imgPokemon', 0777, true);
    }

    // Mover la imagen a la carpeta de destino
    if (move_uploaded_file($nombreTmp, $nombreDestino)) {

        $conn->query("INSERT INTO pokemon (img_url, tipo1, tipo2, numero_pokedex, nombre, descripcion,fase_pokemon, evoluciones) VALUES ('$nombreDestino', '$tipo1Obtenido', '$tipo2Obtenido', '$numeroPokedex', '$nombreObtenido', '$descripcionObtenido', '$fasePokemonObtenido','$evolucionesObtenido')");

        $_SESSION['messageExito'] = "El Pokemon ha sido creado exitosamente";
        header("location: index.php");
    } else {
        $_SESSION['messageError'] = "Hubo un error al mover la imagen";
        header("location: crear_pokemon.php");
    }
} else {
    $_SESSION['messageError'] = "No se recibio ninguna imagen valida";
    header("location: crear_pokemon.php");
}
}