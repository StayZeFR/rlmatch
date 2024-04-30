<?php

use League\OAuth2\Client\OptionProvider\HttpBasicAuthOptionProvider;
use MrPropre\OAuth2\Client\Provider\EpicGames;

function getUrl(): string
{
    $provider = new EpicGames([
        "clientId" => $_ENV["epicgames.client_id"],
        "clientSecret" => $_ENV["epicgames.client_secret"],
        "redirectUri" => url_to("callback"),
    ], [
        "optionProvider" => new HttpBasicAuthOptionProvider()
    ]);

    return $provider->getAuthorizationUrl();
}