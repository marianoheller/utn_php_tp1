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
            <td><?php echo "aa";?></td>
            <td>
                <a href='?controller=cursos&action=show&id=<?php echo $curso->id; ?>'>Ver</a>|
                <a href='?controller=cursos&action=edit&id=<?php echo $curso->id; ?>'>Editar</a>|
                <a href='?controller=cursos&action=borrar&id=<?php echo $curso->id; ?>'>Borrar</a>|
            </td>
        </tr>
<?php } ?>
    </tbody>
</table>

