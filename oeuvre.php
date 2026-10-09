<?php 
    require 'bdd.php';

    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

    if ($id <= 0) {
        header('Location: index.php');
        exit;
    }

    $bdd = connexion();
    $requete = $bdd->prepare(
        'SELECT oeuvres.*, artistes.nom AS artiste 
        FROM oeuvres 
        INNER JOIN artistes ON oeuvres.artiste_id = artistes.id 
        WHERE oeuvres.id = :id'
    );
    $requete->execute(['id' => $id]);
    $oeuvreTrouvee = $requete->fetch();

    if ($oeuvreTrouvee === false) {
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