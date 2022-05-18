<!--forms para atualizar -->
<form action="index.php" method="post">    
    Digite o id e o novo nome da pessoa que deseja atualizar: <br>
    ID: <input type="text" name="idAtualizar"><br>
    Novo nome: <input type="text" name="novo_nome"> <br>
    Novo email: <input type="text" name="novo_email"> <br>
    <input type="submit" value="atualizar">
</form>

<hr>
<!--forms para deletar -->
<form action="index.php" method="post">
    Digite o id q deseja deletar:
    <input type="text" name="id"><br>
    <input type="submit" value="deletar">
</form>

<?php

 $db_user = 'root';
 $db_password = 'root';

    // conexão com o banco.
 try {
    $connection = new PDO('mysql:host=localhost;port=3306;dbname=cadastro',$db_user,$db_password);
 } catch (Exception $error) {
     echo "Ocorreu o seguinte erro:".$error->getMessage();
 }
 //Inserindo dados na tabela clientes.
 // O usuário é inserido automaticamente.
 $sql = 'INSERT INTO clientes (nome,email,cidade,estado) VALUES(:nome,:email,:cidade,:estado)';
 $result = $connection->prepare($sql);
 $result->bindValue(':nome','Lucas Oliveira');
 $result->bindValue(':email','lucas.jnoub@gmail.com');
 $result->bindValue(':cidade','Rio de Janeiro');
 $result->bindValue(':estado','RJ');
 $result->execute();
 


 //atualizando dados na tabela clientes.
$novo_nome = $_POST["novo_nome"];
$idAtualizado = $_POST["idAtualizar"];
$novo_email = $_POST["novo_email"];
$sql = "UPDATE clientes SET nome='$novo_nome', email='$novo_email' WHERE id =:id";
$result = $connection->prepare($sql);
$result->bindValue(':id',$idAtualizado);
$result->execute();


// deletando dados na tabela clientes.
$sql = 'DELETE FROM clientes WHERE id =:id';
$result = $connection->prepare($sql);
$id = $_POST['id'];
$result->bindValue(':id',$id);
$result->execute();

// Consultando dados da tabela cientes.
$sql = 'select * from clientes';
$result = $connection->prepare($sql);
$result->execute();

?>
