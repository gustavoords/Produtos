
<title>inicial</title>
<link rel="stylesheet" href="/css/foundation.min.css" />
<link rel="stylesheet" href="/Estilo.css" />
<link rel="stylesheet" href="/css/normalize.css" />
<link rel="stylesheet" href="/icons/foundation-icons.css" />
<?php
include_once("global.php");
include_once("footer.php");
include_once("header.php");
?>
<!--        //input para fazer busca-->

<div class="buscar">
    <form method="post" class="small-12 columns">
        <input type="text" class="inputbusca" name="Palavra" placeholder="Nome ou Valor" />
        <input type="submit" class="button tiny"  value="Buscar" name="Botao" />
    </form>
</div>
<?php
if (isset($_POST['Palavra']) and !empty($_POST['Palavra']) and isset($_POST['Botao'])) {
    $Palavra = $_POST['Palavra'];
    $Botao = $_POST['Botao'];

    include_once("Busca.php");
}
?>

<br/>
<br/>
<!-- Tabela de Produtos-->
<?php
echo "<table class='small-12 collumns'>";
echo "<tr>";
echo "<td>Id:</td>";
echo "<td>Nome:</td>";
echo "<td>Valor:</td>";
echo "<td>Quantidade:</td>";
echo "<td>Data:</td>";
echo "</tr>";

$sql = "SELECT * FROM cadastrar";
$prepare = $conexao->prepare($sql);
$prepare->execute();
while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)) {



    echo "<tr>";
    echo "<td>" . $linha['Id'] . "</td>";
    echo "<td>" . $linha['Nome'] . "</td>";
    echo "<td>" . $linha['Valor'] . "</td>";
    echo "<td>" . $linha['Quantidade'] . "</td>";
    echo "<td>" . $linha['Data'] . "</td>";
    ?>   
    <!-- Delete e Editar -->


    <!-- Delete -->
    <td>  <form method="post" action="Visualizar.php">

            <input type="hidden"  value="<?= $linha['Id'] ?>Deletar" name="Deletar" />
            <input type="submit"  value="<?= $linha['Id'] ?>Deletar" name="Deletar" />


        </form> 
        <!-- editar -->   
        <form method="post">

            <input type="hidden"  value="<?= $linha['Id'] ?>" name="Editar" />
            <input type="submit"  value="<?= $linha['Id'] ?>Editar" name="Editar" />

        </form>   </td>

    </tr>
    <?php
}
//executando o delete
if (isset($_POST['Deletar'])) {
    echo"";
    $sql = "DELETE FROM cadastrar where `Id`=:Id;";
    $prepare = $conexao->prepare($sql);
    $prepare->bindValue(":Id", $_POST['Deletar']);
    $prepare->execute();
}

//executando o  editar

if (isset($_POST['Editar'])) {

    $sql = "SELECT * FROM `cadastrar` WHERE `Id`=:Id";
    $prepare = $conexao->prepare($sql);
    $prepare->bindValue(":Id", $_POST['Editar']);
    $prepare->execute();
    while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)) {
        ?>

        <div class="Titulo">Editar</div>  
        <form method="post">
            <div class="large-3 columns">
                Nome           <input type="text" value="<?= $linha['Nome'] ?>" class="large-3 columns" name="Nome"><br>
                Valor      <br><input type="text" value="<?= $linha['Valor'] ?>" name="Valor"><br>
                Quantidade <br><input type="text" value="<?= $linha['Quantidade'] ?>" name="Quantidade"></br>
                Data           <input type="text" value="<?= $linha['Data'] ?>" name="Data">

                <input type="hidden"  value="<?= $linha['Id'] ?>" name="Editar2" /> 
                <input type="submit" class="button tiny" value="Editar"  name="Editar">
            </div> </form>

        <?php
        }

    }
    if (isset($_POST['Editar2'])) {
        $editar = "UPDATE cadastrar SET `Nome`=:Nome,`Valor`=:Valor,`Quantidade`=:Quantidade,`Data`=:Data WHERE `Id`=:Id";
        $prepare = $conexao->prepare($editar);
        $prepare->bindValue(":Id", $_POST['Editar2']);
        $prepare->bindValue(":Nome", $_POST['Nome']);
        $prepare->bindValue(":Valor", $_POST['Valor']);
        $prepare->bindValue(":Quantidade", $_POST['Quantidade']);
        $prepare->bindValue(":Data", $_POST['Data']);
        $prepare->execute();
    }
    

?>                 





</table>