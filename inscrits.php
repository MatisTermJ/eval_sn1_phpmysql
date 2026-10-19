<?php require "config.php";?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscrits aux événements · Agenda</title>
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

    <div class="section-head">
        <div>
            <h1>Inscrits aux événements</h1>
            <p class="muted">Liste des participants pour chaque événement validé.</p>
        </div>
    </div>

    <!-- Page réservée aux administrateurs -->
    <!-- Un bloc par événement validé -->
    <section class="card attendees">
        <div class="attendees-head">
            <div>
                <h2><a href="evenement.php?id=1">Soirée jazz au Kiosque</a></h2>
                <span class="badge cat-concert">Concert</span>
                <span class="muted">07/11/2026 · 20h30</span>
            </div>
            <p class="places"><strong>3</strong> inscrits sur 80 places</p>
        </div>  

        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Inscrit le</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>user@agenda.fr</td>
                        <td>18/10/2026 10h12</td>
                    </tr>
                    <tr>
                        <td>lea.martin@test.fr</td>
                        <td>19/10/2026 08h45</td>
                    </tr>
                    <tr>
                        <td>tom.durand@test.fr</td>
                        <td>20/10/2026 17h30</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="card attendees">
        <div class="attendees-head">
            <div>
                <h2><a href="evenement.php?id=2">L'IA expliquée simplement</a></h2>
                <span class="badge cat-conference">Conférence</span>
                <span class="muted">12/11/2026 · 18h00</span>
            </div>
            <p class="places"><strong>0</strong> inscrit sur 60 places</p>
        </div>

        <!-- Si aucun inscrit pour cet événement -->
        <p class="empty">Aucun inscrit pour le moment.</p>
    </section>

    <section class="card attendees">
        <div class="attendees-head">
            <div>
                <h2><a href="evenement.php?id=7">Atelier tricot pour débutants</a></h2>
                <span class="badge cat-atelier">Atelier</span>
                <span class="muted">17/12/2026 · 18h30</span>
            </div>
            <!-- Quand l'événement est complet -->
            <p class="places"><span class="badge badge-full">Complet</span> <strong>2</strong> inscrits sur 2 places</p>
        </div>

        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Inscrit le</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>user@agenda.fr</td>
                        <td>18/10/2026 10h20</td>
                    </tr>
                    <tr>
                        <td>lea.martin@test.fr</td>
                        <td>21/10/2026 14h05</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Si aucun événement validé :
    <p class="empty">Aucun événement validé pour le moment.</p>
    -->

    <!-- ===== Début du pied de page (à mettre dans un fichier footer.php) ===== -->
    </main>

    <?php require "footer.php";?>
</body>
</html>
