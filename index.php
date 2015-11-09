
      <link rel="stylesheet" href="/css/foundation.min.css" />
       <link rel="stylesheet" href="/Estilo.css" />
        <link rel="stylesheet" href="/css/normalize.css" />
        <link rel="stylesheet" href="/icons/foundation-icons.css" />
            <?php
      
include_once("global.php");
include_once("footer.php");
include_once("header.php");

if(
        isset($_POST['Nome']) and
        isset($_POST['Valor']) and
        isset($_POST['Quantidade'])
        ){


$sql = "INSERT INTO cadastrar (Nome, Valor, Quantidade, Data) VALUES (:Nome, :Valor, :Quantidade, :Data)";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":Nome", $_POST['Nome']);
        $prepare->bindValue(":Valor", $_POST['Valor']);
        $prepare->bindValue(":Quantidade", $_POST['Quantidade']);
        $prepare->bindValue(":Data", $_POST['Data']);
    $prepare->execute();
    
    }
    
?>

        <div class="Titulo">Cadastro de Produtos</div>  
        <form method="post">
            <div class="large-3 columns">
       Nome           <input type="text" class="large-3 columns" name="Nome"><br>
       Valor      <br><input type="text" name="Valor"><br>
       Quantidade <br><input type="text"  name="Quantidade"></br>
       Data           <input type="text" name="Data">
                      <input type="submit" class="button tiny" value="Cadastrar">
            </div> </form>
        
        