<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Views\View;

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
    }

    public function register() {
        // Vérifiez si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleRegister($_POST); // Traite les données du formulaire
        } else {
            // Afficher le formulaire d'inscription via la vue
            $view = new View();
            $view->render('/register');
        }
    }

    public function handleRegister($data) {
        $username = $data['username'] ?? null;
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;
        $confirmPassword = $data['confirm_password'] ?? null;

        if ($username && $email && $password && $confirmPassword) {
            if ($password !== $confirmPassword) {
                echo "Les mots de passe ne correspondent pas.";
                return;
            }

            if ($this->userModel->emailExists($email)) {
                echo "Cet email est déjà utilisé.";
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if ($this->userModel->registerUser($username, $email, $hashedPassword)) {
                echo "Inscription réussie.";
                header("Location: index.php?action=login");
                exit();
            } else {
                echo "Une erreur est survenue lors de l'inscription.";
            }
        } else {
            echo "Tous les champs sont obligatoires.";
        }
    }

    public function login() {
        // Afficher le formulaire de connexion via la vue
        $view = new View();
        $view->render('/login');
    }

    public function handleLogin($data) {
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if ($email && $password) {
            $user = $this->userModel->getUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                echo "Connexion réussie.";
                header("Location: index.php?action=profile");
                exit();
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        } else {
            echo "Tous les champs sont obligatoires.";
        }
    }

    public function update() {
        session_start();

        if (!isset($_SESSION['user'])) {
            echo "Vous devez être connecté pour modifier vos informations.";
            header("Location: index.php?action=login");
            exit();
        }

        // Afficher le formulaire de mise à jour via la vue
        $view = new View();
        $view->render('/profile', [
            'user' => $_SESSION['user']
        ]);
    }

    public function handleUpdate($data) {
        session_start();

        if (!isset($_SESSION['user'])) {
            echo "Vous devez être connecté pour modifier vos informations.";
            header("Location: index.php?action=login");
            exit();
        }

        $userId = $_SESSION['user']['user_id'];
        $username = $data['username'] ?? null;
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;
        $confirmPassword = $data['confirm_password'] ?? null;

        if ($username && $email) {
            if ($password && $confirmPassword && $password !== $confirmPassword) {
                echo "Les mots de passe ne correspondent pas.";
                return;
            }

            $hashedPassword = $password ? password_hash($password, PASSWORD_DEFAULT) : null;

            if ($this->userModel->updateUser($userId, $username, $email, $hashedPassword)) {
                $_SESSION['user']['username'] = $username;
                $_SESSION['user']['email'] = $email;
                echo "Informations mises à jour avec succès.";
                header("Location: index.php?action=profile");
                exit();
            } else {
                echo "Une erreur est survenue lors de la mise à jour.";
            }
        } else {
            echo "Les champs nom d'utilisateur et email sont obligatoires.";
        }
    }

    public function profile() {
        session_start();

        if (!isset($_SESSION['user'])) {
            echo "Vous devez être connecté pour voir votre profil.";
            header("Location: index.php?action=login");
            exit();
        }

        $view = new View();
        $view->render('user/profile', [
            'user' => $_SESSION['user']
        ]);
    }
}

