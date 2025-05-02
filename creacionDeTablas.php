<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');
function crearTabla($datos)
{
    echo "<thead class='table-light'>";
    echo "<tr><th>Imagen</th>";
    echo "<th>Tipo 1</th>";
    echo "<th>Tipo 2</th>";
    echo "<th>Numero</th>";
    echo "<th>Nombre</th>";
    if (isset($_SESSION['user'])) {
        echo "<th>Acciones</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";

    while ($fila = mysqli_fetch_assoc($datos)) {

            echo "<tr> <td class='align-middle'><a href='detallePokemon.php?pokemon={$fila["nombre"]}'><img src='{$fila["img_url"]}' alt='{$fila["nombre"]}' width='70'</a></td>";
            echo "<td class='align-middle'><img src='./imgTipo/{$fila["tipo1"]}.png' width='50'></td>";
            if (!is_null($fila["tipo2"])) {
                echo "<td class='align-middle'><img src='./imgTipo/{$fila["tipo2"]}.png' width='50'></td>";
            }else{
                echo "<td class='align-middle'></td>";
            }
            echo "<td class='align-middle'>#{$fila["numero_pokedex"]}</td>";
            echo "<td class='align-middle'>{$fila["nombre"]}</td>";
            if (isset($_SESSION['user'])) {
                echo "<td class='align-middle'>";
                echo "<a href='modificarPokemon.php?pokemon={$fila["id"]}' class='btn btn-info'>Modificar</a> ";
                echo "<a href='eliminarPokemon.php?pokemon={$fila["id"]}' class='btn btn-danger'>Eliminar</a></td>";
            }

            echo "</tr>";
        }
        echo "</tbody>";
}

