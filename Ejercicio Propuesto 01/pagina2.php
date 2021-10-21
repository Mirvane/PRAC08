<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Pasajes Aereos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<style>
		h3{
		}
	</style>
</head>
<body>
	</body>
</html>
<?php
$costoBoleto = 150.00;
$today = date("Y-m-d");
$diff = date_diff(date_create($_REQUEST['fecha_nacimiento']), date_create($today));
if($_REQUEST['nombre'] != null && $_REQUEST['fecha_nacimiento'] != null && $_REQUEST['celular'] != null ){
	echo "<h1>"."Boleto Registrado con Exito!"."</h1>";
	echo "<hr />";
	echo "<h3>"."Detalle del Boleto:"."</h3>";
	echo "<h3>"."Nombre: "."</h3>". $_REQUEST['nombre']."<br>";
	echo "<h3>"."Fecha Nacimiento: "."</h3>". $_REQUEST['fecha_nacimiento']."<br>";
	echo "<h3>"."Celular: "."</h3>". $_REQUEST['celular']."<br>";
	echo "<h3>"."Edad: "."</h3>". $diff->format('%y')."<br>";
	echo "<h3>"."Destino: "."</h3>". $_REQUEST['destino']."<br>";
	echo "<h3>"."Descuento: "."</h3>";
	if($diff->format('%y') <= 2){
		echo "Aplica: Infantes (No pagan)"."<br>";
		$costoBoleto = 0.00;
	}else if($diff->format('%y') <= 17){
		echo "Aplica: Menores de Edad (75% de Descuento)"."<br>";
		$costoBoleto = $costoBoleto*0.75;
	}else{
		echo "No aplica"."<br>";
	}
	echo "<h3>"."Total a Pagar: "."</h3>".$costoBoleto;
}else{
	echo "Error: ¡Existe almenos 1 valor ingresado incorrectamente!";
}
?>
