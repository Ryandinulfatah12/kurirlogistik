<?php

 
include('../../database-settings.php');
// asignamos la función de conexion a una variable
$con = conexion();
// recuperamos y asignamos a variables los campos enviados por ajax metodo POST
$name = $_POST['name'];
$packaging = $_POST['packaging'];
$dimensions = $_POST['dimensions'];
// verificamos si esta marcado el check box activo
if(isset($_POST['estado']))
$estado = $_POST['estado'];
else
$estado = 0;


// Cotroles Basicos, evitar campos vacios
if(empty($name)){
	echo json_encode(array('msg' => 'nomvacio')); //retornamos mensaje de error
	exit(); // salimos de la ejecución
}
elseif(empty($packaging)){
	echo json_encode(array('msg' => 'apevacio'));
	exit();
}
elseif(empty($dimensions)){
	echo json_encode(array('msg' => 'telvacio'));
	exit();
}





// insertamos en la base de datos - hacemos una consulta SQL
$consulta = "INSERT INTO type_shipments (name,packaging,dimensions,estado) VALUES('$name','$packaging','$dimensions','$estado')";
$con->query($consulta); // enviamos la consulta al método query
// retornamos un mensaje de confirmación
echo json_encode(array('msg' => 'ok'));

?>