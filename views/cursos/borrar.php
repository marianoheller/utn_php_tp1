<?php
const TimeOut = 3;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrar</title>
    <script type="text/javascript">
        var acc =0;
        var myVar = setInterval(Tick1000ms, 1000);
        function Tick1000ms()	{
            acc++;
            document.getElementById("Segundos").innerHTML = <?php echo TimeOut?>-acc;
        }

    </script>
</head>
<body>
    <?php
    if ( isset($rowsUpdated) && $rowsUpdated > 0 )
        echo "Borrado exitoso";
    else
        echo "Error de borrado";
    header( "refresh:".TimeOut.";url=?controller=cursos&action=index" );
    echo "<br><br>";
    ?>
    <p id="Timer">Redireccionando en <span id="Segundos"><?php echo TimeOut?></span> segundos...</p>
</body>
</html>