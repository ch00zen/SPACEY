<?php
require_once __DIR__ . '/includes/header.php';

$invoices = $pdo->query('SELECT f.id, f.date_fact, f.montant, f.id_commande, c.id_client, cl.nom, cl.prenom FROM Facture f JOIN Commande c ON c.id = f.id_commande JOIN Client cl ON cl.id = c.id_client ORDER BY f.id DESC')->fetchAll();
?>
<section class="hero-panel">
    <div>
        <p class="eyebrow">Factures</p>
        <h1>Des factures propres, rapides et automatisées.</h1>
        <p>Chaque commande déclenche une facture claire et traçable.</p>
    </div>
</section>

<section class="card">
    <h3>Historique des factures</h3>
    <div class="list">
        <?php foreach ($invoices as $invoice): ?>
            <div class="list-item">
                <div>
                    <strong>Facture #<?= (int)$invoice['id'] ?></strong>
                    <span><?= e($invoice['prenom'] . ' ' . $invoice['nom']) ?> • <?= number_format((float)$invoice['montant'], 2, ',', ' ') ?> XOF</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>