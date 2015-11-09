<table class="small-12 collumns">
    <title>inicial</title>
       <link rel="stylesheet" href="/css/foundation.min.css" />
       <link rel="stylesheet" href="/Estilo.css" />
        <link rel="stylesheet" href="/css/normalize.css" />
        <link rel="stylesheet" href="/icons/foundation-icons.css" />
    <?php
include_once("global.php");
include_once("footer.php");
include_once("header.php");


//include_once("Busca.php");
?>
              <?php
  
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
                while($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
                   
                       
                   
                      echo "<tr>";
                        echo "<td>".$linha['Id']."</td>";
                        echo "<td>".$linha['Nome']."</td>";
                        echo "<td>".$linha['Valor']."</td>";
                        echo "<td>".$linha['Quantidade']."</td>";
                echo "<td>".$linha['Data']."</td>";
             ?>   
       <!-- delete- para deletar da tabela e do banco-->
        <td>  <form method="post">

        <input type="hidden"  value="<?=$linha['Id']?>Deletar" name="Deletar" />
        <input type="submit"  value="<?=$linha['Id']?>Deletar" name="Deletar" />
        
  
            </form> 
        <form method="post">

        <input type="hidden"  value="<?=$linha['Id']?>" name="Editar" />
        <input type="submit"  value="<?=$linha['Id']?>Editar" name="Editar" />
    
            </form>   </td>

       </tr>
                           <?php 
                }                
    if(isset($_POST['Deletar'])){
        $sql = "DELETE FROM cadastrar where `Id`=:Id;";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":Id", $_POST['Deletar']);
    $prepare->execute();  }

     if(isset($_POST['Editar'])){
         include_once 'Editar.php';
     
     }
    ?>                 
        
                
                
<!--        //input para fazer busca-->

<div class="buscar">
    <form method="post" class="small-12 columns">
        <input type="text" class="inputbusca" name="Palavra" placeholder="Nome ou Valor" />
             <input type="submit" class="button tiny"  value="Buscar" name="Botao" />
    </form>
</div>

 
        
   
       <?php
 
   if(isset($_POST['Palavra']) and !empty($_POST['Palavra']) and isset($_POST['Botao'])) {
    $Palavra=$_POST['Palavra'];       
    $Botao=$_POST['Botao'];
             

    
    
        $sql2="SELECT * FROM cadastrar where Nome like :Nome or Valor like :Valor";// no lugar do like poderia usar "=" mas o like pesquisa mesmo que esteja em minusculo ou igual
        $prepare = $conexao->prepare($sql2);
        $prepare->bindValue(":Nome", "%" . $Palavra . "%");//
        $prepare->bindValue(":Valor", "%" . $Palavra . "%");       
        $prepare->execute();
        
        
    while ($linha = $prepare->fetch(PDO::FETCH_ASSOC))     {
        
            echo " <table style='width: 100%;'>";
           echo "<tr>";
                        echo "<td>Id:</td>";
                        echo "<td>Nome:</td>";
                        echo "<td>Valor:</td>";
                        echo "<td>Quantidade:</td>";
                        echo "<td>Data:</td>";
                        echo "</tr>";                                   
                   
                        echo "<tr>";
                        echo "<td>".$linha['Id']."</td>";
                        echo "<td>".$linha['Nome']."</td>";
                        echo "<td>".$linha['Valor']."</td>";
                        echo "<td>".$linha['Quantidade']."</td>";
                        echo "<td>".$linha['Data']."</td>";
                        echo "</tr>";
                        
                        ?>



<?php
        
    }
    } 
       ?>
</table>