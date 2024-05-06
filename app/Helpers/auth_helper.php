<?php

use League\OAuth2\Client\OptionProvider\HttpBasicAuthOptionProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Token\AccessTokenInterface;
use MrPropre\OAuth2\Client\Provider\EpicGames;

function getProvider(): EpicGames
{
    return new EpicGames([
        "clientId" => $_ENV["epicgames.client_id"],
        "clientSecret" => $_ENV["epicgames.client_secret"],
        "redirectUri" => url_to("callback"),
    ], [
        "optionProvider" => new HttpBasicAuthOptionProvider()
    ]);
}

function getUrl(): string
{
    $provider = getProvider();

    return $provider->getAuthorizationUrl();
}

/**
 * @throws IdentityProviderException
 */
function getToken(string $code): AccessToken|AccessTokenInterface
{
    $provider = getProvider();

    return $provider->getAccessToken("authorization_code", [
        "code" => $code
    ]);
}

/**
 * return ResourceOwnerInterface
 */
function getUser(AccessToken|AccessTokenInterface $token): ResourceOwnerInterface
{
    $provider = getProvider();

    return $provider->getResourceOwner($token);
}