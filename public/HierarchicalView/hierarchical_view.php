<?php include '../includes/process_hierarchical_view.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue Hiérarchique – PointagePro</title>
    <link rel="stylesheet" href="/php/CheckInSystem/public/style.css">
</head>
<body>

    <?php include '../includes/sidebar.php'; ?>

    <main class="main-content">

        <div class="page-header">
            <h1>Vue hiérarchique</h1>
            <p>Historique des pointages</p>
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date &amp; Heure</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($checkIn as $unCheckIn): ?>
                    <tr>
                        <?php if(isset($unCheckIn)): ?>
                        <td>
                            <div class="user-cell">
                                <span><?= htmlspecialchars($unCheckIn->getUser()->getLastname()) ?></span>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($unCheckIn->getUser()->getFirstname()) ?></td>
                        <td>
                            <div class="date-time">
                                <span class="date"><?= htmlspecialchars($unCheckIn->getDate()->format('d/m/Y H:i:s')) ?></span>
                            </div>
                        </td>
                        <td>
                            <?php if ($unCheckIn->getAction()->getName() === 'Arrivée'): ?>
                                <span class="badge badge-arrive">
                                    <span class="badge-dot"></span>
                                    <?= htmlspecialchars($unCheckIn->getAction()->getName()) ?>
                                </span>
                            <?php else: ?>
                                <span class="badge badge-depart">
                                    <span class="badge-dot"></span>
                                    <?= htmlspecialchars($unCheckIn->getAction()->getName()) ?>
                                </span>
                            <?php endif; ?>
                        </td>
                        <?php endif; ?> 
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="page-link">Précédent</a>
            <?php else: ?>
                <span class="page-link disabled">Précédent</span>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="page-link <?= $i === $page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?= $page + 1 ?>" class="page-link">Suivant</a>
            <?php else: ?>
                <span class="page-link disabled">Suivant</span>
            <?php endif; ?>
        </div>
        <?php endif; ?>

    </main>

</body>
</html>