<!DOCTYPE html>
<html>
<head>

    <title>IE - Programa de Especialistas</title>
    <link rel="icon" type="image/png" href="imagens/IE_favicon.png"/>
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
            border-left: 4px solid greem
        }

        .myMenu {
            margin-bottom: 150px
        }
		.w3-theme {color:#ffff !important;background-color:greem !important}
		.w3-code{border-left:4px solid greem}
		.myMenu {margin-bottom:150px}
		.w3-text-deep-purple, .w3-hover-text-deep-purple:hover{	color: black;	}
    </style>
</head>
<body onload="w3_show_nav('menuBusca')">
<!-- Inclui MENU.PHP  -->
<?php require 'menu.php';?>
<?php require 'conectaBD.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">Seleção de Especialidades</h1>

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

                <!-- Acesso ao BD-->
				<?php
				
				// Cria conexão
				$conn = mysqli_connect($servername, $username, $password, $database);

				// Verifica conexão
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				// Configura para trabalhar com caracteres acentuados do português
				mysqli_query($conn,"SET NAMES 'utf8'");
				mysqli_query($conn,'SET character_set_connection=utf8');
				mysqli_query($conn,'SET character_set_client=utf8');
				mysqli_query($conn,'SET character_set_results=utf8');

				// Faz Select na Base de Dados
				$sqlF = "SELECT funcionario_id, nome FROM funcionario";
				$sqlE = "SELECT especialidade_id, descricao FROM especialidade";
				
				$optionsEsp = array();
				$optionsFun = array();
				
				echo "<div class='w3-responsive w3-card-4'>";
				if ($result = mysqli_query($conn, $sqlF)) {
					while ($row = mysqli_fetch_assoc($result)) {
                       array_push($optionsFun, "\t\t\t<option value='". $row["funcionario_id"]."'>".$row["nome"]."</option>\n");
					}
				}
				if ($result = mysqli_query($conn, $sqlE)) {
					while ($row = mysqli_fetch_assoc($result)) {
                        array_push($optionsEsp, "\t\t\t<option value='". $row["especialidade_id"]."'>".$row["descricao"]."</option>\n");
					}
				}
				if (sizeof($optionsEsp) == 0){
					echo "<p><b>Nao</b> existem especialidades cadastradas!</p>";
				}
				if (sizeof($optionsFun) == 0) {
					echo "<p><b>Nao</b> existem especialistas cadastrados!</p>";
				}
				echo "</div>";
				mysqli_close($conn);
				
				if (!(sizeof($optionsEsp) == 0 || sizeof($optionsFun) == 0)){
				 ?>
					<div class="w3-responsive w3-card-4">
						<div class="w3-container w3-theme">
							<h2>Selecione a especialidade</h2>
						</div>
						<form class="w3-container" action="EspSelecionar_exe.php" method="post" onsubmit="return check(this.form)">
							<input type="hidden" id="acaoForm" name="acaoForm" value="Contratar">
							<p><label class="w3-text-deep-purple"><b>Especialista</b></label>
								<select id="selectFuncionarios" name="funcionario_id" class="w3-input w3-border" required>
									<option value=""></option>
								<?php
									foreach($optionsFun as $key => $value){
										echo $value;
									}
								?>
							</select></p>
							<p>	<label class="w3-text-deep-purple"><b>Especialidade</b></label>
								<select id="selectEspecialidade" name="especialidade_id" class="w3-input w3-border" required>
									<option value=""></option>
								<?php
									foreach($optionsEsp as $key => $value){
										echo $value;
									}
								?>
								</select></p>
							<p>
								<label class="w3-text-deep-purple"><b>Nível de Proficiência do Especialista (1 a 5) </b></label>
								<input class="w3-input w3-border w3-light-grey" name="nivel" type="text" maxlength="1" size="1" pattern="[1-5]"
								title="Nivel - De 1 a 5" required></p>
							<input type="submit" value="Registrar" class="w3-btn w3-theme" >
							<input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='.'">
							<input type="button" value="Remover " class="w3-btn w3-theme" onclick="window.location.href='EspSelecionarRemover_exe.php?funcionario_id=' + ($('#selectFuncionarios').children('option:selected').val()) + '&especialidade_id=' + ($('#selectEspecialidade').children('option:selected').val())  "></p>
							
						</form>
					</div>
					<?php
				} 
					?>
			</div>
		</p>
	</div>


<!-- FIM PRINCIPAL -->
</div>

<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>
</body>
</html>
