<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');
$conn = new MyDatabase();
$pokemon = $_GET["pokemon"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex - Evoluciones</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .icon-horizontal {
            display: inline-block;
        }

        .icon-vertical {
            display: none;
        }

        @media (max-width: 576px) {
            .icon-horizontal {
                display: none !important;
            }
            .icon-vertical {
                display: inline-block !important;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Título y logo -->
    <div class="row align-items-center mb-4">
        <div class="col-2">
            <img src="imgPokemon/Pokeball.png" alt="Pokébola" width="50">
        </div>
        <div class="col text-center">
            <h1><a href="index.php" class="text-decoration-none text-black">Pokedex</a></h1>
        </div>
        <div class="col-3"></div>
    </div>

    <!-- Detalle del Pokémon principal -->
    <?php
    $result = $conn->query("SELECT * FROM pokemon WHERE nombre = '$pokemon'");
    $obtenido = mysqli_fetch_assoc($result);

    echo "<div class='row justify-content-center align-items-center mb-5'>";

    echo "<div class='col-md-4 text-center'>";
    echo "<div class='bg-light p-3 rounded d-inline-block'>";
    echo "<img src='{$obtenido['img_url']}' alt='{$obtenido['nombre']}' class='img-fluid' style='max-width: 300px;'>";
    echo "</div>";
    echo "</div>";

    echo "<div class='col-md-6'>";
    echo "<h2 class='text-center text-md-start'>{$obtenido['nombre']}</h2>";
    echo "<p><strong>#{$obtenido['numero_pokedex']}</strong></p>";
    echo "<p class='lead'>{$obtenido['descripcion']}</p>";

    echo "<img src='./imgTipo/{$obtenido['tipo1']}.png' width='50'>";
    if (!is_null($obtenido["tipo2"])) {
        echo "<img src='./imgTipo/{$obtenido['tipo2']}.png' width='50'>";
    }
    echo "</div>";

    echo "</div>";
    ?>
    <!--
        Sección de Evoluciones
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">Evoluciones de Charmander</h2>

            <div class="d-flex flex-wrap justify-content-center align-items-center">
                Charmander
                <div class="text-center mb-4 mx-2 col-12 col-md-auto">
                    <div class="bg-light p-3 rounded d-inline-block">
                        <img src="./imgPokemon/charmander.png" alt="Charmander" class="img-fluid" style="max-width: 150px;">
                    </div>
                    <h4 class="mt-2">Charmander</h4>
                    <p>#004</p>
                    <p>Tipo: Fuego</p>
                </div>

                 Ícono 1
                <div class="d-flex align-items-center justify-content-center mb-4 mx-2 col-auto" style="height: 100px;">
                    <i class="fas fa-greater-than icon-horizontal" style="font-size: 30px;"></i>
                    <i class="fas fa-angle-down icon-vertical" style="font-size: 30px;"></i>
                </div>

                Charmeleon
                <div class="text-center mb-4 mx-2 col-12 col-md-auto">
                    <div class="bg-light p-3 rounded d-inline-block">
                        <img src="./imgPokemon/charmeleon.png" alt="Charmeleon" class="img-fluid" style="max-width: 150px;">
                    </div>
                    <h4 class="mt-2">Charmeleon</h4>
                    <p>#005</p>
                    <p>Tipo: Fuego</p>
                </div>

                Ícono 2
                <div class="d-flex align-items-center justify-content-center mb-4 mx-2 col-auto" style="height: 100px;">
                    <i class="fas fa-greater-than icon-horizontal" style="font-size: 30px;"></i>
                    <i class="fas fa-angle-down icon-vertical" style="font-size: 30px;"></i>
                </div>

                Charizard
                <div class="text-center mb-4 mx-2 col-12 col-md-auto">
                    <div class="bg-light p-3 rounded d-inline-block">
                        <img src="./imgPokemon/charizard.png" alt="Charizard" class="img-fluid" style="max-width: 150px;">
                    </div>
                    <h4 class="mt-2">Charizard</h4>
                    <p>#006</p>
                    <p>Tipo: Fuego/Volador</p>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>







