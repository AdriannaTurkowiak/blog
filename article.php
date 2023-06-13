<?php

require 'database.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {        //zabezpieczenie przed wstrzykiwaniem SQL


$sql = "SELECT *
        FROM article
        WHERE id = " . $_GET['id'];

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $article = mysqli_fetch_assoc($results);
}
}
else {
    $article = null;
}


?>
<?php require 'header.php';?>

        <?php if ($article === null): //Aby sprawdzic, czy warunek dziala, wystarczy w $sql dac warunek WHERE id = 0?>
            <p>Article not found.</p>
        <?php else: ?>
            <article>
                <h2><?= $article['title']; ?></h2>
                <p><?= $article['content']; ?></p>
            </article>
                    </li>

        <?php endif; ?>

        <?php require 'footer.php';?>

