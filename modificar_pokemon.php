<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/sin_permisos.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/mensaje_error.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/MyDatabase.php');

$idPokemonObtenido = $_GET['idPokemon'];

$conn = new MyDatabase();
$result = $conn->query("SELECT * FROM pokemon WHERE id = $idPokemonObtenido");
$obtenido = mysqli_fetch_assoc($result);
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

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Tarjeta de Pokémon actual -->
            <div class="card shadow-sm mb-4">
                <div class="card-header text-center">
                    <?php echo "<h4>Datos actuales de {$obtenido['nombre']} </h4>"?>
                </div>
                <div class="card-body">
                    <!-- Vista previa actual -->
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <?php
                            echo "<img src='{$obtenido['img_url']}' alt='{$obtenido['nombre']}' class='img-fluid' style='width: 150px;'>";
                            ?>

                            <p class="mt-2"><strong>Imagen actual</strong></p>
                        </div>
                        <div class="col-md-8">
                            <?php
                                echo "<p><strong>N° Pokedex: </strong>#{$obtenido['numero_pokedex']}</p>";
                                echo "<p><strong>Nombre: </strong>{$obtenido['nombre']}</p>";
                                echo "<p><strong>Tipo 1: </strong><img src='imgTipo/{$obtenido['tipo1']}.png' width='50'></p>";
                                if (empty($obtenido["tipo2"])) {
                                    echo "<p><strong>Tipo 2: </strong></p>";
                                }else{
                                    echo "<p><strong>Tipo 2: </strong><img src='imgTipo/{$obtenido['tipo2']}.png' width='50'></p>";
                                }
                                echo "<p><strong>Descripción: </strong>{$obtenido['descripcion']}</p>";
                                echo "<p><strong>Fase: </strong>{$obtenido['fase_pokemon']}</p>";
                                echo "<p><strong>N° Pokedex evoluciones o prevoluciones: </strong>{$obtenido['evoluciones']}</p>";
                                ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta para modificar los datos -->
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <?php echo "<h4>Modificar Pokémon - {$obtenido['nombre']}</h4>" ?>
                </div>
                <div class="card-body">
                    <!-- Formulario de modificación -->
                    <form action="procesar_modificacion.php" method="POST" enctype="multipart/form-data">

                       <?php echo "<input type='hidden' name='idModificacion' value='{$obtenido['id']}'>" ?>

                        <!-- Selector de archivo y vista previa en la misma fila -->
                        <div class="row align-items-center mb-4">
                            <!-- Selector de archivo (a la izquierda) -->
                            <div class="col-md-6">
                                <label for="imagenModificacion" class="form-label">Nueva imagen</label>
                                <input class="form-control" type="file" id="imagenModificacion" name="imagenModificacion" accept="image/*" onchange="mostrarVistaPrevia(event)">
                            </div>

                            <!-- Vista previa (a la derecha) y centrada verticalmente -->
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <img src="misc/PokemonWho.jpg" alt="Vista previa" id="imagen-preview" class="img-fluid" style="width: 150px; border-radius: 1em;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nombreModificacion" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreModificacion" name="nombreModificacion">
                        </div>

                        <div class="mb-3">
                            <label for="numeroPokedexModificacion" class="form-label">Número Pokédex</label>
                            <input type="number" class="form-control" id="numeroPokedexModificacion" name="numeroPokedexModificacion"">
                        </div>

                        <div class="mb-3">
                            <label for="tipo1Modificacion" class="form-label">Tipo 1</label>
                            <select class="form-select" id="tipo1Modificacion" name="tipo1Modificacion">
                                <option value="Fuego" selected>Fuego</option>
                                <option value="Agua">Agua</option>
                                <option value="Planta">Planta</option>
                                <option value="Bicho">Bicho</option>
                                <option value="Volador">Volador</option>
                                <option value="Veneno">Veneno</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tipo2Modificacion" class="form-label">Tipo 2 (opcional)</label>
                            <select class="form-select" id="tipo2Modificacion" name="tipo2Modificacion">
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
                            <label for="descripcionModificacion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcionModificacion" name="descripcionModificacion" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="fasePokemonModificacion" class="form-label">Fase pokemon</label>
                            <select class="form-select" id="fasePokemonModificacion" name="fasePokemonModificacion">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="evolucionesModificacion" class="form-label">Numero pokedex de evoluciones o preevoluciones (N°,N°)</label>
                            <input type="text" class="form-control" id="evolucionesModificacion" name="evolucionesModificacion">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
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