<?php
    //conectar ao servidor         
    $conectar = mysql_connect('localhost','root','');        //nome e senha da conta -> na satc nome é root e não tem senha
    //conectar ao banco
    $banco  = mysql_select_db('portal');

    if (isset($_POST['conectar']))
    {
        $login = $_POST['login'];
        $senha = ($_POST['senha']);

        $sql = "select login, senha from colunistas 
                where login = '$login' and senha = '$senha'";

        $resultado = mysql_query($sql);

        if (mysql_num_rows($resultado) <> 0)
        {
            $colunistas = mysql_fetch_array($resultado);
            if ($colunistas["login"] !="")
            {
                $_SESSION['login'] = $colunistas['login'];
                $_SESSION['senha'] = $colunistas['senha'];
                header("Location: menu.html");
            }
        }
        else
        {
            echo"Usuário Inválido ou não cadastro !!!";
            header("Location: login.php");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <title>Login Colunista</title>
</head>
<body>
<div id="div1">   
<form name="formulario" method="post" action="login.php">

Login:
<input type="text" name="login" id="login" size=10>
<br><br>
Senha:
<input type="password" name="senha" id="senha" size=10>
</div>
<div id="div2"> 
<br>
<input type="submit" name="conectar" id="conectar" value="Login">
</div>

    
</body>
</html>