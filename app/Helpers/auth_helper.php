<?php

use League\OAuth2\Client\OptionProvider\HttpBasicAuthOptionProvider;
use MrPropre\OAuth2\Client\Provider\EpicGames;

function getUrl(): string
{
    $provider = new EpicGames([
        "clientId"          => "xyza78917i5nSZrRkoiZ8GPNyV9HHUqe",
        "clientSecret"      => "WqBYErrNvzyLKSRor8khIMPCMamVV9AU5kXDUpviQv8",
        "redirectUri"       => url_to("callback"),
    ], [
        "optionProvider" => new HttpBasicAuthOptionProvider()
    ]);

    return $provider->getAuthorizationUrl();
}