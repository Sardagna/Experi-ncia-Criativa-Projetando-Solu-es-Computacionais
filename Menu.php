<div class="w3-top">
		<div class="w3-row w3-white w3-padding">
			<!-- <div class="w3-half" style="margin:4px 0 6px 0"><a href="."><img src='imagens/logo.png' alt=' Logo '></a>
			</div> -->
			<div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small">
				<div class="w3-right">PROGRAMA DE ESPECIALISTAS</div>
			</div>
		</div>
		<div class="w3-bar w3-theme w3-large" style="z-index:4;">
			<a class="w3-bar-item w3-button w3-left w3-hide-large w3-hover-white w3-large w3-theme w3-padding-16" href="javascript:void(0)" onclick="w3_open()">☰</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuEsp')">CADASTRO DE ESPECIALIDADES</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuBusca')">BUSCAR ESPECIALISTA</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuSele')">SELECIONAR ESPECIALIDADES</a>
		</div>
	</div>
  
	<!-- Sidebar -->
	<div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left" style="z-index:3;width:270px" id="mySidebar">
		<div class="w3-bar w3-hide-large w3-large">
			<a href="javascript:void(0)" onclick="w3_show_nav('menuEsp')"
			   class="w3-bar-item w3-button w3-theme w3-hover-light-green w3-padding-16" style="width:50%">Cadastro de Especialidades</a>
		    <a href="javascript:void(0)" onclick="w3_show_nav('menuBusca')"
			   class="w3-bar-item w3-button w3-theme w3-hover-light-green w3-padding-16" style="width:50%">Buscar Especialista</a>
			<a href="javascript:void(0)" onclick="w3_show_nav('menuSele')"
			   class="w3-bar-item w3-button w3-theme w3-hover-light-green w3-padding-16" style="width:50%">Selecionar Especialidades</a>
		</div>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-right w3-xlarge w3-hide-large"
		   title="Close Menu">×</a>
		
		<div id="menuEsp" class="myMenu" >
			<div class="w3-container">
				<h3>Especialidades</h3>
			</div>
			<a class="w3-bar-item w3-button" href='EspListar.php'>Relação de Especialidades</a>
			<a class="w3-bar-item w3-button" href='EspIncluir.php'>Criar Nova Especialidade</a>
		</div>

		<div id="menuBusca" class="myMenu" >
			<div class="w3-container">
				<h3>Busca</h3>
			</div>
			<a class="w3-bar-item w3-button" href='BuscaEspListar.php'>Busca de Especialistas</a>
		</div>
		
		<div id="menuSele" class="myMenu">
			<div class="w3-container">
				<h3>Especialistas</h3>
			</div>
			<a class="w3-bar-item w3-button" href="EspSelecionar.php">Seleção de Especialidades</a>
		</div>
	</div>




