<?php
// conectar ao servidor e ao banco de dados
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('portal');

// se escolher a opção GRAVAR
if (isset($_POST['gravar']))
{
    $codigo = $_POST['codigo'];
    $nome =   $_POST['nome'];
    $sql = "insert into categorias (codigo, nome) values ('$codigo','$nome')";

    $resultado = mysql_query($sql);

if($resultado)
{
    echo "Dados Gravado com SUCESSO!";}
else
{
    echo "Erro ao Gravar Dados!" ;}

}

if (isset($_POST['alterar']))
{
    $codigo = $_POST['codigo'];
    $nome =   $_POST['nome'];

    $sql = "update categorias set nome = '$nome'
            where codigo = '$codigo'";

    $resultado = mysql_query($sql);

if($resultado)
{
    echo "Dados alterado com SUCESSO!";}
else
{
    echo "Erro ao alterar Dados!" ;}

}



if (isset($_POST['excluir']))
{
    $codigo = $_POST['codigo'];
    $nome =   $_POST['nome'];

    $sql = "delete  from categorias
         where codigo = '$codigo'";

    $resultado = mysql_query($sql);

if($resultado)
{
    echo "Dados Excluidos  com SUCESSO!";}
else
{
    echo "Erro ao Excluir  Dados!" ;}

}

if (isset($_POST['pesquisar']))
{
    $sql = "select * from categorias";
    $resultado = mysql_query($sql);

    if(mysql_num_rows($resultado) == 0)
    { echo "Sua pesquisa não retornou resultado....";}
    else
    {
        echo "Resultado da pesquisa das categorias: "."<br>";
        while($categorias = mysql_fetch_array ($resultado))
        {
        echo "codigo: ".$categorias['codigo']."<br>".
            "Nome: ".$categorias['nome']."<br><br>";  
        }
    }
}



?>






























<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>cadastro categorias</title>
</head>
<body>
<form name="formulario" method="post" action="cadastrocategorias.php">
    <h1> cadastro categorias portal de noticias </h1>
    codigo:
    <input type="text" name="codigo" id="codigo" size=10>
    <br><br>
    nome:
    <input type="text" name="nome" id="nome" size=10>
    <br><br>






    
    <input type="submit" name="gravar"    id="gravar"    value="gravar">
<input type="submit" name="alterar"   id="alterar"   value="Alterar">
<input type="submit" name="excluir"   id="excluir"   value="Excluir">
<input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">
</form>





</body>
</html>