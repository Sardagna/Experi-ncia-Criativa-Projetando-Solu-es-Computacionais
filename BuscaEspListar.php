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

        * {
        box-sizing: border-box;
        }

        input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        }

        label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        }

        input[type=button] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin-top :1%;
        }

        input[type=button]:hover {
        background-color: #45a049;
        }

        .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        }

        .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
        }

        .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=button] {
            width: 100%;
            margin-top: 0;
            margin-top :1%;
        }
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

            <h1>Busca de Especialistas</h1>

            <div class="container">
                <div class="row">
                <div class="col-25">
                    <label for="especialidade">Especialidade:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="inputEspecialidade" name="especialidade" placeholder="Java, Projetos, C#, PHP...">
                </div>
                </div>
                <div class="row">
                <div class="col-25">
                    <label for="niveis">Nível</label>
                </div>
                <div class="col-75">
                    <select id="selectNiveis" name="niveis">
                    <option value="0"> Todos </option>
                    <option value="1"> 1 - Baixo</option>
                    <option value="2"> 2 - </option>
                    <option value="3"> 3 - Medio </option>
                    <option value="4"> 4 - </option>
                    <option value="5"> 5 - Alto </option>
                    </select>
                </div>
                </div>
                <div class="row">
                <input type="button" id="buttonBuscar" value="Buscar">
                </div>
            </div>

            <div id = "tabelaEspecialistas">
                <table class='w3-table-all'>
            
                        <tr>
                        <th colspan='2' style="text-align:center">Gestor</th>
                        <th colspan='4' style="text-align:center">Especialista</th>
                        <th colspan='2' style="text-align:center">Especialidade</th>
                        <th colspan='2' style="text-align:center">Nível</th>
                        </tr>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th></th>
                            <th></th>
                        </tr>
                    
                </table>
            </div>
        

        <!-- FIM PRINCIPAL -->
    </div>
    <!-- Inclui RODAPE.PHP  -->
    <?php require 'rodape.php'; ?>
</body>

<script>

    $('#buttonBuscar').click(function () {

        var page = "FuncoesAjax.php?action=BuscaEspecialista";

        $.ajax
                ({
                    type: 'POST',
                    dataType: 'html',
                    url: page,
                    beforeSend: function () {
                        //$("#tabelaEspecialistas").html("Carregando...");
                    },
                    //Parametro:Valor
                    data: {especialidade: $("#inputEspecialidade").val(), nivel: $("#selectNiveis").children("option:selected").val() },
                    success: function (retorno)
                    {
                        $("#tabelaEspecialistas").html(retorno);
                    }
                });
    });

  </script>

</html>