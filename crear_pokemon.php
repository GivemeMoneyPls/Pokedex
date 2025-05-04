<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/sin_permisos.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/mensaje_error.php');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Pokémon - Charmander</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <!-- Título y logo -->
    <div class="row align-items-center mb-4">
        <!-- Logo de la Pokébola a la izquierda -->
        <div class="col-2">
            <a href="index.php"><img src="misc/Pokeball.png" alt="Pokebola" width="50"></a>
        </div>
        <!-- Título centrado -->
        <div class="col text-center">
            <h1><a href="index.php" class="text-decoration-none text-black">Pokedex</a></h1>
        </div>
        <!-- Formulario de login a la derecha -->
        <div class="col-3">
            <?php
                echo '<div class=""> <h2 class="">Bienvenido: ' . "{$_SESSION["user"]}" . '</h2>';
                echo "<a href='logout.php' class='btn btn-danger form-control me-2'>Desconectarse</a></div>";
            ?>
        </div>
    </div>

    <div class="card shadow-sm mt-3">
        <div class="card-header text-center">
            <h4>Crear Pokemon</h4>
        </div>
        <div class="card-body">
            <!-- Formulario de modificación -->
            <form action="procesar_creacion.php" method="POST" enctype="multipart/form-data">

                <!-- Selector de archivo y vista previa en la misma fila -->
                <div class="row align-items-center mb-4">
                    <!-- Selector de archivo (a la izquierda) -->
                    <div class="col-md-6">
                        <label for="imagenCreacion" class="form-label">Nueva imagen</label>
                        <input class="form-control" type="file" id="imagenCreacion" name="imagenCreacion" accept="image/*" onchange="mostrarVistaPrevia(event)">
                    </div>

                    <!-- Vista previa (a la derecha) y centrada verticalmente -->
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <img src="misc/PokemonWho.jpg" alt="Vista previa" id="imagen-preview" class="img-fluid mt-2" style="width: 200px; border-radius: 1em;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nombreCreacion" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreCreacion" name="nombreCreacion">
                </div>

                <div class="mb-3">
                    <label for="numeroPokedexCreacion" class="form-label">Número Pokédex</label>
                    <input type="number" class="form-control" id="numeroPokedexCreacion" name="numeroPokedexCreacion">
                </div>

                <div class="mb-3">
                    <label for="tipo1Creacion" class="form-label">Tipo 1</label>
                    <select class="form-select" id="tipo1Creacion" name="tipo1Creacion">
                        <option value="Fuego" selected>Fuego</option>
                        <option value="Agua">Agua</option>
                        <option value="Planta">Planta</option>
                        <option value="Bicho">Bicho</option>
                        <option value="Volador">Volador</option>
                        <option value="Veneno">Veneno</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipo2Creacion" class="form-label">Tipo 2 (opcional)</label>
                    <select class="form-select" id="tipo2Creacion" name="tipo2Creacion">
                        <option value="" selected>Ninguno</option>
                        <option value="Fuego">Fuego</option>
                        <option value="Agua">Agua</option>
                        <option value="Planta">Planta</option>
                        <option value="Bicho">Bicho</option>
                        <option value="Volador">Volador</option>
                        <option value="Veneno">Veneno</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="descripcionCreacion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcionCreacion" name="descripcionCreacion" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="fasePokemonCreacion" class="form-label">Fase pokemon</label>
                    <select class="form-select" id="fasePokemonCreacion" name="fasePokemonCreacion">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="evolucionesCreacion" class="form-label">Numero pokedex de evoluciones o preevoluciones (N°,N°)</label>
                    <input type="text" class="form-control" id="evolucionesCreacion" name="evolucionesCreacion">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Crear Pokemon</button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</div>

<script>
    function mostrarVistaPrevia(event) {
        const reader = new FileReader();
        reader.onload = function(){
            document.getElementById('imagen-preview').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>