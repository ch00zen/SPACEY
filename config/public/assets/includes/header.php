<?php
require_once __DIR__ . '/../../config/database.php';

$pdo = getDbConnection();
ensureSchema($pdo);

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function currentPage(string $page): string
{
    return basename($_SERVER['PHP_SELF']) === $page ? 'active' : '';
}

$message = $_GET['message'] ?? '';
$navItems = [
    ['label' => 'Accueil', 'link' => 'index.php'],
    ['label' => 'Clients', 'link' => 'clients.php'],
    ['label' => 'Produits', 'link' => 'produits.php'],
    ['label' => 'Commandes', 'link' => 'commandes.php'],
    ['label' => 'Factures', 'link' => 'factures.php'],
    ['label' => 'Paiements', 'link' => 'paiements.php'],
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple-style Commerce</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <header class="topbar">
        <a class="brand" href="index.php">Auralis Commerce</a>
        <nav class="nav-links">
            <?php foreach ($navItems as $item): ?>
                <a class="nav-link <?= currentPage(basename($item['link'])) ?>" href="<?= e($item['link']) ?>"><?= e($item['label']) ?></a>
            <?php endforeach; ?>
        </nav>
    </header>
    <main class="page-shell">
        <?php if ($message !== ''): ?>
            <div class="alert"><?= e($message) ?></div>
        <?php endif; ?>