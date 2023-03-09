<?php
    // host, username, password, database name
    $connection = new mysqli("sql113.epizy.com", "epiz_33717675", "L3gOutjQPQq738", "epiz_33717675_blog");

    if ($connection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $connection -> connect_error;
        exit();
    }

    $category = $_GET["c"];
    $articles = $connection->query("SELECT title FROM articles WHERE category='{$category}'")->fetch_all();
    $articlesText = "<br>";
    
    for($i = 0; $i < sizeof($articles); $i++){
        $articlesText = $articlesText . "<a href='/article.php?a={$articles[$i][0]}' style='color: #F6A192; text-decoration: none;'>" . $articles[$i][0] . "</a><br>";
    }

    $connection->close();

    echo file_get_contents("index.php");
?>

<script>
    const mainTitle = document.getElementById("main-title");
    const content = document.getElementById("content");

    mainTitle.innerHTML = "<?php echo $category; ?>";
    content.innerHTML = "<?php echo $articlesText; ?>";
</script>