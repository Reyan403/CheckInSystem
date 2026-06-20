<?php include '../includes/process_checkin.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Pointage — PointagePro</title>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<main class="main-content">
    <div class="checkin-page">

        <!-- En-tête -->
        <div class="checkin-header">
            <div>
                <h1 class="checkin-title">
                    Bonjour<?php if(isset($user)): ?>, 
                            <span><?= htmlspecialchars($user->getFirstname()) ?></span>
                        <?php endif; ?> 
                </h1>
                <p class="checkin-sub">Enregistrez votre arrivée ou votre départ</p>
            </div>
        </div>

        <!-- Carte principale -->
        <div class="checkin-card">

            <div class="checkin-status">
                <span class="status-label" id="status-label">En attente de pointage</span>
            </div>

            <div class="checkin-buttons">

                <!-- Formulaire unique pour Arrivée ET Départ -->
                <form method="POST" action="" class="checkin-form">
                    
                    <!-- Bouton Arrivée -->
                    <button type="submit" name="type" value="arrivee" class="btn-checkin btn-arrivee">
                        <div class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25"/>
                            </svg>
                        </div>
                        <div class="btn-label">
                            <span class="btn-title">Arrivée</span>
                            <span class="btn-desc">Pointer mon arrivée</span>
                        </div>
                    </button>

                    <!-- Ligne de séparation -->
                    <div class="checkin-divider"></div>

                    <!-- Bouton Départ -->
                    <button type="submit" name="type" value="depart" class="btn-checkin btn-depart">
                        <div class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"/>
                            </svg>
                        </div>
                        <div class="btn-label">
                            <span class="btn-title">Départ</span>
                            <span class="btn-desc">Pointer mon départ</span>
                        </div>
                    </button>
                </form>

            </div>
        </div>

        <?php if(!empty($success)): ?>
            <div class="success-message">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>
    </div>
</main>

</body>
</html>