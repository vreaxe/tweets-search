<?php
require "vendor/autoload.php";
use App\TwitterAPI;

$searchTerm = isset($_GET['search']) ? $_GET['search'] : null;
$twitter = new TwitterAPI();
$searchResults = $twitter->search($searchTerm);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Search Tweets</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <div class="container">
            <h3>SEARCH TWEETS</h3>
            <form class="search-form" action="." method="GET">
                <input type="text" name="search" value="<?php echo $searchTerm; ?>" placeholder="Search something...">
                <button type="submit"></button>
            </form>

            <div class="list-tweets">
                <?php
                if (isset($searchResults->statuses)) {
                    if (count($searchResults->statuses) > 0) {
                        foreach ($searchResults->statuses as $result) {
                          echo "<p><span class='name_user'>" . $result->user->screen_name . "</span>: " . $result->text . "</p>";
                        }
                    } else {
                        echo "<p class='errors'>No results!</p>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
