<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');
function crearTabla($datos)
{
    $result = "";
    $result .= "<thead class='table-light'> 
                <tr>
                <th>Imagen</th>
                <th>Tipo 1</th>
                <th>Tipo 2</th>
                <th>Numero</th>
                <th>Nombre</th>";
    if (isset($_SESSION['user'])) {
        $result.= "<th>Acciones</th>";
    }
    $result.= "</tr></thead>
               <tbody>";

    while ($fila = mysqli_fetch_assoc($datos)) {

            $result .= "<tr>
                            <td class='align-middle'><a href='detalle_pokemon.php?idPokemon={$fila["id"]}'><img src='{$fila["img_url"]}' alt='{$fila["nombre"]}' width='70'</a></td>
                            <td class='align-middle'><img src='imgTipo/{$fila["tipo1"]}.png' width='50'></td>";
            if (empty($fila["tipo2"])) {
                $result.= "<td class='align-middle'></td>";
            }else{
                $result.= "<td class='align-middle'><img src='imgTipo/{$fila["tipo2"]}.png' width='50'></td>";
            }
                $result.= "<td class='align-middle'>#{$fila["numero_pokedex"]}</td>
                           <td class='align-middle'>{$fila["nombre"]}</td>";
            if (isset($_SESSION['user'])) {
                $result.= "<td class='align-middle'>
                           <a href='modificar_pokemon.php?idPokemon={$fila["id"]}' class='btn btn-info'>Modificar</a> 
                           <a href='eliminar_pokemon.php?idPokemon={$fila["id"]}' class='btn btn-danger'>Eliminar</a></td>";
            }

            $result.= "</tr>";
        }
        $result.= "</tbody>";
    return $result;
}

/*
 * echo "<thead class='table-light'>";
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

            echo "<tr> <td class='align-middle'><a href='detalle_pokemon.php?pokemon={$fila["nombre"]}'><img src='{$fila["img_url"]}' alt='{$fila["nombre"]}' width='70'</a></td>";
            echo "<td class='align-middle'><img src='imgTipo/{$fila["tipo1"]}.png' width='50'></td>";
            if (!is_null($fila["tipo2"])) {
                echo "<td class='align-middle'><img src='imgTipo/{$fila["tipo2"]}.png' width='50'></td>";
            }else{
                echo "<td class='align-middle'></td>";
            }
            echo "<td class='align-middle'>#{$fila["numero_pokedex"]}</td>";
            echo "<td class='align-middle'>{$fila["nombre"]}</td>";
            if (isset($_SESSION['user'])) {
                echo "<td class='align-middle'>";
                echo "<a href='modificar_pokemon.php?idPokemon={$fila["id"]}' class='btn btn-info'>Modificar</a> ";
                echo "<a href='eliminar_pokemon.php?idPokemon={$fila["id"]}' class='btn btn-danger'>Eliminar</a></td>";
            }

            echo "</tr>";
        }
        echo "</tbody>";
 */

