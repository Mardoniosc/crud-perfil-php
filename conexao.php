<?php
include_once('config.php');
$host = HOST_DB;
$port = PORT;
$dbname = DBNAME;
$user = USER_DB;
$password = PASSWORD_DB;

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    // criando nova conexão
    $conexaoPDO = new PDO($dsn);
    $conexaoPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conexaoPDO->prepare('SELECT * FROM perfil');
    $stmt->execute();

    // verifica se a conexão foi estabelecida
    if ($conexaoPDO) {
        // echo "Conecção com o banco <strong>$dbname</strong> estabelecida com sucesso!";
    }
} catch (PDOException $e) {
    // reporta as mensagens de erro
    echo $e->getMessage();
}
