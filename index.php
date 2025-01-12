<html lang="pt">
	<title>Programa Especialidades</title>
	<link rel="icon" type="image/png" href="imagens/IE_favicon.png"/>
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

		.myFont {
		font-max-size: 8px
		}
	</style>

	<body  onload="w3_show_nav('menuEsp')">

		<!-- Inclui MENU.PHP  -->
		<?php require 'menu.php'; ?>


		<!-- Conteúdo PRINCIPAL: deslocado para direita em 270 pixels quando a sidebar é visível -->
		<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

			<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
				<h1 class="w3-jumbo">Programa Especialidades</h1>
				<p class="w3-xlarge">Cadastro de Funcionarios e Habilidades</p>

				<img src="imagens/cadastro.png" class="w3-circle" width="30%">

				<img src="imagens/quadro.png" class="w3-circle" width="30%">


				<footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
					<p>
						<nav>
							<a class="w3-button w3-theme w3-hover-white"
							   onclick="document.getElementById('id01').style.display='block'">Sobre</a>
						</nav>
					</p>
				</footer>

		<!-- FIM PRINCIPAL -->
			</div>

		<!-- Inclui RODAPE.PHP  -->
		<?php require 'rodape.php';?>
	</body>
</html>