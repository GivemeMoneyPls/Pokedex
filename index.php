<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/rodriguezAgustin/Pokedex/creacionDeTablas.php');
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <!-- Agregar Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body>
<!-- Contenedor principal -->
<div class="container mt-3">
    <!-- Fila para el título y el formulario -->
    <div class="row align-items-center mb-4">
        <!-- Logo de la Pokébola a la izquierda -->
        <div class="col-2">
            <img src="imgPokemon/Pokeball.png" alt="Pokébola" width="50">
        </div>
        <!-- Título centrado -->
        <div class="col text-center">
            <h1><a href="index.php" class="text-decoration-none text-black">Pokedex</a></h1>
        </div>
        <!-- Formulario de login a la derecha -->
        <div class="col-3">
            <?php
            if (!isset($_SESSION['user'])) {
            echo '
                    <form action="login.php" method="POST" class="d-flex justify-content-end">
                        <input type="text" name="user" class="form-control me-2" placeholder="Usuario">
                        <input type="password" name="pass" class="form-control me-2" placeholder="Contraseña">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>';
            }else{
                echo '<div class=""> <h2 class="">Bienvenido: ' . "{$_SESSION["user"]}" . '</h2>';
                echo "<a href='logout.php' class='btn btn-danger form-control me-2'>Desconectarse</a></div>";
            }

            ?>

        </div>
    </div>

    <!-- Formulario de búsqueda -->
    <form action="index.php" method="GET" class="d-flex justify-content-center mb-4 p-5">
        <input type="text" name="pokemon" class="form-control w-50" placeholder="Buscar Pokemon">
        <button type="submit" class="btn btn-primary ms-2">Buscar</button>
    </form>

    <!-- Tabla con el nuevo orden de columnas -->
    <table class="table table-bordered table-striped text-center" >
        <?php
        $conn = new MyDatabase();
        if (empty($_GET['pokemon'])) {
            $result = $conn->query("SELECT * FROM pokemon");
            crearTabla($result);
        }else{
            $pokemon = $_GET['pokemon'];
            $result = $conn->query("SELECT * FROM pokemon WHERE nombre = '$pokemon'");
            if (mysqli_num_rows($result) == 0) {
                echo '
                        <div class="alert alert-danger text-center" role="alert">
                            Pokémon no encontrado
                        </div>';
                $result = $conn->query("SELECT * FROM pokemon");
            }
            crearTabla($result);
        }
        ?>
    </table>

        <?php
            if (isset($_SESSION['user'])) {
                echo '<a href = "crearPokemon.php" class="btn btn-success w-100 mt-4 mb-4" > Crear un nuevo Pokémon </a >
            </div>';
            }
            ?>

</body>
</html>