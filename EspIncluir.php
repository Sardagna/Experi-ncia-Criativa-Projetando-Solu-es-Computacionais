<!DOCTYPE html>
<html>

<head>

    <title>Programa Especialidades</title>
    <link rel="icon" type="image/png" href="imagens/IE_favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

        #Imagem {
            display: none
        }

        #imagemSelecionada {
            width: 20%;
            height: auto;
        }
    </style>
</head>

<body onload="w3_show_nav('menuEsp')">
    <!-- Inclui MENU.PHP  -->
    <?php require 'menu.php'; ?>
    <?php require 'conectaBD.php'; ?>

    <!-- Conteúdo Principal: deslocado paa direita em 270 pixels quando a sidebar é visível -->
    <div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

        <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
            <h1 class="w3-xxlarge">Cadastro de Especialidade</h1>

            <p class="w3-large">
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

                <div class="w3-responsive w3-card-4">
                    <div class="w3-container w3-theme">
                        <h2>Informe os dados da nova especialidade</h2>
                    </div>
                    <form class="w3-container" action="EspIncluir_exe.php" method="post" onsubmit="return check(this.form)" enctype="multipart/form-data">
                        <table class='w3-table-all'>
                            <tr>
                                <td style="width:50%;">
                                    <!-- input type="hidden" id="acaoForm" name="acaoForm" value="Contratar" -->
                                    <p>
                                        <label class="w3-text-deep-purple"><b>Nome</b></label>
                                        <input class="w3-input w3-border w3-light-grey" name="Descricao" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$" title="Nome da especialidade entre 10 e 100 letras." required>
                                    </p>
                                </td>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Registrar" class="w3-btn w3-theme">
                                    <input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='EspListar.php'">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            </p>
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

    <form class="w3-container" action="EspIncluir_exe.php" method="post" onsubmit="return check(this.form)" enctype="multipart/form-data">
        <table class='w3-table-all'>
            <tr>
                <td style="width:50%;">
                    <!-- input type="hidden" id="acaoForm" name="acaoForm" value="Contratar" -->
                    <p>
                        <label class="w3-text-deep-purple"><b>Nome</b></label>
                        <input class="w3-input w3-border w3-light-grey" name="Descricao" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$" title="Nome da especialidade entre 10 e 100 letras." required>
                    </p>
                </td>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Registrar" class="w3-btn w3-theme">
                    <input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='EspListar.php'">
                </td>
            </tr>
        </table>
    </form>

    <!-- Inclui RODAPE.PHP  -->
    <?php require 'rodape.php'; ?>

</body>

</html>