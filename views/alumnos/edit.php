<?php
/** @var Alumno $alumno */
/** @var Curso $curso */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar alumno</title>
</head>
<body>
<?php if( isset( $rowsUpdated) )
    echo "<p>$rowsUpdated filas editadas correctamente.";
?>
<form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post">
    <input type="hidden" name="id" value="<?php echo $alumno->id?>"/>
    <input type="text" name="nombre" value="<?php echo $alumno->nombre?>"><br>
    <input type="text" name="edad" value="<?php echo $alumno->edad?>"><br>
    <select name="curso_id">
    <?php foreach($cursos as $curso) {
        if ( $alumno->curso_id == $curso->id) { ?>
            <option value="<?php echo $curso->id?>" selected><?php echo $curso->nombre?></option>
        <?php }
        else { ?>
            <option value="<?php echo $curso->id?>"><?php echo $curso->nombre?></option>
        <?php }
    } ?>
    </select>
    <input type="submit" value="enviar">
</form>
</body>
</html>