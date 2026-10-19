<?php
require "config.php";

$stmt = $pdo->prepare('SELECT * FROM `event` WHERE id = ?');
$stmt->execute([$_GET['id'] ?? 0]);
$event = $stmt->fetch();

if (!$event) {
    exit('Événement introuvable');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soirée jazz au Kiosque · Agenda</title>
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

    <a class="back-link" href="index.php">← Retour aux événements</a>

    <article class="cat-<?=$event['category']?>">
        <header class="detail-hero" style="background-image: url('<?=$event['image']?>')">
            <div class="detail-hero-content">
                <span class="badge"><?=$event['category']?></span>
                <h1><?=$event['title']?></h1>
                <p><?= date('d/m/Y · H\hi', strtotime($event['date'])) ?></p>
            </div>
        </header>

        <div class="detail-grid">
            <section class="card">
                <h2>Informations</h2>
                <p><?=$event['information']?></p>
            </section>

            <aside class="card booking">
                <p class="places"><strong>12</strong> places restantes sur <?=$event['places']?></p>
                <!-- La largeur de la barre = pourcentage de places prises -->
                <div class="progress"><span style="width: 85%"></span></div>

                <form method="post">
                    <button type="submit" class="btn btn-block">S'inscrire</button>
                </form>

                <!-- Variante quand l'utilisateur est déjà inscrit :
                <p class="muted">Vous êtes inscrit à cet événement.</p>
                <form method="post">
                    <button type="submit" class="btn btn-secondary btn-block">Se désinscrire</button>
                </form>
                -->

                <!-- Variante quand l'événement est complet :
                <p class="places"><span class="badge badge-full">Complet</span></p>
                <button class="btn btn-block" disabled>Complet</button>
                -->

                <?php if(!isset($_SESSION['email'])){?>
                <a class="btn btn-block" href="connexion.php">Connectez-vous pour vous inscrire</a>
                <?php } ?>
            </aside>
        </div>
    </article>

    <!-- ===== Début du pied de page (à mettre dans un fichier footer.php) ===== -->
    </main>

    <?php require "footer.php";?>
</body>
</html>
