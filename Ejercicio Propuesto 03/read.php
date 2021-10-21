<?php
session_start();
$file = $_SESSION['FILENAME'];
$loc = $_SESSION['LOCATED'];
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $file . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($loc."/".$file);
?>