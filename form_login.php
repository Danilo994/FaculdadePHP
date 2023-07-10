<?php
require_once("header.php");
require_once("class.login.php");
require_once("class.aluno.php");
require_once("class.user.php");
$user->revalidarLogin();

?>

<body>

    <?php require_once("menu.php") ;
    ?>

    <div class="content">
        <h2>Manutenção de Logins</h2>
        <table>
            <tr>
                <th class="ponta">dslogin</th>
                <th class="ponta">dssenha</th>
                <th class="ponta">idaluno</th>
                <th class="ponta">nmaluno</th>
            </tr>
            <?php

            $registros  = $login->listarLogins();
            //dumpF($registros);


            foreach ($registros as $linha) {
                echo '<tr>';
                echo '    <td><a href=form_login.php?alterar=' . $linha['dslogin'] . '>'  . $linha['dslogin'] . '</a> </td>';
                echo '    <td>' . $linha['dssenha'] . '</td>';
                echo '    <td>' . $linha['idaluno'] . '</td>';
                echo '    <td>' . $linha['nmaluno'] . '</td>';
                echo '</tr>';
            }


            ?>
        </table>

        <?php
        if($_SESSION["login"] == 'admin'){
        if (isset($_GET['alterar'])) {
        ?>
            <h3>Alterar/Excluir Login</h3>
            <form action="form_login.php" method="post">
                DSLOGIN: <input class="nomemat" name="dslogin" type="text" maxlength="20" readonly value="<?php echo $_GET['alterar'] ?>">
                DSSENHA: <input class="nomemat" name="dssenha" type="password" maxlength="20" value="">
                <input class="botaoal" type="submit" name="comando" value="Alterar" />
                <?php
                if ($_GET['alterar'] != 'admin') {
                    echo '<input type="submit" class="botaoex" name="comando" value="Excluir" />';
                }
                ?>
            </form>
        <?php } ?>
        <hr>
        <h3>Incluir Login</h3>
        <form action="form_login.php" method="post">
            DSLOGIN: <input class="nomemat" name="dslogin" type="text" maxlength="20" />
            DSSENHA: <input class="nomemat" name="dssenha" type="password" maxlength="20" />
            <select name="idaluno">
                <?php
                $registross = $login->listarAlunosNaoRelacionados();

                foreach ($registross as $linha) {
                    echo "<option class='nomemat' value='" . $linha['idaluno'] . "'>" . $linha['nmaluno'] . "</option>";
                }
                ?>
            </select>
            <input class="botaoin" type="submit" name="comando" value="Incluir" />
        </form>

        <?php
        if (isset($_POST['comando']) && ($_POST['comando'] == "Incluir")) {
            echo "CÓDIGO PARA FAZER O INSERT";
            //var_dump($_POST);
            $dslogin = htmlspecialchars($_POST['dslogin']);
            $dssenha = md5($_POST['dssenha']);
            $idaluno = $_POST['idaluno'];

            if ($login->incluirLogin($dslogin, $dssenha, $idaluno)) {
                header("Location:form_login.php");
            }
        } else if (isset($_POST['comando']) && ($_POST['comando'] == "Excluir")) {
            echo "Estou na área de exclusão";
            $login->excluirLogin($_POST['dslogin']);
            header("Location:form_login.php");
        } else if (isset($_POST['comando']) && ($_POST['comando'] == "Alterar")) {
            echo "Estou na área de alteração de senha";
            $login->alterarLogin($_POST['dslogin'], md5($_POST['dssenha']));
            header("Location:form_login.php");
        }

    }  
     ?>

    </div>

</body>

</html>