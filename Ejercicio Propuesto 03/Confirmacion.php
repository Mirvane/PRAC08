<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Inscripcion</title>
    <style>
        table, th, td{
            background:#ddd7f8;
            border: 1px solid black;
            border-collapse: collapse;
            text-align:left;
            padding-left:1em;
        }
        th, td {
            height: 35px;
            width: 150px;
        }
        .submit{
            text-align:center;
        }
    </style>
</head>
<body>
    <form>
        <table>
            <?php
            echo "<tr>";
            echo "<td>"."<h4>"."Nombre Completo"."</h4>"."</td>";
            echo "<td>".$_REQUEST['nombre']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>"."<h4>"."Direccion"."</h4>"."</td>";
            echo "<td>".$_REQUEST['direccion']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>"."<h4>"."Correo electronico"."</h4>"."</td>";
            echo "<td>".$_REQUEST['correo_electronico']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>"."<h4>"."Contraseña"."</h4>"."</td>";
            echo "<td>".$_REQUEST['contrasenia']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>"."<h4>"."Fecha de"."<br>"."nacimiento"."</h4>"."</td>";
            if(isset($_POST['submit'])){
                $getmes = $_POST['mes'];
            }
            if ($_REQUEST['dia'] != null && $getmes != null && $_REQUEST['anio'] != null ){
                echo "<td>".$_REQUEST['dia']."/".$getmes."/".$_REQUEST['anio']."</td>";
            }
            echo "<td>"."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>"."<h4>"."Sexo"."</h4>"."</td>";
            if(isset($_POST['gender'])){
                if($_POST['gender']=="female"){
                    $genero = 'Mujer';
                }else{
                    $genero = 'Hombre';
                }
            }
            echo "<td>".$genero."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>"."<h4>"."Por favor, elige los"."<br>"."temas de interes"."</h4>"."</td>";
            if(isset($_POST['ficcion'])){
                if ($_POST==true){
                    $temas.="Ficcion"."<br>";
                }
            }
            if(isset($_POST['terror'])){
                if ($_POST==true){
                    $temas.="Terror"."<br>";
                }
            }
            if(isset($_POST['accion'])){
                if ($_POST==true){
                    $temas.="Accion"."<br>";
                }
            }
            if(isset($_POST['comedia'])){
                if ($_POST==true){
                    $temas.="Comedia"."<br>";
                }
            }
            if(isset($_POST['suspenso'])){
                if ($_POST==true){
                    $temas.="Suspenso"."<br>";
                }
            }
            echo "<td>".$temas."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>"."<h4>"."Aficiones"."<br>"."seleccionadas"."</h4>"."</td>";
            if(isset($_POST['submit'])){

                if (!empty($_POST['aficciones'])){
                    foreach ($_POST['aficciones'] as $selected){
                       $mostrar.= $selected."<br>";
                    }
                }
            }
            echo "<td>".$mostrar."</td>";
            echo "</tr>";
            echo "<tr>";
            echo  "<td class='submit' colspan='2'>";
            echo "<input type='submit' name='Confirmar' value='Confirmar' />";
            echo "</td>";
            echo "</tr>";
            ?>
        </table>
    </form>
    </body>
</html>
