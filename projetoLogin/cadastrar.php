<!DOCTYPE html>

<?php 

    require_once 'classes/usuarios.php';
    $user = new Usuario;

?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="corpo-form-Cad">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30"> 
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30"> 
            <input type="email" name="email" placeholder="Usuário e-mail" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha">
            <input type="submit" value="Cadastrar">
        </form>
    </div>

<?php
    //verifcar se clicou no botão
    if(isset($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);

        //verifica se está preenchido
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

            $user->conectar("loginbd","localhost","root","");

            if($user->msgErro == "") { //se está tudo ok

                if($senha == $confirmarSenha) {

                    if($user->cadastrar($nome,$telefone,$email,$senha)) {

                        ?>

                        <div id="msg-sucesso">

                            Cadastrado com sucesso. Acesse para entrar!

                        </div>

                        <?php

                    } else {

                        ?>

                        <div class="msg-erro"> 
                            
                            E-mail já cadastrado! 

                        </div>

                        <?php
                    }

                } else {

                        ?>

                        <div class="msg-erro"> 
                            
                            Senha e Confirmar Senha não correspondem!

                        </div>

                        <?php
                    
                }
                
            } else {

                    ?>

                        <div class="msg-erro">
                            <?php echo "Erro: ".$user->msgErro; ?>
                        </div>

                    <?php
            }

        } else {

                    ?>

                    <div class="msg-erro"> 
                        
                        Preencha todos os campos!

                    </div>

                    <?php
            
        }
    }
?>

</body>
</html>