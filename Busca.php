
<link rel="stylesheet" href="Estilo.css">
   
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
           echo "</br>";
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