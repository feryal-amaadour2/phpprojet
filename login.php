
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Styles globaux similaires à ceux de la page d'inscription et d'accueil */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f8ff; /* Fond bleu clair comme la page d'accueil */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            border-radius: 15px;
            padding: 40px;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: green; /* Couleur verte comme sur la page d'accueil */
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1em;
        }

        input:focus {
            border-color: green; /* Bordure verte au focus */
            outline: none;
        }

        button {
            width: 100%;
            background-color: green; /* Bouton vert */
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #62b774; /* Vert foncé au survol */
        }

        .message {
            margin-bottom: 20px;
            color: #d9534f; /* Rouge pour les erreurs */
        }

        p {
            font-size: 1.1em;
        }

        a {
            color: green; /* Lien vert */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 25px;
            }

            h2 {
                font-size: 2em;
            }

            input {
                font-size: 1em;
            }

            button {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
<?php
    if (isset($_POST["Add"])) {
        $loginValue = $_POST["email"];
        $passwordValue = $_POST["password"];
        $confirmpasswordValue = $_POST["confirmpassword"];
        $emailPattern = "/^[a-zA-Z0-9._%+-]+@emsi\.ma$/";
        
        if (empty($loginValue) || empty($passwordValue) || empty($confirmpasswordValue)) {
            echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Veuillez remplir les informations.</div></div>';
        } elseif ($passwordValue !== $confirmpasswordValue) {
            echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Le mot de passe est incorrect.</div></div>';
        } elseif (!preg_match($emailPattern, $loginValue)) {
            echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Email est incorrect.</div></div>';
        } else {
            require_once "database.php";
            $sqlState = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $sqlState->execute([$loginValue, $passwordValue]);
    
            if ($sqlState->rowCount() >= 1) {
                $_SESSION["users"] = $sqlState->fetch();
                header("Location: admin.php");
                exit();
            } else {
                echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Email ou mot de passe est invalide.</div></div>';
            }
        }
    }
    ?>
    <div class="container">
        <h2>Connexion</h2>
        
        <?php if (isset($error_message)): ?>
            <p class="message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>