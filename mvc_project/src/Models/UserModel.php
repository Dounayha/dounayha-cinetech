<?php

namespace App\Models;

use PDO;

class UserModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Enregistrer un nouvel utilisateur
     */
    public function registerUser($username, $email, $hashedPassword) {
        // Insertion dans la base de données
        $query = "INSERT INTO users (username, email, password, created_at, updated_at) 
                  VALUES (:username, :email, :password, NOW(), NOW())";

        $stmt = $this->pdo->prepare($query);
        
        // Exécution de la requête avec les données fournies
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
    }

    /**
     * Récupérer un utilisateur par son email
     */
    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne l'utilisateur sous forme de tableau associatif
    }

    /**
     * Récupérer un utilisateur par son ID
     */
    public function getUserById($userId) {
        $query = "SELECT * FROM users WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':user_id' => $userId]);

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne l'utilisateur sous forme de tableau associatif
    }

    /**
     * Mettre à jour les informations d'un utilisateur
     */
    public function updateUser($userId, $username, $email, $hashedPassword = null) {
        $query = "UPDATE users SET username = :username, email = :email, updated_at = NOW()";
        $params = [
            ':username' => $username,
            ':email' => $email,
            ':user_id' => $userId
        ];

        // Si un mot de passe est fourni, il est mis à jour
        if ($hashedPassword) {
            $query .= ", password = :password";
            $params[':password'] = $hashedPassword;
        }

        $query .= " WHERE user_id = :user_id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params); // Retourne vrai si l'exécution réussit
    }

    /**
     * Vérifier si un email existe déjà dans la base de données
     */
    public function emailExists($email) {
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':email' => $email]);

        return $stmt->fetchColumn() > 0; // Retourne true si l'email existe, sinon false
    }

    /**
     * Vérifier si un utilisateur existe par ID
     */
    public function userExistsById($userId) {
        $query = "SELECT COUNT(*) FROM users WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':user_id' => $userId]);

        return $stmt->fetchColumn() > 0; // Retourne true si l'utilisateur existe, sinon false
    }
}
