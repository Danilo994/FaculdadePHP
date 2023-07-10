<?php
require_once("header.php");
require_once("class.materia.php");
require_once("class.user.php");

$user->revalidarLogin();

?>

<body>
    <?php require_once("menu.php")?>

    <div class="content">
        <h2>Manutenção de Disciplinas</h2>
        <div class="materia">
            <table>
                <tr>
                    <th class="ponta">IDDISCIPLINA</th>
                    <th class="ponta">DSDISCIPLINA</th>
                </tr>

                <?php
                $rows = $materia->listarMaterias();

                foreach ($rows as $registro)
                {
                    echo "<tr>";
                    echo "<td><a href=form_materia.php?alterarid=" . $registro['iddisciplina'] . '>' . $registro['iddisciplina'] . "</td>";
                    echo "<td>" . $registro['dsdisciplina'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="mexer">
            <?php
            if (isset($_GET['alterarid'])) 
            {
                $materiaselecionada = $materia->listarMateria($_GET['alterarid']);

                if($_SESSION["login"] == 'admin'){ ?>
                <h3>Alterar/Excluir Matéria</h3>
                <form action="form_materia.php" method="POST">
                    <input class="nomemat" type="hidden" name="iddisciplina" value="<?php echo $materiaselecionada[0]['iddisciplina'] ?>"/>
                    <input class="nomemat" type="text" name="dsdisciplina" value="<?php echo $materiaselecionada[0]['dsdisciplina'] ?>" maxlength="150" />
                    <input class="botaoal" type="submit" value="Alterar" name="comando">
                    <input class="botaoex" type="submit" value="Excluir" name="comando">
                </form>

            <?php
            }}

            if (isset($_POST['comando']) && $_POST['comando'] =='Alterar')
            {
                echo "Comando para alterar a Materia";
                $materia->alterarMateria($_POST['iddisciplina'], $_POST['dsdisciplina']);
                header("location:form_materia.php?comando=alteracaook");
            } else if (isset($_POST['comando']) && $_POST['comando'] =='Excluir')
            {
                echo "Comando para excluir a Materia";
                $materia->excluirMateria($_POST['iddisciplina']);
                header("location:form_materia.php?comando=exclusaook");
            } else if (isset($_POST['comando']) && $_POST['comando'] == 'Incluir')
            {
                echo "Comando para incluir Materia";
                if (trim($_POST['dsdiciplina']) != '')
                {
                    echo htmlspecialchars($_POST['dsdisciplina']);
                    $materia->incluirMateria(htmlspecialchars($_POST['dsdiciplina']));
                    header("location:form_materia.php?comando=incluirok");
                }
            }

            ?>

        </div>

        <div class="incluiir">
             <hr>

             <?php if($_SESSION["login"] == 'admin'){ ?>

            <h3>Incluir Matéria</h3>

            <form action="form_materia.php" method="POST">
                <input class="nomemat" type="text" name="dsdiciplina" value="" maxlength="150" />
                <input class="botaoin" type="submit" value="Incluir" name="comando">
            </form>

            <?php
             }

            ?>
        </div>

    </div>

