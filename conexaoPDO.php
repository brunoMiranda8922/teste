<?php 
$dsn = "mysql:dbname=loja;host=localhost";
$dbuser = "bruno";
$dbpass = ""; 

try {  
    $pdo = new PDO($dsn, $dbuser, $dbpass); 
} catch(PDOException $e) { 
    echo "Falhou: ".$e->getMessage();
}

?>


function listar($d)