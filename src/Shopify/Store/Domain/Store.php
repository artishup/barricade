<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Store\Domain;

use ArtishUp\Shared\Domain\Entity\Entity;

final class Store extends Entity
{
    private string $userName;
    private string $pass;
    private string $store;
    private string $secret;
    private string $locationId;
    private string $apiUrl;

    private function __construct(
        string $userName,
        string $pass,
        string $store,
        string $secret,
        string $locationId
    ) {
        $this->userName = $userName;
        $this->pass = $pass;
        $this->store = $store;
        $this->secret = $secret;
        $this->locationId = $locationId;

        $this->apiUrl = 'https://' . $userName . ':' . $pass . $store;
    }

    public static function create(
        string $userName,
        string $pass,
        string $store,
        string $secret,
        string $locationId
    ): self {
        return new self($userName, $pass, $store, $secret, $locationId);
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['userName'],
            $data['pass'],
            $data['store'],
            $data['secret'],
            $data['locationId']
        );
    }

    public function userName(): string
    {
        return $this->userName;
    }

    public function pass(): string
    {
        return $this->pass;
    }

    public function store(): string
    {
        return $this->store;
    }

    public function secret(): string
    {
        return $this->secret;
    }

    public function locationId(): string
    {
        return $this->locationId;
    }

    public function apiUrl(): string
    {
        return $this->apiUrl;
    }

    function toArray(): array
    {
        return [
            'username'   => $this->username(),
            'pass'       => $this->pass(),
            'store'      => $this->store(),
            'secret'     => $this->secret(),
            'locationId' => $this->locationId(),
            'apiUrl'     => $this->apiUrl()
        ];
    }
}
