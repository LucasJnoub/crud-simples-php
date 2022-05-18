<?php

 $db_user = 'root';
 $db_password = 'root';

    // conexão com o banco.
 try {
    $connection = new PDO('mysql:host=localhost;port=3306;dbname=cadastro',$db_user,$db_password);
 } catch (Exception $error) {
     echo "Ocorreu o seguinte erro:".$error->getMessage();
 }

 //Inserindo dados na tabela cliente.

 $sql = 'INSERT INTO clientes (nome,email,cidade,estado) VALUES(:nome,:email,:cidade,:estado)';
 $result = $connection->prepare($sql);
 $result->bindValue(':nome','Lucas Oliveira');
 $result->bindValue(':email','lucas.jnoub@gmail.com');
 $result->bindValue(':cidade','Rio de Janeiro');
 $result->bindValue(':estado','RJ');

 $result->execute();


 //atualizando dados na tabela cliente.

$sql = 'UPDATE clientes SET nome="Lucas Silva" WHERE id =:id';
$result = $connection->prepare($sql);
$result->bindValue(':id',2);
$result->execute();
// deletando dados.


$sql = 'DELETE FROM clientes WHERE nome =:nome';
$result = $connection->prepare($sql);
$result->bindValue(':nome','Lucas Silva');
$result->execute();

// Consultando dados da tabela ciente.
$sql = 'select * from clientes';
$result = $connection->prepare($sql);
$result->execute();

?>