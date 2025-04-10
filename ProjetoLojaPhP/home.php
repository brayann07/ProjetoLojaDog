<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo ao Dog Shoes!</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" href="fotossite/cabecarioimagem.png" type="image/x-icon">
    <style>
        .quadradoresultados1{
            font-size: 41px;
           
        }
        .quadradoresultados2{
            font-size: 41px;
           
        }
        .quadradoresultados3{
            font-size: 41px;
            
        }
        .quadradoresultados4{
            font-size: 41px;
           
        }
        #extras{
            border: 1px solid;
            
        }
    </style>
</head>
<body id='bodyhome'>
    <div id="cabecariohome">
        <div class="elementosinicio">
            
            <img src="fotossite/cabecarioimagem.png" class="fotocabecariocachorro">
        </div>

        <div class="elementosdomeio"> 
            <div class="elementosdomeiotexto">DOG SHOES</div>
            
        </div>

        <div class="elementosdofim">
            <br><br><br>
            <a href="login.php"><button class="fimtextocabecariobotao">Entrar</button></a>
        </div>
    </div>
   <!--  Meio do html -->
     <br><br><br><br><br><br><br>
     <div id="quadradomeiohome">
        <div class="quadradoesquerdo"><br><br><br><br><br><br><br>
            <form method="post" action="home.php">
            Filtros:<br>
            Masculino:<input type="checkbox" name="masculino"><br>
            Feminino:<input type="checkbox" name="feminino"><br>
            Infantil:<input type="checkbox" name="infantil"><br><br>
            
            Marca:<br>
            Nike:<input type="checkbox" name="Nike"><br>
            Adidas:<input type="checkbox" name="Adidas"><br>
            Olympikus:<input type="checkbox" name="Olympikus"><br><br>

            Categorias:<br>
            Calçados:<input type="checkbox" name="calcados"><br>
            Roupas:<input type="checkbox" name="roupas"><br>
            Acessórios:<input type="checkbox" name="acessorios"><br><br>

            Tamanho:<br>
            G:<input type="checkbox" name="G"><br>
            P:<input type="checkbox" name="P"><br>
            M:<input type="checkbox" name="M"><br>
            GG:<input type="checkbox" name="GG"><br><br>

            Cor:<br>
            Azul:<input type="checkbox" name="azul"><br>
            Preto:<input type="checkbox" name="preto"><br>
            Branco:<input type="checkbox" name="branco"><br><br>
            <input type="submit" name="botaofiltrar" class="botaofiltrar" value="Filtrar"> 
            </form>
        </div>
        <div class="quadradodireito">
            <div class="quadrado1">
                <br><br><br>
                <div class="imagemdentro1">
                    <img src="fotossite/tenishome1.webp" width="250px" height="250px" class="fotodahome">
                </div><br>
                Tênis Preto Nike Masculino<br>
                R$230.00<br>
            </div>
            <div class="quadrado2">
                <br><br><br>
                <div class="imagemdentro2">
                    <img src="fotossite/tenishome2.webp" width="250px" height="250px" class="fotodahome">
                </div><br>
                Camiseta Branca Adidas Masculino<br>
                R$130.00
            </div>
            <div class="quadrado3">
                <br><br><br>
                <div class="imagemdentro3">
                    <img src="fotossite/tenishome3.jpg" width="250px" height="250px" class="fotodahome">
                </div><br>
                Calçados Preto Olympikus Masculino<br>
                R$330.00
            </div>
            <div class="quadrado4">
                <br><br><br>
                <div class="imagemdentro4">    
                    <img src="fotossite/tenishome4.webp" width="250px" height="250px" class="fotodahome">
                </div><br>
                Tênis Azul Nike Feminino<br>
                R$430.00
            </div>
        </div>
     </div>
    
    <div id="extras"><br>
        Resultados:<br><br>
        <div class="modelos">
        <?php
            $conectar = mysqli_connect("localhost", "root", "", "lojabrayan");

            if (isset($_POST['botaofiltrar'])) {
                $sql = "SELECT * FROM produto WHERE 1";

                $tipos = array();
                if (isset($_POST['masculino'])) {
                    array_push($tipos, "codtipo = 1");
                }
                if (isset($_POST['feminino'])) {
                    array_push($tipos, "codtipo = 2");
                }
                if (isset($_POST['infantil'])) {
                    array_push($tipos, "codtipo = 3");
                }
                if (count($tipos) > 0) {
                    $sql .= " AND (" . implode(" OR ", $tipos) . ")";
                }

                $marcas = array();
                if (isset($_POST['Nike'])) {
                    array_push($marcas, "codmarca = 2");
                }
                if (isset($_POST['Adidas'])) {
                    array_push($marcas, "codmarca = 1");
                }
                if (isset($_POST['Olympikus'])) {
                    array_push($marcas, "codmarca = 3");
                }
                if (count($marcas) > 0) {
                    $sql .= " AND (" . implode(" OR ", $marcas) . ")";
                }

                $categorias = array();
                if (isset($_POST['calcados'])) {
                    array_push($categorias, "codcategoria = 1");
                }
                if (isset($_POST['roupas'])) {
                    array_push($categorias, "codcategoria = 2");
                }
                if (isset($_POST['acessorios'])) {
                    array_push($categorias, "codcategoria = 3");
                }
                if (count($categorias) > 0) {
                    $sql .= " AND (" . implode(" OR ", $categorias) . ")";
                }

                $tamanhos = array();
                if (isset($_POST['G'])) {
                    array_push($tamanhos, "'G'");
                }
                if (isset($_POST['P'])) {
                    array_push($tamanhos, "'P'");
                }
                if (isset($_POST['M'])) {
                    array_push($tamanhos, "'M'");
                }
                if (isset($_POST['GG'])) {
                    array_push($tamanhos, "'GG'");
                }
                if (count($tamanhos) > 0) {
                    $sql .= " AND tamanho IN (" . implode(", ", $tamanhos) . ")";
                }

                $cores = array();

                if (isset($_POST['azul'])) {
                    $cores[] = 'Azul';
                }
                if (isset($_POST['preto'])) {
                    $cores[] = 'Preto';
                }
                if (isset($_POST['branco'])) {
                    $cores[] = 'Branco';
                }

                if (count($cores) > 0) {
                    $sql .= " AND cor IN ('" . implode("', '", $cores) . "')";
                }


                $resultado = mysqli_query($conectar, $sql);

                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $contadordediv = 1;
                    
                    while ($dados = mysqli_fetch_object($resultado)) {
                        if ($contadordediv > 4) {
                            break;
                        }
                        echo '<div class="quadradoresultados' . $contadordediv . '">';
                        echo " ";
                        echo '<table border=1 align="center"> 
                                <tr>
                                    <td>Foto Frente</td>
                                    <td>Foto Lado</td>
                                    <td>Descricao</td>
                                    <td>Cor</td>
                                    <td>Tamanho</td>
                                    <td>Preco</td>
                                </tr>';
                        
                        echo "<tr>
                                <td><img src='fotosbanco/{$dados->foto1}' height='150' width='150' /></td>
                                <td><img src='fotosbanco/{$dados->foto2}' height='150' width='150' /></td>
                                <td>{$dados->descricao}</td>
                                <td>{$dados->cor}</td>
                                <td>{$dados->tamanho}</td>
                                <td>{$dados->preco}</td>
                            </tr>";
                        
                        echo '</table>';
                        echo '</div>';
                        
                        
                        $contadordediv++;
                    }
                } else {
                    echo "<div class='quadradoresultados'>Achou nada!</div>";
                }
            }
            ?>
        </div>
    </div>
      <div id="rodape">
       <img src="fotossite/rodape.png" width="400px" height="100px">
     </div>
</body>
</html> 
