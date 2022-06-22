<?php require 'conectaBD.php'; ?>

<?php 

if($_GET['action']=="BuscaEspecialista"){

    $html = "";

    $especialidade = $_POST['especialidade'];
    $nivel = $_POST['nivel'];

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
    $sql = "SELECT Gestor.funcionario_id AS CodigoGestor,
                   Gestor.nome AS NomeGestor,
    
                   Funcionario.funcionario_id AS CodigoFuncionario,
                   Funcionario.nome AS NomeFuncionario,
                   Funcionario.Email as EmailFuncionario,
                   Funcionario.Telefone as TelefoneFuncionario,

                   Especialidade.especialidade_id AS CodigoEspecialidade,
                   Especialidade.descricao AS DescricaoEspecialidade,

                   FuncEsp.Nivel

            FROM funcionario

            INNER JOIN funcionario AS Gestor ON Gestor.funcionario_id = funcionario.Gestor_Id

            INNER JOIN funcionario_especialidade AS FuncEsp ON FuncEsp.funcionario_id = funcionario.funcionario_id

            INNER JOIN especialidade AS Especialidade ON especialidade.especialidade_id = FuncEsp.especialidade_id
            
            WHERE 1=1 ";

    if ($especialidade <> "") {
        $sql .= " AND Especialidade.descricao LIKE '%{$especialidade}%' ";

    }
    
    if ($nivel != 0) {
        $sql .= " AND FuncEsp.Nivel = {$nivel}" ;
     }

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {

            $html = " <table class='w3-table-all'>
            <tr>
                <th colspan='2'style='text-align:center'>Gestor</th>
                <th colspan='4' style='text-align:center'>Especialista</th>
                <th colspan='2' style='text-align:center'>Especialidade</th>
                <th colspan='2' style='text-align:center'>Nível</th>
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
            </tr>";

            // Apresenta cada linha da tabela
            while ($row = mysqli_fetch_assoc($result)) {
                $html.=  "<tr> ";

                $html.= "  <td>";
                $html.= $row["CodigoGestor"];
                $html.= "  </td>";

                $html.= "  <td>";
                $html.= $row["NomeGestor"];
                $html.= "  </td>";

                $html.= "  <td>";
                $html.= $row["CodigoFuncionario"];
                $html.= "  </td>";

                $html.= "  <td>";
                $html.= $row["NomeFuncionario"];
                $html.= "  </td>";

                $html.= "  <td>";
                $html.= $row["EmailFuncionario"];
                $html.= "  </td>";

                $html.= "  <td>";
                $html.= $row["TelefoneFuncionario"];
                $html.= "  </td>";

                $html.= "  <td>";
                $html.= $row["CodigoEspecialidade"];
                $html.= "  </td>";

                $html.= "  <td>";
                $html.= $row["DescricaoEspecialidade"];
                $html.= "  </td>";

                $html.= "  <td colspan='2' style='text-align:center'>";
                $html.= $row["Nivel"];
                $html.= "  </td>";
                
                $html.= "</tr>";
            }
            $html .= "<table/>";
        }
        else{
            $html = " <table class='w3-table-all'>
            <tr>
                <th colspan='2'style='text-align:center'>Gestor</th>
                <th colspan='4' style='text-align:center'>Especialista</th>
                <th colspan='2' style='text-align:center'>Especialidade</th>
                <th colspan='2' style='text-align:center'>Nível</th>
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
            </tr>";

            $html .= "<h2 style='color:red'>Nenhum especialista encontrado !</h2>";

            $html .= "<table/>";
        }
    } else {
        echo "Erro executando SELECT: " . mysqli_error($conn);
    }

    mysqli_close($conn);  //Encerra conexao com o BD

    echo "{$html}";
     
}

      
	
	
?>
 


