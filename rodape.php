<div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content">
        <header class="w3-container w3-theme">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h2>Programa de Especialidades</h2>
        </header>
        <div class="w3-container">
            <p class="w3-small">Trabalho Experiência Criativa - PUCPR-BES</p>
            <p class="w3-small">Projetando Solucões Computacionais</>
            <p class="w3-small">Alunos: Eduardo, Eric, Rodrigo</p>
        </div>
        <footer class="w3-container w3-theme ">
        </footer>
    </div>
</div>


<script>
    // Script para abrir e fechar o sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    function w3_show_nav(name) {
        document.getElementById("menuEsp").style.display = "none";
        document.getElementById("menuBusca").style.display = "none";
        document.getElementById("menuSele").style.display = "none";
        document.getElementById(name).style.display = "block";

    }

    function validaImagem(input) {
        var caminho = input.value;

        if (caminho) {
            var comecoCaminho = (caminho.indexOf('\\') >= 0 ? caminho.lastIndexOf('\\') : caminho.lastIndexOf('/'));
            var nomeArquivo = caminho.substring(comecoCaminho);

            if (nomeArquivo.indexOf('\\') === 0 || nomeArquivo.indexOf('/') === 0) {
                nomeArquivo = nomeArquivo.substring(1);
            }

            var extensaoArquivo = nomeArquivo.indexOf('.') < 1 ? '' : nomeArquivo.split('.').pop();

            if (extensaoArquivo != 'gif' &&
                extensaoArquivo != 'png' &&
                extensaoArquivo != 'jpg' &&
                extensaoArquivo != 'jpeg') {
                input.value = '';
                alert("É preciso selecionar um arquivo de imagem (gif, png, jpg ou jpeg)");
            }
        } else {
            input.value = '';
            alert("Selecione um caminho de arquivo válido");
        }
        if (input.files && input.files[0]) {
            var arquivoTam = input.files[0].size / 1024 / 1024;
            if (arquivoTam < 16) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagemSelecionada').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                input.value = '';
                alert("O arquivo precisa ser uma imagem com menos de 16 MB");
            }
        } else{
            document.getElementById('imagemSelecionada').setAttribute('src', '#');
        }
    }
</script>