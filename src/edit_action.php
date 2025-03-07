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
 
<?php
/*Se comprueba si se ha llegado a esta página PHP a través del formulario de edición.
Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
Los datos del formulario se acceden por el método: POST
*/
 
if(isset($_POST['modifica'])) {
/*Se obtienen los datos del jugador (id, nombre, apellido, edad, equipo, dinero, anios_activo) a partir del formulario de edición (jugador_id, name, surname, age, team, money, year_active) por el método POST.
Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
Recuerda que existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del jugador se obtiene a través de la clave: $_GET['jugador_id']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/
 
    $jugador_id = $mysqli->real_escape_string($_POST['jugador_id']);
    $name = $mysqli->real_escape_string($_POST['name']);
    $surname = $mysqli->real_escape_string($_POST['surname']);
    $age = $mysqli->real_escape_string($_POST['age']);
    $team = $mysqli->real_escape_string($_POST['team']);
    $money = $mysqli->real_escape_string($_POST['money']);
    $year_active = $mysqli->real_escape_string($_POST['year_active']);
   
 
/*Con mysqli_real_escape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL.
Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
Ejemplo: Entrada sin escapar: "O'Reilly" contiene una comilla simple (').
Escapado con mysqli_real_escape_string(): Se convierte en "O\'Reilly", evitando que la comilla se interprete como el fin de una cadena en SQL.
*/  
 
//Se comprueba si existen campos del formulario vacíos
    if(empty($jugador_id) || empty($name) || empty($surname) || empty($age) || empty($team)) {
        if(empty($jugador_id)) {
            echo "<font color='red'>Campo ID vacío.</font><br/>";
        }
 
        if(empty($name)) {
            echo "<font color='red'>Campo nombre vacío.</font><br/>";
        }
 
        if(empty($surname)) {
            echo "<font color='red'>Campo apellido vacío.</font><br/>";
        }
 
        if(empty($age)) {
            echo "<font color='red'>Campo edad vacío.</font><br/>";
        }

        if(empty($team)) {
            echo "<font color='red'>Campo equipo vacío.</font><br/>";
        }
     
    } else { //Se realiza la modificación de un registro de la BD.
        //Se actualiza el registro a modificar: UPDATE
        $mysqli->query("UPDATE JugadoresLOL SET nombre = '$name', apellido = '$surname', edad = '$age', equipo = '$team', dinero = '$money', anios_activo = '$year_active' WHERE jugador_id = $jugador_id");
        $mysqli->close();
        echo "<div>Registro editado correctamente...</div>";
        echo "<a href='index.php'>Ver resultado</a>";
        //Se redirige a la página principal: index.php
        //header("Location: index.php");
    }// fin sino
}//fin si
?>
 
    <!--<div>Registro editado correctamente</div>
    <a href='index.php'>Ver resultado</a>-->
    </main>
</div>
</body>
</html>
