<?php
require_once("header.php");
require_once("class.Aluno.php");
require_once("class.user.php");

$user->revalidarLogin();
?>

<body>

    <?php require_once("menu.php") ?>

    <div class="content">
        <h2>Manutenção de Alunos</h2>
        <div>
            <table >
                <tr>
                    <th>IDLAUNO</th>
                    <th>NMALUNO</th>
                </tr>

                <?php
                $rows = $aluno->listarAlunos();


                foreach ($rows as $registro) {
                    echo "<tr>";
                    echo "<td><a href=form_aluno.php?alterarid=" . $registro['idaluno']  . '>' . $registro['idaluno'] . "</td>";
                    echo "<td>" . $registro['nmaluno'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div>
            <?php
            if($_SESSION["login"] == 'admin'){
            if (isset($_GET['alterarid'])) {
                $alunoselecionado = $aluno->listarAluno($_GET['alterarid']);
            ?>
            <h3>Alterar/Excluir Aluno</h3>
                <form action="form_aluno.php" method="POST">
                    <input class="nomemat" type="hidden" name="idaluno" value="<?php echo $alunoselecionado[0]['idaluno'] ?>" />
                    <input class="nomemat" type="text" name="nmaluno" value="<?php echo $alunoselecionado[0]['nmaluno'] ?>" maxlength="150" />
                    <input class="botaoal" type="submit" value="Alterar" name="comando">
                    <input class="botaoex" type="submit" value="Excluir" name="comando">
                </form>

            <?php

            }

            if (isset($_POST['comando']) && $_POST['comando'] == 'Alterar') {
                echo "Comandos para alterar o aluno ";
                $aluno->alterarAluno($_POST['idaluno'], $_POST['nmaluno']);
                header("location:form_aluno.php?comando=alteracaook");
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Excluir') {
                echo "Comandos para excluir o aluno";
                $aluno->excluirAluno($_POST['idaluno']);
                header("location:form_aluno.php?comando=excluirok");
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Incluir') {
                echo "Comandos para incluir o aluno";
                if (trim($_POST['nmaluno']) != '') {
                    echo htmlspecialchars($_POST['nmaluno']);
                    $aluno = $aluno->incluirAluno(htmlspecialchars($_POST['nmaluno']));
                    header("location:form_aluno.php?comando=incluirok");
                }
            }

            // dumpF($_GET);
            // dumpF($_POST);

            ?>
        </div>
        <div>
            <hr>

            <h3>Incluir Aluno</h3>

            <form action="form_aluno.php" method="POST">
                <input class="nomemat" type="text" name="nmaluno" value="" maxlength="150" />
                <input class="botaoin" type="submit" value="Incluir" name="comando">
            </form>

            <?php


        }?>
        </div>
    </div>

</body>

</html>