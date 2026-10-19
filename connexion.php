<?php require "config.php";?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion · Agenda</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>📅</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- ===== Début de l'en-tête (à mettre dans un fichier header.php) ===== -->
    <?php
        if(isset($_POST['sign_in'])){
            $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email');
            $stmt->execute(['email' => $_POST['email']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user){
                if (password_verify($_POST['password'], $user['password'])){
                    $_SESSION['email'] = $_POST['email'];
                }else{
                    echo "<b>Le mot de passe et l'utilisateur ne correspondent pas.</b>";
                }
            }else{
                echo "<b>Ce compte n'existe pas</b>";
            }
        }
    ?>
    <?php require "header.php";?>

    <main class="container">
        <!-- Exemples de messages :
        <div class="flash flash-success">Votre événement a bien été ajouté.</div>
        <div class="flash flash-error">Une erreur est survenue.</div>
        -->
        <!-- ===== Fin de l'en-tête ===== -->

    <div class="narrow">
        <div class="card">
            <h1>Connexion</h1>

            <!-- Exemple de message d'erreur :
            <div class="flash flash-error">Identifiants invalides.</div>
            -->
            <form class="form" method="post">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" autocomplete="email" required autofocus>
                </div>

                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" autocomplete="current-password" required>
                </div>

                <button type="submit" name="sign_in">Se connecter</button>
            </form>

            <p class="form-footer">Pas encore de compte ? <a href="inscription.php">Créer un compte</a></p>
        </div>
    </div>

    <!-- ===== Début du pied de page (à mettre dans un fichier footer.php) ===== -->
    </main>

    <?php require "footer.php";?>
</body>
</html>
