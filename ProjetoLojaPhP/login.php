<?php
$acessar  = mysqli_connect('localhost','root','','escola');

if (isset($_POST['conectar']))
{
$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT login, senha FROM usuario
        WHERE login = '$login' and senha = '$senha'";

$resultado = mysqli_query($acessar,$sql);

if (mysqli_num_rows($resultado) == 0 )
{
   echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');
        window.location.href='login.php';
        </script>";
    }
    else
    {
        setcookie('login',$login);
        header('Location:selecao.html');
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="fotossite/cabecarioimagem.png" type="image/x-icon">
</head>
<body id="bodydologin">
    
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="quadradodologin"><br><br><br><br><br><br><br>
        Login do Administrador<br><br><br>
        <form name ="formulario" method="post" action="login.php">
            Login:   <input type="text" name="login" id="login" size=10><br><br>
            Senha: <input type="password" name="senha" id="senha" size=10><br><br>
            <input type="submit" name="conectar" value="Entrar" class="mandargeral">
      </form>
    </div>

</body>
</html>