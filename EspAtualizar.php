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

	<!-- Inclui MENU.PHP  
<?php require 'menu.php'; ?>
<?php require 'conectaBD.php'; ?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
	<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

		<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
			<h1 class="w3-xxlarge">Atualização Especialidade</h1>

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
				$id = $_GET['especialidade_Id'];

				// Cria conexão
				$conn = mysqli_connect($servername, $username, $password, $database);

				// Verifica conexão
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				// Configura para trabalhar com caracteres acentuados do português
				mysqli_query($conn, "SET NAMES 'utf8'");
				mysqli_query($conn, 'SET character_set_connection=utf8');
				mysqli_query($conn, 'SET character_set_client=utf8');
				mysqli_query($conn, 'SET character_set_results=utf8');

				// Faz Select na Base de Dados
				$sql = "Select especialidade_id, descricao FROM Especialidade WHERE especialidade_Id = $id";


				//Inicio DIV form
				echo "<div class='w3-responsive w3-card-4'>";
				if ($result = mysqli_query($conn, $sql)) {
					if (mysqli_num_rows($result) > 0) {
						// Apresenta cada linha da tabela
						while ($row = mysqli_fetch_assoc($result)) {
				?>
							<div class="w3-container w3-theme">
								<h2>Altere os dados da Especialidade Cód. = [<?php echo $row['especialidade_id']; ?>]</h2>
							</div>
							<form class="w3-container" action="EspAtualizar_exe.php" method="post" onsubmit="return check(this.form)" enctype="multipart/form-data">
								<table class='w3-table-all'>
									<tr>
										<td style="width:50%;">
											<input type="hidden" id="especialidade_id" name="especialidade_id" value="<?php echo $row['especialidade_id']; ?>">
											<p>
												<label class="w3-text-deep-purple"><b>Nome</b></label>
												<input class="w3-input w3-border w3-light-grey" name="descricao" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$" title="Nome da especialidade entre 10 e 100 letras." value="<?php echo $row['descricao']; ?>" required>
											</p>
										</td>
								
									</tr>
									<tr>
										<td colspan="2">
											<p>
												<input type="submit" value="Alterar" class="w3-btn w3-red">
												<input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='EspListar.php'">
											</p>
										</td>
									</tr>
								</table>
							</form>
				<?php
						}
					}
				} else {
					echo "Erro executando UPDATE: " . mysqli_error($conn);
				}
				echo "</div>"; //Fim form
				mysqli_close($conn);  //Encerra conexao com o BD

				?>

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
	<!-- Inclui RODAPE.PHP  -->
	<?php require 'rodape.php'; ?>

</body>

</html>