<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SubirArchivo</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@300&display=swap');
        *{
            font-family: 'Noto Sans Mono', monospace;
        }
        body{
            background-image: url('fondo3.jpg');
            color: white;
              background-repeat: no-repeat;
              background-attachment: fixed;
        }
    </style>
</head>
<body>
    <form  method="post" enctype="multipart/form-data">
        <h1>Subida de Archivos </h1>
        <select name="espec">
            <option value="Estadistica">Estadistica</option>
            <option value="DesarrolloWeb">DesarrolloWeb</option>
            <option value="Testing">Testing</option>
            <option value="Sistemas Administrativos">Sistemas Administrativo</option>
        </select>
        
        <input type="file" name="file"/>
        <button type="submit" name="submit">Subir Archivo</button>
        <hr />
        <br />
        <select name="espec2">
            <option value="Estadistica">Estadistica</option>
            <option value="DesarrolloWeb">DesarrolloWeb</option>
            <option value="Testing">Testing</option>
            <option value="Sistemas Administrativos">Sistemas Administrativo</option>
        </select>
        <button id="test" type="submit" name="showfields"> Mostrar Archivos</button>
    </form>

</body>
</html>
<?php
session_start();
if (isset($_POST['showfields'])){
    $_SESSION['LOCATED'] = $_POST['espec2'];
    $resource = opendir($_POST['espec2']);
    $array_a = array();
    while(($entry = readdir($resource)) !== FALSE){
        if(($entry != '.' && $entry != '..')){
            $array_a[] = $entry; 
        }
    }
    echo "<br>"."Seleccione un archivo PDF y presione el boton para ver en linea:";
    $select= "<form method='post'><select name='files'>
                    <option disabled selected>
                         Select PDF
                    </option>";
    for ($x=0;$x<count($array_a); $x++){
        $select .="<option value='".$array_a[$x]."'>".$array_a[$x]."</option>";
    } 
    
    $select.='</select>';
    $select.= "<input type='submit' name='verl' value='Ver en Liena' /></form>";
    echo $select;
}
if (isset($_POST['verl'])){
    $_SESSION['FILENAME'] = $_POST['files'];
    header('Location:read.php');
}
if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileNomb = $_FILES['file']['name'];
    $fileTempNomb = $_FILES['file']['tmp_name'];
    $fileTaman = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileTipo = $_FILES['file']['type'];
    $fileExt = explode(".", $fileNomb);
    $fileActualExt = strtolower(end($fileExt));
    $permitidos = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $permitidos)){
        if ($fileError === 0){
            if ($fileTaman < 9000000){
                $fileDestino = $_POST['espec'].'/'.$fileNomb;
                move_uploaded_file($fileTempNomb, $fileDestino);
                header("Location: index.php?archivosubido");
            }
        }else{
            echo "Ocurrio un error al subir el archivo!";
        }
    }else{
        echo "No puedes subir este tipo de archivos!";
    }
}
?>

