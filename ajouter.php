<?php require "config.php";?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un événement · Agenda</title>
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
        <?php
            if(isset($_POST['enregistrer']))
                if(isset($_POST['title'])){
                    if(isset($_POST['date'])){
                        if(isset($_POST['information'])){
                            if(isset($_POST['places']) && $_POST['places'] > 0){
                                $ajt = $pdo->prepare('INSERT INTO `event` (`title`, `date`, `information`, `category`, `places`, `image`, `is_validated`, `created_at`) VALUES (:title, :date, :information, :category, :places, :image, :is_validated, :created_at)');
                                $img = NULL;
                                if(isset($_POST['image'])){
                                    $img = $_POST['image'];
                                }
                                $ajt->execute([
                                    'title' => $_POST['title'],
                                    'date' => $_POST['date'],
                                    'information' => $_POST['information'],
                                    'category' => $_POST['category'],
                                    'places' => $_POST['places'],
                                    'image' => $img,
                                    'is_validated' => 0,
                                    'created_at' => "2026-10-19 14:00:00",
                                ]);
                                echo '<div class="flash flash-success">Votre événement a bien été ajouté.</div>';

                            }else{
                                echo '<div class="flash flash-error">Le nombre de places est obligatoire et doit être supérieur à 0.</div>';
                            }
                        }else{
                            echo '<div class="flash flash-error">Les informations sont obligatoire.</div>';
                        }
                    }else{
                        echo '<div class="flash flash-error">La date est obligatoire.</div>';
                    }
                }else{
                    echo '<div class="flash flash-error">Le titre est obligatoire.</div>';
                }
        ?>
        <!-- Exemples de messages :
        
        <div class="flash flash-error">Une erreur est survenue.</div>
        -->
        <!-- ===== Fin de l'en-tête ===== -->

    <div class="narrow">
        <a class="back-link" href="index.php">← Retour aux événements</a>

        <div class="card">
            <h1>Ajouter un événement</h1>
            <p class="muted">Votre événement sera visible après validation par un administrateur.</p>

            <!-- Exemple de message d'erreur :
            
            -->

            <form class="form" method="post" enctype="multipart/form-data">
                <div>
                    <label for="title" class="required">Titre</label>
                    <input type="text" id="title" name="title" placeholder="Ex. : Soirée jazz au Kiosque" required>
                </div>

                <div>
                    <label for="date" class="required">Date</label>
                    <input type="datetime-local" id="date" name="date" required>
                </div>

                <div>
                    <label for="information" class="required">Informations</label>
                    <textarea id="information" name="information" placeholder="Lieu, programme, tarif..." required></textarea>
                </div>

                <div>
                    <label for="category">Catégorie</label>
                    <select id="category" name="category">
                        <option value="concert">Concert</option>
                        <option value="conference">Conférence</option>
                        <option value="atelier">Atelier</option>
                        <option value="sport">Sport</option>
                    </select>
                </div>

                <div>
                    <label for="places">Nombre de places</label>
                    <input type="number" id="places" name="places" min="1" value="20">
                </div>

                <div>
                    <label for="image">Image à la une</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <div class="help-text">JPG, PNG ou WebP.</div>
                </div>

                <button type="submit" name="enregistrer">Enregistrer l'événement</button>
            </form>
        </div>
    </div>

    <!-- ===== Début du pied de page (à mettre dans un fichier footer.php) ===== -->
    </main>

    <?php require "footer.php";?>
</body>
</html>
