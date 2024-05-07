<?php

namespace App\Models;

use League\OAuth2\Client\OptionProvider\HttpBasicAuthOptionProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Token\AccessTokenInterface;
use MrPropre\OAuth2\Client\Provider\EpicGames;

class AuthModel
{

    private static ?EpicGames $provider = null;

    public static function getProvider(): EpicGames
    {
        if (self::$provider === null) {
            self::$provider = new EpicGames([
                "clientId" => $_ENV["epicgames.client_id"],
                "clientSecret" => $_ENV["epicgames.client_secret"],
                "redirectUri" => url_to("callback"),
            ], [
                "optionProvider" => new HttpBasicAuthOptionProvider()
            ]);
        }
        return self::$provider;
    }

    public static function getUrl(): string
    {
        $provider = self::getProvider();

        $options = [
            "state" => $provider->getState(),
            "scope" => ["openid", "profile", "email", "offline_access"],
        ];

        return $provider->getAuthorizationUrl($options);
    }

    /**
     * @throws IdentityProviderException
     */
    public static function getToken(string $code): AccessToken|AccessTokenInterface
    {
        $provider = self::getProvider();

        return $provider->getAccessToken("authorization_code", [
            "code" => $code
        ]);
    }

    /**
     * return ResourceOwnerInterface
     */
    public static function getUser(AccessToken|AccessTokenInterface $token): ResourceOwnerInterface
    {
        $provider = self::getProvider();

        return $provider->getResourceOwner($token);
    }

    public static function getState(): string
    {
        return self::$provider->getState();
    }

}