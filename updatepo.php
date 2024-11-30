<?php
// create.php

include 'Connection.php';
include 'Client.php';

class CreateClientPage {
    private $connection;
    private $client;

    public function __construct() {
        $this->connection = (new Connection())->getConnection();
        $this->client = new Client($this->connection);
    }

    public function handleFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];

            if ($this->client->addClient($firstname, $lastname, $email)) {
                header('Location: index.php');
                exit();
            }
        }
    }

    public function render() {
        $this->handleFormSubmission();
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign Up</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        </head>
        <body>
        
        <div class="container my-5">
            <h2>Sign Up</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        </body>
        </html>';
    }
}

// Créer une instance de la page de création
$createPage = new CreateClientPage();
$createPage->render();
?>
