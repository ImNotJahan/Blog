<?php
    // host, username, password, database name
    $connection = new mysqli("sql113.epizy.com", "epiz_33717675", "L3gOutjQPQq738", "epiz_33717675_blog");

    if ($connection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connection -> connect_error;
        exit();
    }

    $title = $_POST["title"];
    $category = $_POST["category"];
    $content = $_POST["content"];

    $connection->query("INSERT INTO `articles` (`category`, `content`, `title`) VALUES ('{$category}', '{$content}', '{$title}')");

    $connection->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
    </head>

    <body>
        <form method="POST">
            <label>title</label><br>
            <input name="title">

            <br><br>
            <label>category</label><br>
            <input name="category">

            <br><br>
            <label>content</label><br>
            <textarea name="content" rows="12" cols="50"></textarea>

            <br><br>
            <input type="submit">
        </form>
    </body>
</html>