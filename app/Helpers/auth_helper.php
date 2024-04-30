<?php

function getUrlEpicGames()
{
    $provider = new \MrPropre\OAuth2\Client\Provider\EpicGames([
        "clientId"          => "xyza7891D2NJpFKT5J3WFcQpZGZy4Ihr",
        "clientSecret"      => "cDQ0kRlQiWGycCCLojkfysgq5JyVYpFFiXScs3fC0Lg",
        "redirectUri"       => "your_redirect_uri",
    ]);
}