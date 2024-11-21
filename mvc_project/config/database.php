<?php
namespace App\config;

use PDO;
use PDOException;

class Database {
    private static $host = 'localhost';      // Adresse du serveur
    private static $dbname = 'cinetech'; // Nom de la base de données
    private static $username = 'root';       // Nom d'utilisateur
    private static $password = '';           // Mot de passe
    private static $charset = 'utf8mb4';     // Jeu de caractères

    public static function getConnection() {
        try {
            // Construction de la chaîne de connexion
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=" . self::$charset;
            $pdo = new PDO($dsn, self::$username, self::$password);

            // Configuration des options PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Mode de récupération

            return $pdo;
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
