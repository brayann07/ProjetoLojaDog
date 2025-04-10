
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tipos</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="fotossite/cabecarioimagem.png" type="image/x-icon">
</head>
<body id="geral">
    <form method="post" action="cadastrotipo.php">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="quadradogeral">
            <div class="parteesquerda">
                <br><br><br><br><br>
                <h3>Cadastro Dos Tipos:</h3><br><br>
                Código<br> 
                <input type="text" name="codtipo" id="codtipo" size=10 placeholder="Digite Aqui"><br><br><br>
                Nome<br>  
                <input type="text" name="nometipo" id="nometipo" size=10 placeholder="Digite Aqui"><br><br><br>
                <input type="submit" name="gravartipo" value="Gravar" class="mandargeral" id="gravartipo"><br><br>
                <input type="submit" name="alterartipo" value="Alterar" class="mandargeral" id="alterartipo"><br><br>
                <input type="submit" name="excluirtipo" value="Excluir" class="mandargeral" id="excluirtipo"><br><br>
                <input type="submit" name="pesquisartipo" value="Pesquisar" class="mandargeral" id="pesquisartipo"><br><br>
            </div>
            <div class="partedireita"><br>
                Resultados:<br><br>
                <div id="resultados">
                <?php
                 $conectar = mysqli_connect("localhost","root","","lojabrayan");
                //verificar a opção usuario (botão)
                if (isset($_POST['gravartipo']))
                {
                    //capturar variaveis HTML
                    $codigo = $_POST['codtipo'];
                    $nome = $_POST['nometipo'];
                    $sql = "insert into tipo(codigo,nome)
                            values('$codigo','$nome')";
                    //valor booleano        
                    $resultado = mysqli_query($conectar,$sql);
                    if ($resultado == TRUE){
                        echo "Dados gravados com sucesso!(tipos)";
                    }
                    else{
                        echo "Dados não gravados!";
                    }
                }
                if (isset($_POST['alterartipo'])){
                    $codigo = $_POST['codtipo'];
                    $nome = $_POST['nometipo'];
                    $sql = "UPDATE tipo SET nome='$nome' WHERE codigo='$codigo'";
                    $resultado = mysqli_query($conectar,$sql);
                    if ($resultado == TRUE){
                        echo "Dados alterados com sucesso";
                    }
                    else{
                        echo "Dados não gravados";
                    }
                }

                if (isset($_POST['excluirtipo'])){
                        $codigo = $_POST['codtipo'];

                        $sql = "DELETE FROM tipo WHERE codigo='$codigo'";

                        $resultado = mysqli_query($conectar,$sql);
                        
                        if ($resultado == TRUE){
                            echo "Dados excluidos com sucesso";
                        }
                        else{
                            echo "Dados não excluidos";
                        }
                }
                if (isset($_POST["pesquisartipo"])){
                    $codigo = $_POST['codtipo'];
                    $sql = "SELECT * from tipo WHERE codigo='$codigo'";
                    $resultado = mysqli_query($conectar,$sql);
                    if ($resultado == TRUE){
                        while($dados = mysqli_fetch_array($resultado)){
                            echo "Codigo: " . $dados['codigo'];
                            echo "<br>";
                            echo "Nome: " . $dados['nome'];
                        }
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </form>

</body>
</html>
