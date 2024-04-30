<?php

use MrPropre\OAuth2\Client\Provider\EpicGames;

function getUrlEpicGames()
{
    $provider = new EpicGames([
        "clientId"          => "xyza7891D2NJpFKT5J3WFcQpZGZy4Ihr",
        "clientSecret"      => "cDQ0kRlQiWGycCCLojkfysgq5JyVYpFFiXScs3fC0Lg",
        "redirectUri"       => "your_redirect_uri",
    ]);
}