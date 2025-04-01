
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Marcas</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="fotossite/cabecarioimagem.png" type="image/x-icon">
</head>
<body id="geral">
    <form method="post" >
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="quadradogeral">
            <div class="parteesquerda">
                <br><br><br><br><br>
                <h3>Cadastro Das Marcas:</h3><br><br>
                Código<br> 
                <input type="text" name="codmarca" id="codmarca" size=10 placeholder="Digite Aqui"><br><br><br>
                Nome<br>
                
                <input type="text" name="nomemarca" id="nomemarca" size=10 placeholder="Digite Aqui"><br><br><br>
                <input type="submit" name="gravarmarca" value="Gravar" class="mandargeral" id="gravarmarca"><br><br>
                <input type="submit" name="alterarmarca" value="Alterar" class="mandargeral" id="alterarmarca"><br><br>
                <input type="submit" name="excluirmarca" value="Excluir" class="mandargeral" id="excluirmarca"><br><br>
                <input type="submit" name="pesquisarmarca" value="Pesquisar" class="mandargeral" id="pesquisarmarca"><br><br>
            </form>
            </div>
            <div class="partedireita"><br>
                Resultados:<br><br>
                <div id="resultados">
                    <?php
                    //conexao com DB
                    $conectar = mysqli_connect("localhost","root","","lojabrayan");

                    //verificar a opção usuario (botão)
                    if (isset($_POST['gravarmarca']))
                    {
                        //capturar variaveis HTML
                        $codigo = $_POST['codmarca'];
                        $nome = $_POST['nomemarca'];
                        $sql = "insert into marca(codigo,nome)
                                values('$codigo','$nome')";
                        //valor booleano        
                        $resultado = mysqli_query($conectar,$sql);
                        if ($resultado == TRUE){
                            echo "Dados gravados com sucesso!(marcas)";
                        }
                        else{
                            echo "Dados não gravados!";
                        }
                    }
                    if (isset($_POST['alterarmarca'])){
                        $codigo = $_POST['codmarca'];
                        $nome = $_POST['nomemarca'];
                        $sql = "UPDATE marca SET nome='$nome' WHERE codigo='$codigo'";
                        $resultado = mysqli_query($conectar,$sql);
                        if ($resultado == TRUE){
                            echo "Dados alterados com sucesso";
                        }
                        else{
                            echo "Dados não gravados";
                        }
                    }

                    if (isset($_POST['excluirmarca'])){
                            $codigo = $_POST['codmarca'];

                            $sql = "DELETE FROM marca WHERE codigo='$codigo'";

                            $resultado = mysqli_query($conectar,$sql);
                            
                            if ($resultado == TRUE){
                                echo "Dados excluidos com sucesso";
                            }
                            else{
                                echo "Dados não excluidos";
                            }
                    }
                    if (isset($_POST["pesquisarmarca"])){
                        $codigo = $_POST['codmarca'];
                        $sql = "SELECT * from marca WHERE codigo='$codigo'";
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
