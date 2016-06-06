<?php
/** @var Alumno $alumno */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar curso</title>
</head>
<body>
<?php if( isset( $rowsUpdated) )
    echo "<p>$rowsUpdated filas editadas correctamente.";
?>
<form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post">
    <input type="hidden" name="id" value="<?php echo $alumno->id?>"/>
    <input type="text" name="nombre" value="<?php echo $alumno->nombre?>"><br>
    <input type="text" name="edad" value="<?php echo $alumno->edad?>"><br>
    <input type="submit" value="enviar">

</form>
</body>
</html>