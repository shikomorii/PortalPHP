<?php


$conectar = mysql_connect('localhost','root','');
$banco = mysql_select_db('portal');


$sql_regiao= "SELECT codigo,nome FROM regiao";
$pesquisar_regiao = mysql_query($sql_regiao);

$sql_colunistas= "SELECT codigo,nome FROM colunistas";
$pesquisar_colunistas = mysql_query($sql_colunistas);

$sql_categorias= "SELECT codigo,nome FROM categorias";
$pesquisar_categorias = mysql_query($sql_categorias);

$vazio = 0;



if(!empty($_POST['pesquisar_regiao']))
{
    $regiao  = (empty($_POST['codregiao']))? 'null' : $_POST['codregiao'];

    if ($regiao <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.data, materias.hora, materias.chamada
                      FROM materias
                      WHERE materias.codregiao ='$regiao'";
     
     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}

if(!empty($_POST['pesquisar_categorias']))
{
    $categorias  = (empty($_POST['codcategorias']))? 'null' : $_POST['codcategorias'];

    if ($categorias <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.data, materias.hora, materias.chamada
                      FROM materias
                      WHERE materias.codcategorias ='$categorias'";

     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}

if(!empty($_POST['pesquisar_colunistas']))
{
    $colunistas  = (empty($_POST['codcolunistas']))? 'null' : $_POST['codcolunistas'];

    if ($colunistas <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.data, materias.hora, materias.chamada
                      FROM materias
                      WHERE materias.codcolunistas ='$colunistas'";

     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}

?>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
    <title>Menu de cadastros</title>
    <link rel="stylesheet" type="text/css" href="sebass.css" />
    <script src="formatar.js"></script>
</head>
<body>
    <div id="usuario">
        <a href="login.php"><img src="usuario.png" width="40"> </a></img>
      </div>
    <div id="logo">
      <img src="logo.png" width="220"></img>
    </div>
    
   
    <nav class="nav">
    <!-- <b>Pesquisar:  <b> -->
      <div id="cabecario">
       <br>
       <form name="formulario" method="post" action="portal.php">
        regiao:<br>
            <select name="codregiao" id="codregiao">
                <option value = 0>Selecionar regiao</option>
                    <?php
                    if(mysql_num_rows($pesquisar_regiao) == 0)
                    {
                        echo "<h1> Não encontrou </h1>";
                    }
                    else{
                        while($regiao = mysql_fetch_array($pesquisar_regiao))
                        {
                            echo '<option value="',$regiao['codigo'].'">',$regiao['nome'].'</option>';
                        }
                    }
                        
                    ?>

            </select><input type="submit" name="pesquisar_regiao" id="pesquisar_regiao" value="Pesquisar">
            <br><br>
            </form>
            
            <form name="formulario" method="post" action="portal.php"> 
            colunista:<br>
            <select name="codigo" id="codigo">
                <option value = 0>Selecionar a colunistas</option>
                    <?php
                    if(mysql_num_rows($pesquisar_colunistas) == 0)
                    {
                        echo "<h1> Não encontrou </h1>";
                    }
                    else
                    {
                        while($colunista = mysql_fetch_array($pesquisar_colunistas))
                        {
                            echo '<option value="',$colunistas['codigo'].'">',$colunista['nome'].'</option>';
                        }
                    }
                    ?>
            </select><input type="submit" name="pesquisar_colunistas" id="pesquisar_colunistas" value="Pesquisar">
            <br><br>
            </form>

            <form name="formulario" method="post" action="portal.php"> 
            categorias:<br>
            <select name="codigo" id="codigo">
                <option value = 0>Selecionar categorias</option>
                    <?php
                    if(mysql_num_rows($pesquisar_categorias) == 0)
                    {
                        echo "<h1> Não encontrou </h1>";
                    }
                    else
                    {
                        while($categorias = mysql_fetch_array($pesquisar_categorias))
                        {
                            echo '<option value="',$categorias['codigo'].'">',$categorias['nome'].'</option>';
                        }
                    }
                    ?>
            </select><input type="submit" name="pesquisar_categorias" id="pesquisar_categorias" value="Pesquisar">
            <br><br>
            </form>

    
               
      </div>
    </nav>
    
<div id="resultado">
    <table>
        <td>

<?php

    if ($vazio == 0)
    {
     $sql_portal = "SELECT  materias.data, materias.hora, materias.chamada, materias.fotochamada
                      FROM materias ORDER BY materias.codigo LIMIT 2";
     $seleciona_materias = mysql_query($sql_portal);

   
      while($res = mysql_fetch_array($seleciona_materias))
            {
         
            echo "<br>".$res['chamada']."<br>".
                 utf8_encode('<a href="login.php"><img src="Fotos/'.$res['fotochamada'].'"  height="400" width="300" /></a>')."<br>"."<td>";
            }
    }
    

?>
</div>

<div id="frasenoticias">

</div>
  
<div id="vermelho"> <h3>colunistas</h3>

<b>Sebastian Oyarbide</b>
<img src="data:image/jpeg;base64,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" width="100"></img>

<br><br>
<div id="zepequeno">
<b>ze pequeno da silva</b>
<img src="https://www.estadao.com.br/resizer/6EQKRS30XRnmyygPSGUyngRjpjY=/320x448/filters:format(jpg):quality(80):focal(-5x-5:5x5)/cloudfront-us-east-1.images.arcpublishing.com/estadao/6GVX2QF7ENLQHOBEVFFIUPBZWU.jpg" width="110" height="150" ></img>

</div>
</div>
</body>

 </html>