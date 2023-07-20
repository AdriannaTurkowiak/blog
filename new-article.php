<?php

require 'includes/database.php';
require 'includes/article.php';
require 'includes/url.php';


$title = '';
$content = '';
$level = '';
$published_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $level = $_POST['level'];
    $published_at = $_POST['published_at'];

    $errors = validateArticle($title, $content, $level, $published_at);

    if (empty($errors)) {

        $conn = getDB();

        $sql = "INSERT INTO article (title, content, level, published_at) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {

            echo mysqli_error($conn);

        } else {

            if ($published_at == '') {
                $published_at = null;
            }

            mysqli_stmt_bind_param($stmt, "ssss", $title, $content, $level, $published_at);

            if (mysqli_stmt_execute($stmt)) {

                $id = mysqli_insert_id($conn);

                redirect("/article.php?id=$id");

            } else {

                echo mysqli_stmt_error($stmt);

            }
        }

    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>New article</h2>

<?php require 'includes/article-form.php'; ?>

<?php require 'includes/footer.php'; ?>
