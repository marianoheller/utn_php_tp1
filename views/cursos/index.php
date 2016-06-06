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
    <?php
    $url = $_SERVER["REQUEST_URI"];
    $urlAnt = $urlSig = $url;
    if ($pagina != 1) {
        if ( parse_url($url, PHP_URL_QUERY) )
            $urlAnt .= "&p=$paginaAnterior&q=$q";
        else
            $urlAnt .= "?p=$paginaAnterior&q=$q";
        echo "<a href='$urlAnt'>Anterior</a>";
    }
    else
        echo "<a>Anterior</a>";
    echo "|";
    if ( ($pagina*$itemsPorPag) < $cantDeCursos ) {
        if ( parse_url($url, PHP_URL_QUERY) )
            $urlSig .=  "&p=$paginaSiguiente&q=$q";
        else
            $urlSig .= "?p=$paginaSiguiente&q=$q";
        echo "<a href='$urlSig'>Siguiente</a>";
    }
    else
        echo "<a>Siguiente</a>";
    ?>
    <br>
    <a href='?controller=cursos&action=agregar'>Agregar</a>
</body>
</html>

