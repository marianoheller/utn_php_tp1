<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de cursos</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm("¿Desea borrar el registro?");
        }
    </script>
</head>
<body>
<p>Listado de alumnos</p>

<table border="1">
    <thead>
    <th>Id</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Curso</th>
    <th>Accion</th>
    </thead>
    <tbody>
    <?php foreach($alumnos as $alumno) { ?>
        <tr>
            <td><?php echo $alumno["id"];?></td>
            <td><?php echo $alumno["nombre"];?></td>
            <td><?php echo $alumno["edad"];?></td>
            <td><?php echo $alumno["curso"];?></td>
            <td>
                <a href='?controller=alumnos&action=show&id=<?php echo $alumno["id"]; ?>'>Ver</a>|
                <a href='?controller=alumnos&action=edit&id=<?php echo $alumno["id"]; ?>'>Editar</a>|
                <a href='?controller=alumnos&action=borrar&id=<?php echo $alumno["id"]; ?>' onClick="return confirmar();">Borrar</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<a href='?controller=alumnos&action=agregar'>Agregar</a>
</body>
</html>

