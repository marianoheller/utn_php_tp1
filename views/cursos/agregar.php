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
    <input type="text" name="turno" value=""><br>
    <input type="submit" value="enviar">

</form>
</body>
</html>