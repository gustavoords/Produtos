 <table class="small-12 collumns">
    <title>Visualização</title>
       <link rel="stylesheet" href="/css/foundation.min.css" />
       <link rel="stylesheet" href="/Estilo.css" />
        <link rel="stylesheet" href="/css/normalize.css" />
        <link rel="stylesheet" href="/icons/foundation-icons.css" />
    <?php
include_once("global.php");
include_once("footer.php");
include_once("header.php");


                        

        
        $sql = "SELECT * FROM `cadastrar` WHERE `Id`=:`Id`";
        $prepare = $conexao->prepare($sql);
              $prepare->execute();
             while($linha = $prepare->fetch(PDO::FETCH_ASSOC)){

                
                 
?>
<!-- EDITAR- para editar da tabela-->

                     <div class="Titulo">Editar</div>  
            <form method="post">
            <div class="large-3 columns">
                Nome           <input type="text" value="<?=$linha['Nome']?>" class="large-3 columns" name="Nome"><br>
       Valor      <br><input type="text" value="<?=$linha['Valor']?>" name="Valor"><br>
       Quantidade <br><input type="text" value="<?=$linha['Quantidade']?>" name="Quantidade"></br>
       Data           <input type="text" value="<?=$linha['Data']?>" name="Data">
                      <input type="submit" class="button tiny" value="Editar">
                      <input type="hidden"  value="<?=$linha['Id']?>" name="Editar2" />
            </div> </form>
        
            
            
            
      

       
             <?php
             
             

    if(isset($_POST['Editar2'])){
        $editar = "UPDATE `cadastrar` SET `Nome`=:Nome,`Valor`=:Valor,`Quantidade`=:Quantidade,`Data`=:Data WHERE `Id`=:Id";
        $prepare = $conexao->prepare($editar);
         $prepare->bindValue(":Id", $_POST['Editar2']);
        $prepare->bindValue(":Nome", $_POST['Nome']);
        $prepare->bindValue(":Valor", $_POST['Valor']);
        $prepare->bindValue(":Quantidade", $_POST['Quantidade']);
        $prepare->bindValue(":Data", $_POST['Data']);
    $prepare->execute();
    
    
             }
             
             }
   ?>