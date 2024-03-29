<?php

require 'includes/database.php';
session_start();

$conn = getDB();

$sql = "SELECT *
        FROM article
        ORDER BY published_at;";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>

<?php require 'includes/header.php'; ?>

<?php if(isset($_SESSION['is_logged']) && ($_SESSION['is_logged'])): ?>
    <p> Jesteś zalogowany <a href="logout.php">Wyloguj</a></p>
    <a href="new-article.php">New article</a>


<?php else: ?>
    <p> Nie jesteś zalogowany <a href="login.php">Zaloguj</a></p>
    <?php endif; ?>



        <?php if (empty($articles)): //Aby sprawdzic, czy warunek dziala, wystarczy w $sql dac warunek WHERE id = 0?>
            <p>No articles found.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($articles as $article): //Wypisz wszystkie posty?>
                    <li>
                    <article>
                            <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>
                            <p><?= htmlspecialchars($article['content']); ?></p>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>
        <?php require 'includes/footer.php';?>

