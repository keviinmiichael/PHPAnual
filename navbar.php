<nav>
    <h2>navbar</h2>
    <ul>
        <li>home</li>
        <li>quienes somos</li>
        <?php if (estalogueado()): ?>
            <?php $usuario = traerPorID($_SESSION['id']) ?>
            <li> <a href="/parfil"> <?=$usuario['name']?></a> </li>
        <?php else: ?>
            <li>registrate</li>
            <li>login</li>
        <?php endif; ?>

    </ul>
</nav>
