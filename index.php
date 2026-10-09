<?php 
    require 'header.php'; 
    require 'bdd.php';

    $bdd = connexion();
    $requete = $bdd->query(
        'SELECT oeuvres.*, artistes.nom AS artiste 
        FROM oeuvres 
        INNER JOIN artistes ON oeuvres.artiste_id = artistes.id'
    );
    $oeuvres = $requete->fetchAll();
?>

    <div id="liste-oeuvres">
        
        <?php foreach($oeuvres as $oeuvre): ?>
            <article class="oeuvre">
                <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                    <img src="<?= $oeuvre['image'] ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
                    <h2><?= htmlspecialchars($oeuvre['titre']) ?></h2>
                    <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
                </a>
            </article>
        <?php endforeach; ?>

    </div>

<?php require 'footer.php'; ?>