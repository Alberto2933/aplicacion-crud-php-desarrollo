<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>LOL</title>
</head>
<body>
<div>
    <header>
        <h1>LOL</h1>
    </header>
   
    <main>              
    <ul>
        <li><a href="index.php" >Inicio</a></li>
        <li><a href="add.html" >Alta</a></li>
    </ul>
    <h2>Modificación jugador/a</h2>

<?php

// Verificar si el id está presente en la URL
if (!isset($_GET['jugador_id']) || !is_numeric($_GET['jugador_id'])) {
    die("ID de jugador no válido.");
}

// Recoge el id del jugador y lo protege contra inyecciones SQL
$jugador_id = intval($_GET['jugador_id']);

// Se selecciona el registro a modificar
$resultado = $mysqli->query("SELECT apellido, nombre, edad, equipo, dinero, anios_activo FROM JugadoresLOL WHERE jugador_id = $jugador_id");

// Verificar si se encontró el jugador
if ($resultado->num_rows == 0) {
    die("Jugador no encontrado.");
}

// Se extrae el registro y lo guarda en el array $fila
$fila = $resultado->fetch_assoc();
$surname = $fila['apellido'];
$name = $fila['nombre'];
$age = $fila['edad'];
$team = $fila['equipo'];
$money = $fila['dinero'];
$year_active = $fila['anios_activo'];

// Se cierra la conexión de base de datos
$mysqli->close();
?>

    <form action="edit_action.php" method="post">
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>

        <div>
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" value="<?php echo htmlspecialchars($surname); ?>" required>
        </div>

        <div>
            <label for="age">Edad</label>
            <input type="number" name="age" id="age" value="<?php echo $age; ?>" required>
        </div>

        <div>
            <label for="team">Equipo</label>
            <select name="team" id="team">
                <option value="<?php echo htmlspecialchars($team); ?>" selected><?php echo htmlspecialchars($team); ?></option>
                <option value="SKT">SKT</option>
                <option value="MAD_Lions">MAD_Lions</option>
                <option value="G2easports">G2easports</option>
                <option value="KOI">KOI</option>
                <option value="T1">T1</option>
                <option value="100man">100man</option>
            </select>  
        </div>

        <div>
            <label for="money">Dinero</label>
            <input type="number" name="money" id="money" value="<?php echo $money; ?>">
        </div>

        <div>
            <label for="year_active">Anios Activo</label>
            <input type="number" name="year_active" id="year_active" value="<?php echo $year_active; ?>">
        </div>

        <div>
            <input type="hidden" name="jugador_id" value="<?php echo $jugador_id; ?>">
            <input type="submit" name="modifica" value="Guardar">
            <input type="button" value="Cancelar" onclick="location.href='index.php'">
        </div>
    </form>
    </main>
    <footer>
        Created by ALBERTO CAMACHO &copy; 2024
    </footer>
</div>
</body>
</html>
