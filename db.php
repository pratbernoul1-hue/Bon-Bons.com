<?php

$databaseUrl = getenv('MYSQL_URL');

if (!$databaseUrl) {
    die("Erreur : MYSQL_URL n'est pas définie.");
}

$db = parse_url($databaseUrl);

$host = $db['host'];
$port = $db['port'] ?? 3306;
$user = $db['user'];
$password = $db['pass'];
$database = ltrim($db['path'], '/');

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

function dbquery($sql, $params = [])
{
    global $pdo;

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(); 
}
?>
