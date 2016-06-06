<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar curso</title>
</head>
<body>

<form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post">
    <input type="hidden" name="id" value=""/>
    <input type="text" name="nombre" value=""><br>
    <input type="text" name="edad" value=""><br>
    <select name="curso_id">
        <?php foreach($cursos as $curso) { ?>
            <option value="<?php echo $curso->id?>"><?php echo $curso->nombre?></option>
            <?php } ?>
    </select>
    <input type="submit" value="enviar">

</form>
</body>
</html>