<?php
namespace App;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterAPI
{
    private $connection;

    private $consumerKey = "*****";
    private $consumerSecret = "*****";
    private $accessToken = "*****";
    private $accessTokenSecret = "*****";

    public function __construct()
    {
        $this->connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);
    }

    public function search($searchTerm, $count = 5)
    {
        return $this->connection->get("search/tweets", [
          "q" => $searchTerm,
          "count" => $count,
        ]);
    }
}

?>
