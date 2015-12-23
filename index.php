<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 23/12/15
 * Time: 10:57
 */

require_once 'EntidadeInterface.php';
require_once 'Cliente.php';
require_once 'ServiceDB.php';

try {
    $conexao = new \PDO("mysql:host=localhost;dbname=pdo", "root", "1234");

}catch(\PDOException $e) {
    echo "Não foi possivel estabelecer uma conexão com o banco de dados. Erro: código ". $e->getCode();
}
$cliente = new Cliente($conexao);

$serviceDb = new ServiceDB($conexao, $cliente);
$resultado = $serviceDb->getColumns();

print_r($resultado);
