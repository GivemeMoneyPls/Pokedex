<?php

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
            <h1>Pokedex</h1>
        </div>
        <div class="col-3"></div>
    </div>

    <!-- Detalle del Pokémon principal -->
    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-md-4 text-center">
            <div class="bg-light p-3 rounded d-inline-block">
                <img src="./imgPokemon/charmander.png" alt="Charmander" class="img-fluid" style="max-width: 300px;">
            </div>
        </div>

        <div class="col-md-6">
            <h2 class="text-center text-md-start">Charmander</h2>
            <p class="lead">
                Charmander tiene una llama encendida en la punta de su cola que refleja su salud emocional.
                Si está feliz, la llama brilla con fuerza. Le encanta estar en lugares cálidos.
            </p>
            <p><strong>#004</strong></p>
            <p><strong>Tipo:</strong> Fuego</p>
        </div>
    </div>

    <!-- Sección de Evoluciones -->
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">Evoluciones de Charmander</h2>

            <div class="d-flex flex-wrap justify-content-center align-items-center">
                <!-- Charmander -->
                <div class="text-center mb-4 mx-2 col-12 col-md-auto">
                    <div class="bg-light p-3 rounded d-inline-block">
                        <img src="./imgPokemon/charmander.png" alt="Charmander" class="img-fluid" style="max-width: 150px;">
                    </div>
                    <h4 class="mt-2">Charmander</h4>
                    <p>#004</p>
                    <p>Tipo: Fuego</p>
                </div>

                <!-- Ícono 1 -->
                <div class="d-flex align-items-center justify-content-center mb-4 mx-2 col-auto" style="height: 100px;">
                    <i class="fas fa-greater-than icon-horizontal" style="font-size: 30px;"></i>
                    <i class="fas fa-angle-down icon-vertical" style="font-size: 30px;"></i>
                </div>

                <!-- Charmeleon -->
                <div class="text-center mb-4 mx-2 col-12 col-md-auto">
                    <div class="bg-light p-3 rounded d-inline-block">
                        <img src="./imgPokemon/charmeleon.png" alt="Charmeleon" class="img-fluid" style="max-width: 150px;">
                    </div>
                    <h4 class="mt-2">Charmeleon</h4>
                    <p>#005</p>
                    <p>Tipo: Fuego</p>
                </div>

                <!-- Ícono 2 -->
                <div class="d-flex align-items-center justify-content-center mb-4 mx-2 col-auto" style="height: 100px;">
                    <i class="fas fa-greater-than icon-horizontal" style="font-size: 30px;"></i>
                    <i class="fas fa-angle-down icon-vertical" style="font-size: 30px;"></i>
                </div>

                <!-- Charizard -->
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>







