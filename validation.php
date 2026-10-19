<?php require "config.php";?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Validation des événements · Agenda</title>
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
            <h1>Événements à valider</h1>
            <p class="muted">3 événements en attente de validation.</p>
        </div>
    </div>

    <div class="card table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Événement</th>
                    <th>Date</th>
                    <th>Catégorie</th>
                    <th>Places</th>
                    <th>Statut</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="evenement.php?id=8">Atelier cuisine du monde</a></td>
                    <td>16/12/2026 18h00</td>
                    <td><span class="badge cat-atelier">Atelier</span></td>
                    <td>12</td>
                    <td><span class="badge badge-pending">Non validé</span></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="8">
                            <button type="submit" class="btn btn-small btn-success">Valider</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><a href="evenement.php?id=9">Tournoi de basket 3x3</a></td>
                    <td>19/12/2026 14h00</td>
                    <td><span class="badge cat-sport">Sport</span></td>
                    <td>48</td>
                    <td><span class="badge badge-pending">Non validé</span></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="9">
                            <button type="submit" class="btn btn-small btn-success">Valider</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><a href="evenement.php?id=10">Concert de Noël</a></td>
                    <td>22/12/2026 20h00</td>
                    <td><span class="badge cat-concert">Concert</span></td>
                    <td>150</td>
                    <td><span class="badge badge-pending">Non validé</span></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="10">
                            <button type="submit" class="btn btn-small btn-success">Valider</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Si aucun événement à valider :
    <p class="empty">Aucun événement en attente 🎉</p>
    -->

    <!-- ===== Début du pied de page (à mettre dans un fichier footer.php) ===== -->
    </main>

    <?php require "footer.php";?>
</body>
</html>
