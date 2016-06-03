<p>Listado de cursos</p>


<?php /** @var Curso $curso */
    foreach($cursos as $curso) { ?>
    <p>
        <?php echo $curso->nombre; ?>
        <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Mostrar</a>
    </p>
<?php } ?>