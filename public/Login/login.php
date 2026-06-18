<?php
    include '../../src/Model/db.php';
    include '../../src/Model/User.php';
    include '../../src/Model/Role.php';
    include '../../src/DAO/UserDAO.php';
    include '../Login/process_login.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Connexion</title>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

    <section class="login-section">
        <h1 class="login-title">Connexion</h1>
        <p class="login-sub">Entrez votre code PIN afin de pouvoir pointer.</p>

        <form class="login-form" method="POST">
            <label class="login-label" for="code">Code PIN</label>
            <input class="login-input" type="password" name="code" id="code" maxlength="4" inputmode="numeric" autocomplete="off" placeholder="••••" required>

            <?php if ($erreur): ?>
                <p class="login-error"><?= $erreur ?></p>
            <?php endif; ?>

            <button class="login-btn" type="submit">Valider</button>
        </form>
    </section>

</body>
</html>