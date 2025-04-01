
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro dos Produtos</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="fotossite/cabecarioimagem.png" type="image/x-icon">
    <style>
        .partedireitaP{
            font-size: 30px;
            text-align: center;
            border-radius: 20px;
            height: 900px;
            background-color: #d8a5a5;
            margin-top:50px;
        }
        #quadradoprodutos{
            width: 1000px;
            height: 900px;
            margin: auto;
        }
        .parteesquerdaP{
            margin: auto;
            font-size: 20px;
            text-align: center;
            border-radius: 20px;
            height: 900px;
            background-color: #d8a5a5;
        }
    </style>
</head>
<body id="geral">
    <form name ="formulario" method="post" action="cadastroprodutos.php" enctype="multipart/form-data"><br><br><br><br><br><br><br><br><br><br><br>
        <div id="quadradoprodutos">
            <div class="parteesquerdaP"><br>
                <h3>Cadastro Dos Produtos:</h3><br>
                Codigo<br> <input type="text" name="codprodutos" id="codprodutos" size=10 placeholder="Digite Aqui"><br><br>
                Descrição<br> <input type="text" name="descricaoprodutos" id="descricaoprodutos" size=10 placeholder="Digite Aqui"><br><br>
                Cor<br>   <input type="text" name="corprodutos" id="corprodutos" size=10 placeholder="Digite Aqui"><br><br>
                Tamanho<br>   <input type="text" name="tamanhoprodutos" id="tamanhoprodutos" size=10 placeholder="Digite Aqui"><br><br>
                Preço<br>   <input type="text" name="precoprodutos" id="precoprodutos" size=10 placeholder="Digite Aqui"><br><br>
                Codmarca<br>   <input type="text" name="codmarcaprodutos" id="codmarcaprodutos" size=10 placeholder="Digite Aqui"><br><br>
                Codcategoria <br>  <input type="text" name="codcategoriaprodutos" id="codcategoriaprodutos" size=10 placeholder="Digite Aqui"><br><br>
                CodTipo <br>  <input type="text" name="codtipoprodutos" id="codtipoprodutos" size=10 placeholder="Digite Aqui"><br><br>
                Foto1<br>   <input type="file" name="foto1produtos" id="foto1produtos" size=10 ><br><br>
                Foto2 <br>  <input type="file" name="foto2produtos" id="foto2produtos"><br><br>
            <input type="submit" name="gravarprodutos" value="Gravar" class="mandargeral">
            <input type="submit" name="alterarprodutos" value="Alterar" class="mandargeral">
            <input type="submit" name="excluirprodutos" value="Excluir" class="mandargeral">
            <input type="submit" name="pesquisarprodutos" value="Pesquisar" class="mandargeral">
            <div class="partedireitaP">
                <br> <h3>Resultados:</h3>
            <?php
                $conectar = mysqli_connect("localhost","root","","lojabrayan");
                if (isset($_POST['gravarprodutos']))
                {
                    //capturar variaveis HTML
                    $codigo = $_POST['codprodutos'];
                    $descricao = $_POST['descricaoprodutos'];
                    $cor = $_POST['corprodutos'];
                    $tamanho = $_POST['tamanhoprodutos'];
                    $preco = $_POST['precoprodutos'];
                    $codmarca = $_POST['codmarcaprodutos'];
                    $codcategoria = $_POST['codcategoriaprodutos'];
                    $codtipo = $_POST['codtipoprodutos'];
                    $foto1 = $_FILES['foto1produtos'];
                    $foto2 = $_FILES['foto2produtos'];
                    $diretorio =  "fotosbanco/";
                    //* Mudar nome da foto(criptografar)
                    $extensao1 = strtolower(substr($_FILES['foto1produtos']['name'], -4));
                    $novo_nome1 = md5(time().$extensao1);
                    move_uploaded_file($_FILES['foto1produtos']['tmp_name'], $diretorio.$novo_nome1);

                    $extensao2 = strtolower(substr($_FILES['foto2produtos']['name'], -6));
                    $novo_nome2 = md5(time().$extensao2);
                    move_uploaded_file($_FILES['foto2produtos']['tmp_name'], $diretorio.$novo_nome2);

                    $sql = "insert into produto (codigo,descricao,cor,tamanho,preco,codmarca,codcategoria,codtipo,foto1,foto2)
                            values('$codigo','$descricao','$cor','$tamanho','$preco','$codmarca','$codcategoria','$codtipo','$novo_nome1','$novo_nome2')";
                    //valor booleano        
                    $resultado = mysqli_query($conectar,$sql);
                    if ($resultado == TRUE){
                        echo "Dados gravados com sucesso!(produtos)";
                    }
                    else{
                        echo "Dados não gravados!";
                    }
                }
                if (isset($_POST['alterarprodutos'])){
                    $codigo = $_POST['codprodutos'];
                    $descricao = $_POST['descricaoprodutos'];
                    $cor = $_POST['corprodutos'];
                    $tamanho = $_POST['tamanhoprodutos'];
                    $preco = $_POST['precoprodutos'];
                    $codmarca = $_POST['codmarcaprodutos'];
                    $codcategoria = $_POST['codcategoriaprodutos'];
                    $codtipo = $_POST['codtipoprodutos'];
                    
                    $sql = "UPDATE produto SET descricao='$descricao',cor='$cor',tamanho='$tamanho',preco='$preco',codmarca='$codmarca',codcategoria='$codcategoria',codtipo='$codtipo' WHERE codigo='$codigo' ";
                    $resultado = mysqli_query($conectar,$sql);
                    if ($resultado == TRUE){
                        echo "Dados alterados com sucesso";
                    }
                    else{
                        echo "Dados não gravados";
                    }
                }

                if (isset($_POST['excluirprodutos'])){
                        $codigo = $_POST['codprodutos'];

                        $sql = "DELETE FROM produto WHERE codigo='$codigo'";

                        $resultado = mysqli_query($conectar,$sql);
                        
                        if ($resultado == TRUE){
                            echo "Dados excluidos com sucesso";
                        }
                        else{
                            echo "Dados não excluidos";
                        }
                }
                if (isset($_POST["pesquisarprodutos"])){
                    $codigo = $_POST['codprodutos'];
                    $sql = "SELECT * from produto WHERE codigo='$codigo'";
                    $resultado = mysqli_query($conectar,$sql);
                    if ($resultado == TRUE){
                        while($dados = mysqli_fetch_object($resultado)){
                            echo "Codigo :".$dados->codigo," ";
                            echo "<br>";
                            echo "Descricao:".$dados->descricao," ";
                            echo "<br>";
                            echo "Cor:".$dados->cor," ";
                            echo "<br>";
                            echo "Tamanho:".$dados->tamanho," ";
                            echo "<br>";
                            echo "Preco:".$dados->preco," ";
                            echo "<br>";
                            echo "Cod Marca:".$dados->codmarca," ";
                            echo "<br>";
                            echo "Cod Categoria:".$dados->codcategoria," ";
                            echo "<br>";
                            echo "Cod Tipo:".$dados->codtipo," ";
                            echo "<br>";
                            echo '<img src="fotosbanco/'.$dados->foto1.'"height="200" width="200" />'."  ";
                            echo "<br>";
                            echo '<img src="fotosbanco/'.$dados->foto2.'"height="200" width="200" />'."<br><br>  ";
                        
                            
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