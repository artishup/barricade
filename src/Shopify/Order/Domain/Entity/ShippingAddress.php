<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Entity;

use ArtishUp\Shared\Domain\Entity\Entity;

class ShippingAddress extends Entity
{
    private string $street1;
    private string $street2;
    private string $city;
    private string $state;
    private string $country;
    private string $zip;

    private function __construct(
        string $street1,
        string $street2,
        string $city,
        string $state,
        string $country,
        string $zip
    ) {
        $this->street1 = $street1;
        $this->street2 = $street2;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->zip = $zip;
    }

    public static function create(
        string $street1,
        string $street2,
        string $city,
        string $state,
        string $country,
        string $zip
    ): self {
        return new self($street1, $street2, $city, $state, $country, $zip);
    }

    public function street1(): string
    {
        return $this->street1;
    }

    public function street2(): string
    {
        return $this->street2;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function state(): string
    {
        return $this->state;
    }

    public function country(): string
    {
        return $this->country;
    }

    public function zip(): string
    {
        return $this->zip;
    }

    public function toArray(): array
    {
        return [
            'street1' => $this->street1(),
            'street2' => $this->street2(),
            'city'    => $this->city(),
            'state'   => $this->state(),
            'country' => $this->country(),
            'zip'     => $this->zip(),
        ];
    }
}
