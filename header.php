<header class="site-header">
    <div class="container">
        <a class="logo" href="index.php">Agenda<span>.</span></a>
        <nav class="nav">
            <a href="index.php">Événements</a>

            <?php if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@agenda.fr'){?>
            <a href="validation.php">
                <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
                Validation
            </a>
            <?php } ?>

            <?php if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@agenda.fr'){?>
            <a href="inscrits.php">
                <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="4"/><path d="M2 21v-1a6 6 0 0 1 6-6h2a6 6 0 0 1 6 6v1"/><path d="M16 4a4 4 0 0 1 0 8"/><path d="M19 14a5 5 0 0 1 3 5v2"/></svg>
                Inscrits
            </a>
            <?php } ?>

            <?php if(!isset($_SESSION['email'])){?>
                <a href="connexion.php">Connexion</a>
                <a class="btn btn-small" href="inscription.php">Créer un compte</a>
            <?php } ?>
            

            <?php if(isset($_SESSION['email'])){?>
                <a class="btn btn-small" href="deconnexion.php">Se déconnecter</a>
            <?php } ?>
        </nav>
    </div>
</header>