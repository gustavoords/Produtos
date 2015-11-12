<?php session_start(); ?>
<title>inicial</title>
<link rel="stylesheet" href="/css/foundation.min.css" />
<link rel="stylesheet" href="/Estilo.css" />
<link rel="stylesheet" href="/css/normalize.css" />
<link rel="stylesheet" href="/icons/foundation-icons.css" />
<?php
include_once("global.php");
include_once("footer.php");
include_once("header.php");
include_once("Menu.php");
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
}
    ?>   

                  
                              </tr>
                      
     
</table>