<?php

try {
	$conexao = new \PDO("mysql:host=localhost;dbname=pdo", "root", "1234");

	#$query = "INSERT INTO clientes(name, email) VALUES ('Felipe Pimenta', 'fhpimenta12@gmail.com')";
	$query = "select * from clientes where id=:id";

	$stmt = $conexao->prepare($query);
	$stmt->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
	$stmt->execute();
	
	print_r($stmt->fetch(PDO::FETCH_ASSOC));

}catch(\PDOException $e) {
	echo "Não foi possivel estabelecer uma conexão com o banco de dados. Erro: código ". $e->getCode();
}