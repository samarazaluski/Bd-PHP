<?php

require_once'CLASSES/Usuarios.php';
$u = new Usuario;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
    <h1>Cadastrar-se</h1>
    <form method="POST" >
        <input type="txt" name="nome" placeholder="Nome">
        <input type="txt" name="telefone" placeholder="Telefone">
        <input type="email" name="email"placeholder="Usuário">
        <input type="password" name="senha" placeholder="Senha">
        <input type="password"name="confirmar senha"placeholder="Confirmar Senha">
        <input type="submit" value="Cadastrar">
        
</form>
   
<?php


if (isset($_POST ['nome']))

{
    $nome=addslashes($_POST ['nome'])
    $telefone=addslashes($_POST ['telefone'])
    $email=addslashes($_POST ['email'])
    $senha=addslashes($_POST ['senha'])
    $confirmarsenha=addslashes($_POST ['confirmarsenha']);

    if(!empty($nome)&& !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarsenha)) 
{
    $u->conectar("bd_Login","localhost","root","");
    if($u->msgErro=="")

    {
        if($senha == $confirmarsenha)
    }



    {
        $u->cadastrar($nome,$telefone,$email,$senha);
    }

     else
     {

        echo"Senha e confirmar senha não correspondido!";
     }
    {
        $u->cadastrar($nome,$telefone,$email,$senha);

    }

    else
    {
        echo "Erro:" .$u->msgErro;
    }

}else 
        
{
    echo "preencha todos os campos";
}

}
    


</body>
</html>