<?php 
    require 'oeuvres.php';

    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

    $oeuvreTrouvee = null;
    foreach ($oeuvres as $oeuvre) {
        if ($oeuvre['id'] === $id) {
            $oeuvreTrouvee = $oeuvre;
            break;
        }
    }

    if ($oeuvreTrouvee === null) {
        header('Location: index.php');
        exit;
    }

    require 'header.php';
?>

    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?= $oeuvreTrouvee['image'] ?>" alt="<?= htmlspecialchars($oeuvreTrouvee['titre']) ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?= htmlspecialchars($oeuvreTrouvee['titre']) ?></h1>
            <p class="description"><?= htmlspecialchars($oeuvreTrouvee['artiste']) ?></p>
            <p class="description-complete">
                <?= htmlspecialchars($oeuvreTrouvee['description']) ?>
            </p>
        </div>
    </article>

<?php require 'footer.php'; ?>