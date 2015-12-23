<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 23/12/15
 * Time: 10:57
 */

require_once 'Cliente.php';

try {
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo", "root", "1234");

}catch(\PDOException $e) {
    echo "Não foi possivel estabelecer uma conexão com o banco de dados. Erro: código ". $e->getCode();
}
$cliente = new Cliente($conexao);

//$cliente->setId(1);
//$cliente->setName('Felipe Meneses');
//$cliente->setEmail('fhpimenta12@gmail.com');


$resultado = $cliente->find(1);
print_r($resultado);
/*
foreach($cliente->find(1) as $c) {
    echo $c['name']."<br>";
}
*/