<!DOCTYPE html>
<html>

<head>
    <title>Programa Especialidades</title>
    <link rel="icon" type="image/png" href="imagens/IE_favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <style>
        .w3-theme {
            color: #ffff !important;
            background-color: green !important
        }

        .w3-code {
            border-left: 4px solid green
        }

        .myMenu {
            margin-bottom: 150px
        }

        #imagemSelecionada {
            width: 50%;
            height: auto;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap;
            background-color: DodgerBlue;
        }
    </style>
</head>

<body onload="w3_show_nav('menuEsp')">
    <!-- Inclui MENU.PHP  -->
    <?php require 'menu.php'; ?>
    <?php require 'conectaBD.php'; ?>

    <!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
    <div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

        <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
            <h1 class="w3-xxlarge">Buscar Especialista</h1>

            <p class="w3-large">
            <p>
            <div class="w3-code cssHigh notranslate">
                <!-- Acesso em:-->
                <?php

                date_default_timezone_set("America/Sao_Paulo");
                $data = date("d/m/Y H:i:s", time());
                echo "<p class='w3-small' > ";
                echo "Acesso em: ";
                echo $data;
                echo "</p> "
                ?>

                <!-- Acesso ao BD-->
                <?php

                // Verifica conexão
                $conn = mysqli_connect($servername, $username, $password, $database);

                // Verifica conexão 
                if (!$conn) {
                    echo "</table>";
                    echo "</div>";
                    die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
                }

                // Configura para trabalhar com caracteres acentuados do português
                mysqli_query($conn, "SET NAMES 'utf8'");
                mysqli_query($conn, 'SET character_set_connection=utf8');
                mysqli_query($conn, 'SET character_set_client=utf8');
                mysqli_query($conn, 'SET character_set_results=utf8');

                // Faz Select na Base de Dados
                $sql = "SELECT Funcionario.funcionario_id AS CodigoFuncionario,
            '                  Funcionario.nome AS NomeFuncionario,

                               Especialidade.especialidade_id AS CodigoEspecialidade,
                               Especialidade.descricao AS DescricaoEspecialidade,

                               FuncEsp.Nivel

                        FROM funcionario

                        INNER JOIN funcionario_especialidade AS FuncEsp ON FuncEsp.funcionario_id = funcionario.funcionario_id

                        INNER JOIN especialidade AS Especialidade ON especialidade.especialidade_id = FuncEsp.especialidade_id;";

                echo "<p onClick='$(#formulario').dialog('open')'> TESTE </p>";

                echo "<div class='w3-responsive w3-card-4'>";
                if ($result = mysqli_query($conn, $sql)) {
                    echo "<table class='w3-table-all'>";
                    /*  <tr>
                            <th colspan="2">Name</th>
                            <th>Age</th>
                        </tr>*/
                    echo "	<tr>";
                    echo "	  <th colspan='2'>Especialista</th>";
                    echo "	  <th colspan='2'>Especialidade</th>";
                    echo "	  <th rowspan='2'>Nível</th>";
                    echo "	</tr>";
                    echo "	<tr>";
                    echo "	  <th>Código</th>";
                    echo "	  <th>Nome</th>";
                    echo "	  <th>Código</th>";
                    echo "	  <th>Descrição</th>";
                    echo "	  <th></th>";
                    echo "	</tr>";
                    if (mysqli_num_rows($result) > 0) {
                        // Apresenta cada linha da tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";

                            echo "<td>";
                            echo $row["CodigoFuncionario"];
                            echo "</td>";
                            
                            echo $row["descricao"];
                            
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "Erro executando SELECT: " . mysqli_error($conn);
                }

                mysqli_close($conn);  //Encerra conexao com o BD

                    ?>
            </div>
        </div>


        <footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
            <p>
            <nav>
                <a class="w3-button w3-theme w3-hover-white" onclick="document.getElementById('id01').style.display='block'">Sobre</a>
            </nav>
            </p>
        </footer>
        

        <!-- FIM PRINCIPAL -->
    </div>
    <!-- Inclui RODAPE.PHP  -->
    <?php require 'rodape.php'; ?>
</body>

<script>

    function VerUsername(username){
                var page = "ajax.php?action=BuscaEspecialista";
                $.ajax
                        ({
                            type: 'POST',
                            dataType: 'html',
                            url: page,
                            beforeSend: function () {
                                $("#resposta").html("Carregando...");
                            },
                            data: {username: "Rodrigo"},
                            success: function (retorno)
                            {
                                
                                $("#resposta").html(retorno);
                            }
                        });
            }

    $('#usernameinput').change(function () {
        VerUsername($("#usernameinput").val());
    });

  </script>

</html>