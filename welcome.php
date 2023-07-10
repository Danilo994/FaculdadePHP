<?php
require_once("header.php");
require_once("class.user.php");
$user->revalidarLogin();
?>

<body>

    <?php require_once("menu.php") ?>

    <div class="content">
        <h2 id="bemVindo">Bem vindo!</h2>
        <p>Esta é a página inicial.</p>
        <p>Para navegar no site escolha uma opção no menu a esquerda.</p>
    </div>

</body>

</html>