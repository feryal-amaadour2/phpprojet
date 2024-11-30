<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>École Marocaine des Sciences de l'Ingénieur</title>
    <style>
        /* Style global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #f4f4f4; /* Fond de la page */
        }

        header {
            background-color: #006400; /* Fond vert plein (non transparent) */
            color: white;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 30px;
            padding-right: 30px;
        }

        /* Ajout des icônes de réseaux sociaux */
        .social-icons {
            display: flex;
            align-items: center;
            gap: 15px; /* Espacement entre les icônes */
        }

        .social-icons a {
            display: block;
            width: 25px;
            height: 25px;
            transition: transform 0.3s ease;
        }

        .social-icons a img {
            width: 100%;
            height: 100%;
            filter: grayscale(100%); /* Appliquer un filtre en niveaux de gris */
        }

        .social-icons a:hover img {
            transform: scale(1.2); /* Agrandir l'icône au survol */
        }

        nav ul {
            list-style: none;
            display: flex;
            align-items: center; /* Aligner les éléments au centre */
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            padding: 40px 30px;
            text-align: center;
            flex: 1;
        }

        .hero {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0px;
            background-color: transparent;
            border-radius: 10px;
        }

        

        .hero p {
            font-size: 10px;
            color: #333;
        }

        /* Image dans main (taille moyenne) */
        .hero img {
            width: 100%;  /* Taille moyenne de l'image */
            height: auto;
            margin-bottom: 50px;
        }

        .about {
            margin-top: 50px;
        }

        .about h2 {
            font-size: 28px;
            color: #333;
        }

        footer {
            background-color: #006400; /* Fond vert plein (non transparent) */
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
        }

        footer p {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header>
        <div class="social-icons">
            <!-- Icônes des réseaux sociaux -->
            <a href="https://www.facebook.com" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
            </a>
            <a href="https://www.youtube.com" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" alt="YouTube">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Programmes</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="login.php">login</a></li>
                <li><a href="signup.php">signup</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <!-- Image insérée dans la section hero -->
            <img src="c:\Users\info\Downloads\téléchargementemsi.png" alt="Image de l'EMSI">
             
        </section>

        <section class="about">
            <h2>À propos de l'EMSI</h2>
            <p>L'École Marocaine des Sciences de l'Ingénieur (EMSI) est un établissement d'enseignement supérieur qui offre une formation de qualité dans le domaine de l'ingénierie.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 EMSI. Tous droits réservés.</p>
    </footer>
</body>
</html>
 