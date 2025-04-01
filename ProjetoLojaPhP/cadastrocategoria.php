

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categorias</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="fotossite/cabecarioimagem.png" type="image/x-icon">
</head>
<body id="geral">
    <form method="post" action="cadastrocategoria.php">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="quadradogeral">
            <div class="parteesquerda">
                <br><br><br><br><br>
                <h3>Cadastro Das Categorias:</h3><br><br>
                Código<br> 
                <input type="text" name="codcategoria" id="codcategoria" size=10 placeholder="Digite Aqui"><br><br><br>
                Nome<br>   
                <input type="text" name="nomecategoria" id="nomecategoria" size=10 placeholder="Digite Aqui"><br><br><br>
                <input type="submit" name="gravarcategoria" value="Gravar" class="mandargeral" id="gravarcategoria"><br><br>
                <input type="submit" name="alterarcategoria" value="Alterar" class="mandargeral" id="alterarcategoria"><br><br>
                <input type="submit" name="excluircategoria" value="Excluir" class="mandargeral" id="excluircategoria"><br><br>
                <input type="submit" name="pesquisarcategoria" value="Pesquisar" class="mandargeral" id="pesquisarcategoria"><br><br>
            </div>
            <div class="partedireita"><br>
                Resultados:<br><br>
                <div id="resultados">
                <?php
                $conectar = mysqli_connect("localhost","root","","lojabrayan");
                if (isset($_POST['gravarcategoria']))
                {
                    //capturar variaveis HTML
                    $codigo = $_POST['codcategoria'];
                    $nome = $_POST['nomecategoria'];
                    $sql = "insert into categoria(codigo,nome)
                            values('$codigo','$nome')";
                    //valor booleano        
                    $resultado = mysqli_query($conectar,$sql);
                    if ($resultado == TRUE){
                        echo "Dados gravados com sucesso!(categorias)";
                    }
                    else{
                        echo "Dados não gravados!";
                    }
                }
                if (isset($_POST['alterarcategoria'])){
                    $codigo = $_POST['codcategoria'];
                    $nome = $_POST['nomecategoria'];
                    $sql = "UPDATE categoria SET nome='$nome' WHERE codigo='$codigo'";
                    $resultado = mysqli_query($conectar,$sql);
                    if ($resultado == TRUE){
                        echo "Dados alterados com sucesso";
                    }
                    else{
                        echo "Dados não gravados";
                    }
                }

                if (isset($_POST['excluircategoria'])){
                        $codigo = $_POST['codcategoria'];

                        $sql = "DELETE FROM categoria WHERE codigo='$codigo'";

                        $resultado = mysqli_query($conectar,$sql);
                        
                        if ($resultado == TRUE){
                            echo "Dados excluidos com sucesso";
                        }
                        else{
                            echo "Dados não excluidos";
                        }
                }
                if (isset($_POST["pesquisarcategoria"])){
                    $codigo = $_POST['codcategoria'];
                    $sql = "SELECT * from categoria WHERE codigo='$codigo'";
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
