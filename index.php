<?php
    session_start();

    include_once("Global.php");

    if(isset($_SESSION['admin'])){
        header("Location: /Visualizar.php");
    }
    
    if(isset($_SESSION['usuario'])){
        header("Location: /VisualizarUsuario.php");
    }

    if(
        isset($_POST['Nome']) and
        isset($_POST['Senha'])
    ){
        $sql = "SELECT Nome, Id FROM `usuario` WHERE `Nome`=:Nome and `Senha` =:Senha;";
        $preparo = $conexao->prepare($sql);
        $preparo->bindValue(":Nome", $_POST['Nome']);
        $preparo->bindValue(":Senha", $_POST['Senha']);
        $preparo->execute();

        if($preparo->rowCount() == 1){ //1 o usuario logou, 0 Nome ou Senha invalidos
            $linha = $preparo->fetch(PDO::FETCH_ASSOC);
            $_SESSION['usuario'] = $linha;
        }else{
            $sql = "SELECT Nome, Id FROM `admin` WHERE `Nome`=:Nome and `Senha` = :Senha;";
            $preparo = $conexao->prepare($sql);
            $preparo->bindValue(":Nome", $_POST['Nome']);
            $preparo->bindValue(":Senha", $_POST['Senha']);
            $preparo->execute();

            if($preparo->rowCount() == 1){ //1 o usuario logou, 0 Nome ou Senha invalidos
                $linha = $preparo->fetch(PDO::FETCH_ASSOC);
                $_SESSION['suporte'] = $linha;
            }
        }

        if(
        !isset($_SESSION['suporte']) and
        !isset($_SESSION['usuario'])
        ){
            $msg = "Usuario ou Senha InvÃ¡lidos";
        }else{
            if(isset($_SESSION['suporte'])){
                header("Location: /Visualizar.php");
            }
            if(isset($_SESSION['usuario'])){
                header("Location: /Visualizar.php");
            }
        }
    }
?>

<?php include_once ("header.php"); ?>

<?php  if(isset($msg)){ ?>
    <div data-alert class="alert-box alert">
        <?= $msg ?>
        <a href="#" class="close">&times;</a>
    </div>
<?php } ?>

<form method="post">
    <div class="row login">
        <div class="large-12 small-12 medium-12 columns">
            <label>
                Nome:
                <input type="text" name="Nome" />
            </label>
        </div>
        <div class="large-12 small-12 medium-12 columns">
            <label>
                Senha:
                <input type="password" name="Senha" />
            </label>
        </div>
        <div class="large-12 small-12 medium-12 columns">
            <input class="button tiny" type="submit" value="Entrar" />
        </div>
    </div>
</form>


<?php include_once ("footer.php"); ?>