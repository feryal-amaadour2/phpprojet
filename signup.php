<?php 
@include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if (empty($nom) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "Tous les champs doivent être remplis.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Les mots de passe ne correspondent pas.";
    } else {
        require_once "database.php";
        $sqlState = $pdo->prepare("INSERT  INTO users  ");
        $sqlState->execute([$loginValue, $passwordValue]);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Fond léger similaire à home.php */
            color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Navbar */
        .navbar {
            background-color: #006400; /* Fond vert plein comme home.php */
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 30px;
            padding-right: 30px;
        }

        .navbar .navbar-brand {
            font-size: 1.9em;
            font-weight: 700;
        }

        .navbar-nav a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        .navbar-nav a:hover {
            text-decoration: underline;
        }

        /* Formulaire d'inscription */
        .container {
            background-color: white;
            padding: 40px;
            max-width: 800px;
            border-radius: 15px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #006400;
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 10px;
            display: block;
        }

        input {
            width: 50%;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 1em;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #006400;
            outline: none;
        }

        button {
            width: 50%;
            padding: 15px;
            background-color: #006400;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #62b774;
        }

        /* Messages de succès / erreur */
        .message {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .error {
            color: #d9534f;
        }

        .success {
            color: #28a745;
        }

        /* Footer */
        .footer {
            background-color: #006400;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .footer a {
            color: white;
            font-weight: bold;
            text-decoration: none;
            margin-left: 15px;
        }

        .footer a:hover {
            color: #62b774;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="home.php">EMSI</a>
    <div class="navbar-nav ms-auto">
        <a href="home.php" class="nav-link">Accueil</a>
        <a href="about.php" class="nav-link">À Propos</a>
        <a href="services.php" class="nav-link">Nos Programmes</a>
        <a href="signup.php" class="nav-link">S'inscrire</a>
        <a href="login.php" class="nav-link">Se Connecter</a>
        <a href="contact.php" class="nav-link">Contact</a>
    </div>
</nav>

<!-- Formulaire d'inscription -->
<div class="container">
    <h2>Inscription</h2>

    <?php if (isset($error_message)): ?>
        <p class="message error"><?php echo $error_message; ?></p>
    <?php elseif (isset($success_message)): ?>
        <p class="message success"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="nom">Nom Complet</label>
        <input type="text" name="nom" id="nom" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <label for="confirm-password">Confirmer le mot de passe</label>
        <input type="password" name="confirm-password" id="confirm-password" required>

        <button type="submit">S'inscrire</button>
    </form>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 EMSI - École Marocaine des Sciences de l'Ingénieur</p>
    <p>
        <a href="privacy.php">Politique de Confidentialité</a> |
        <a href="terms.php">Conditions d'Utilisation</a> |
        <a href="contact.php">Contactez-nous</a>
    </p>
</div>

</body>
</html>
