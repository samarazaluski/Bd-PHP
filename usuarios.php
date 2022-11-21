<?php

class Usuario

{
    private $pdo;
    public $msgERRO ="";

    public function conectar($nome,$host,$usuario,$senha)
{

    global $pdo;
    global $msgERRO;
    try

    {
    $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario,$senha);
     
    

} catch (exception $e){
    $msgERRO= $e-> getMessage();
}

}


   public function cadastrar($nome,$telefone,$email,$senha)
{

    global $pdo; 

    //verificar se já existe o email cadastrado

    $sql = $pdo-> prepare("SELECT id_Usuario from usuarios where email = :e");
    $sql-> bindValue(':e',$email);
    $sql-> execute();
    if($sql->rowcount() > 0 )
    {
        return false; //Já esta cadastrado

    }
    else
    {
         //caso nao, Cadastrar

         $sql = $pdo-> prepare("INSERT INTO usuarios(nome,telefone,email,senha) VALUES(:n,:t, :e, :s)");
         $sql -> binValue(":n",$nome);
         $sql -> binValue(":t",$telefone);
         $sql -> binValue(":e",$email);
         $sql -> binValue(":s",md5($senha));
         $sql -> execute();
         return true;

    }

}

public function logar($email,$senha)
{

global $pdo;

$sql= $pdo-> prepare ("Select id_Usuario from usuarios where email = :e and senha = :s");
$sql -> binValue(":e",$email);
$sql -> binValue(":s",md5($senha));
$sql -> execute();
if($sql->rowCount()>0)

{

    $dado = $sql-> fetch();
    session_start();
    $_SESSION['id_usuario'] = $dado['id_usuario'];
    return true;

}
else{

    return false;

}


}


}

