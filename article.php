<?php
    // host, username, password, database name
    $connection = new mysqli("sql113.epizy.com", "epiz_33717675", "L3gOutjQPQq738", "epiz_33717675_blog");

    if ($connection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connection -> connect_error;
        exit();
    }

    $title = $_GET["a"];
    $articles = $connection->query("SELECT content FROM articles WHERE title='{$title}'")->fetch_all();
    $articleText = "<br><br>" . $articles[0][0];

    $connection->close();

    echo file_get_contents("index.php");
?>

<script>
    const mainTitle = document.getElementById("main-title");
    const content = document.getElementById("content");

    mainTitle.innerHTML = "<?php echo $title; ?>";
    content.innerHTML = "<?php echo $articleText; ?>";
</script>