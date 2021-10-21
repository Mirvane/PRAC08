<?php
if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileNomb = $_FILES['file']['name'];
    $fileTempNomb = $_FILES['file']['tmp_name'];
    $fileTaman = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileTipo = $_FILES['file']['type'];
    $fileExt = explode(".", $fileNomb);
    $fileActualExt = strtolower(end($fileExt));
    $permitidos = array('pdf');
    if (in_array($fileActualExt, $permitidos)){
        if ($fileError === 0){
            if ($fileTaman < 1000000){
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