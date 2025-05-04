<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/sin_permisos.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');

$conn = new MyDatabase();

$idPokemonObtenido = $_POST['idModificacion'];

$nombreObtenido = $_POST['nombreModificacion'];
$tipo1Obtenido = $_POST['tipo1Modificacion'];
$descripcionObtenido = $_POST['descripcionModificacion'];
$numeroPokedex = $_POST['numeroPokedexModificacion'];
$fasePokemonObtenido = $_POST['fasePokemonModificacion'];
$evolucionesObtenido = $_POST['evolucionesModificacion'];

if ( empty($nombreObtenido) ||
    empty($tipo1Obtenido) ||
    empty($descripcionObtenido) ||
    empty($numeroPokedex) ||
    empty($fasePokemonObtenido) ||
    empty($evolucionesObtenido))
{
    $_SESSION['messageError'] = "Rellene todos los campos por favor";
    header("location: modificar_pokemon.php?idPokemon={$idPokemonObtenido}");
}else{

    if (isset($_FILES['imagenModificacion']) && $_FILES['imagenModificacion']['error'] === UPLOAD_ERR_OK) {
        $nombreTmp = $_FILES['imagenModificacion']['tmp_name'];
        $nombreOriginal = $_FILES['imagenModificacion']['name'];
        $nombreDestino = 'imgPokemon/' . basename($nombreOriginal);



        // Crear carpeta si no existe
        if (!is_dir('imgPokemon')) {
            mkdir('imgPokemon', 0777, true);
        }

        // Mover la imagen a la carpeta de destino
        if (move_uploaded_file($nombreTmp, $nombreDestino)) {
            $conn->query("UPDATE pokemon
                    SET img_url = '{$nombreDestino}',
                    nombre = '{$_POST['nombreModificacion']}',
                    tipo1 = '{$_POST['tipo1Modificacion']}',
                    tipo2 = '{$_POST['tipo2Modificacion']}',
                    numero_pokedex = {$_POST['numeroPokedexModificacion']},
                    descripcion = '{$_POST['descripcionModificacion']}',
                    fase_pokemon = {$_POST['fasePokemonModificacion']},
                    evoluciones = '{$_POST['evolucionesModificacion']}'
                WHERE id = {$idPokemonObtenido}");
            $_SESSION['messageExito'] = "El Pokemon ha sido modificado correctamente";
            header("location: detalle_pokemon.php?idPokemon={$idPokemonObtenido}");
        } else {
            $_SESSION['messageError'] = "Hubo un error al mover la imagen";
            header("location: modificar_pokemon.php?idPokemon={$idPokemonObtenido}");
        }
    } else {

        $_SESSION['messageError'] = "No se recibio ninguna imagen";
        header("location: modificar_pokemon.php?idPokemon={$idPokemonObtenido}");
    }


}