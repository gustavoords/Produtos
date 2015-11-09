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

?>

<!-- EDITAR- para editar da tabela-->
                     <div class="Titulo">Editar</div>  
            <form method="post">
            <div class="large-3 columns">
       Nome           <input type="text" class="large-3 columns" name="Nome"><br>
       Valor      <br><input type="text" name="Valor"><br>
       Quantidade <br><input type="text"  name="Quantidade"></br>
       Data           <input type="text" name="Data">
                      <input type="submit" class="button tiny" value="Editar">
                      <input type="hidden"  value="<?=$linha['Id']?>" name="Editar2" />
            </div> </form>
        
            
            
            
      

       
                           <?php
                
print_r($_POST);
    if(isset($_POST['Editar2'])){
        $sql = "UPDATE `cadastrar` SET `Nome`=:Nome,`Valor`=:Valor,`Quantidade`=:Quantidade,`Data`=:Data WHERE `Id`=:Id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":Nome", $_POST['Nome']);
        $prepare->bindValue(":Valor", $_POST['Valor']);
        $prepare->bindValue(":Quantidade", $_POST['Quantidade']);
        $prepare->bindValue(":Data", $_POST['Data']);
    $prepare->execute();
    
    
    }
    
 
    
    ?>