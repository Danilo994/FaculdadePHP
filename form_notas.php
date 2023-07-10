<?php
require_once("header.php");
require_once("class.notas.php");
require_once("class.Aluno.php");
require_once("class.materia.php");
require_once("class.user.php");

$user->revalidarLogin();

?>

<body>
    <?php require_once("menu.php") ?>

    <div class="content">
        <h2>Manutenção de Notas</h2>
        <table>
            <tr>
                <th class="ponta">IDAVALIACAO</th>
                <th class="ponta">NOME DO ALUNO</th>
                <th class="ponta">DISCIPLINA</th>
                <th class="ponta">NOTA</th>
            </tr>

            <?php

            $registros = $prova->listarAvaliacoes();

            foreach ($registros as $linhas)
            {
                echo '<tr>';
                echo '  <td><a href=form_notas.php?alterar=' .$linhas['idavaliacao'] . '>' . $linhas['idavaliacao'] . '</a> </td>';
                echo '  <td>' . $linhas['nmaluno'] . '</td>';
                echo '  <td>' . $linhas['dsdisciplina'] . '</td>';
                echo '  <td>' . $linhas['nota'] . '</td>';
                echo '</tr>';
            }

            ?>

        </table>

        <?php
        if($_SESSION["login"] == 'admin'){
        if (isset($_GET['alterar']))
        {
            ?>
            <h3>Alterar/Excluir Nota</h3>

            <form action="form_notas.php" method="post">
            IDAVALIACAO: <input class="nomemat" name="idavaliacao" type="text" maxlength="20" readonly value="<?php echo $_GET['alterar'] ?>">
            NOTA: <input class="nomemat" name="nota" type="number" min="0" max="10" step="0.1" maxlength="20" value="">
            <input class="botaoal" type="submit" name="comando" value="Alterar">
            <input class="botaoex" type="submit" name="comando" value="Excluir">
            </form>
        <?php } ?>

        <hr>
        <h3>Incluir Nota</h3>

        <form action="form_notas.php" method="post">
        <select name="idaluno">
                <?php
                $registross = $aluno->listarAlunos();

                foreach ($registross as $linha) {
                    echo "<option class='nomenat' value='" . $linha['idaluno'] . "'>" . $linha['nmaluno'] . "</option>";
                }
                ?>
            </select>
        <select name="iddisciplina">
                <?php
                $registrosss = $materia->listarMaterias();

                foreach ($registrosss as $linha) {
                    echo "<option class='nomenat' value='" . $linha['iddisciplina'] . "'>" . $linha['dsdisciplina'] . "</option>";
                }
                ?>
            </select>
        NOTA: <input class="nomemat" name="nota" type="number" min="0" max="10" step="0.1" maxlength="20" />
        <input class="botaoin" type="submit" name="comando" value="Incluir" />
        </form>

        <?php
        if (isset($_POST['comando']) && ($_POST['comando'] == "Incluir")) 
        {
            echo 'CÓDIGO PARA FAZER O INSERT';
            $idaluno = $_POST['idaluno'];
            $iddisciplina = $_POST['iddisciplina'];
            $nota = $_POST['nota'];

            if ($prova->incluirAvaliacao($idaluno, $iddisciplina, $nota))
            {
                header("Location:form_notas.php");
            }
        } else if (isset($_POST['comando']) && ($_POST['comando'] == "Excluir"))
        {
            echo "Estou na área de exclusão";
            $prova->excluirAvaliacao($_POST['idavaliacao']);
            header("Location:form_notas.php");
        } else if (isset($_POST['comando']) && ($_POST['comando'] == "Alterar"))
        {
            echo "Estou na área de alteração de notas";
            $prova->alterarAvaliacao($_POST['idavaliacao'], $_POST['nota']);
            header("Location:form_notas.php");
        }

    }

        ?>

    </div>
</body>
