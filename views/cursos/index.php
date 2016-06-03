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
    <p>Listado de cursos</p>

    <table border="1">
        <thead>
        <th>Nombre</th>
        <th>Turno</th>
        <th>Cantidad alumnos</th>
        <th>Accion</th>
        </thead>
        <tbody>
        <?php /** @var Curso $curso */ foreach($cursos as $curso) { ?>
            <tr>
                <td><?php echo $curso->nombre;?></td>
                <td><?php echo $curso->turno;?></td>
                <td><?php echo $cantAlumnos[strval($curso->id)];?></td>
                <td>
                    <a href='?controller=cursos&action=show&id=<?php echo $curso->id; ?>'>Ver</a>|
                    <a href='?controller=cursos&action=edit&id=<?php echo $curso->id; ?>'>Editar</a>|
                    <a href='?controller=cursos&action=borrar&id=<?php echo $curso->id; ?>' onClick="return confirmar();">Borrar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>

