<?php require "config.php";?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer un compte · Agenda</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>📅</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- ===== Début de l'en-tête (à mettre dans un fichier header.php) ===== -->
    <?php require "header.php";?>

    <main class="container">
        <!-- Exemples de messages :
        <div class="flash flash-success">Votre événement a bien été ajouté.</div>
        <div class="flash flash-error">Une erreur est survenue.</div>
        -->
        <!-- ===== Fin de l'en-tête ===== -->

    <div class="narrow">
        <div class="card">
            <h1>Créer un compte</h1>

            <!-- Exemple de message d'erreur :
            <div class="flash flash-error">Cet email est déjà utilisé.</div>
            -->
            <?php
                if (isset($_POST['register'])){
                    if ($_POST['email'] != '' && $_POST['password'] != ''){
                        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);    
                        $sth = $pdo->prepare('INSERT INTO `user` (`email`, `password`) VALUES (:email, :password)');
                        $sth->execute([
                            'email' => $_POST['email'],
                            'password' => $hash
                        ]);
                        echo "<b>Votre inscription est valide</b>"; 
                        $_SESSION['email'] = $_POST['email'];
                    }
                }
            ?>

            <form class="form" method="post">
                <div>
                    <label for="email" class="required">Email</label>
                    <input type="email" id="email" name="email" autocomplete="email" required>
                </div>

                <div>
                    <label for="password" class="required">Mot de passe</label>
                    <input type="password" id="password" name="password" autocomplete="new-password" required>
                    <div class="help-text">6 caractères minimum.</div>
                </div>

                <button type="submit" name='register'>Créer mon compte</button>
            </form>

            <p class="form-footer">Déjà inscrit ? <a href="connexion.php">Se connecter</a></p>
        </div>
    </div>

    <!-- ===== Début du pied de page (à mettre dans un fichier footer.php) ===== -->
    </main>

    <?php require "footer.php";?>
</body>
</html>
