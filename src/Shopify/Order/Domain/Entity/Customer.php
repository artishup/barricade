<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Entity;

use ArtishUp\Shared\Domain\Entity\Entity;

final class Customer extends Entity
{
    private string $firstName;
    private string $lastName;
    private string $email;

    private function __construct(string $firstName, string $lastName, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public static function crete(string $firstName, string $lastName, string $email): self
    {
        return new self($firstName, $lastName, $email);
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [
            'firsName' => $this->firstName(),
            'lastName' => $this->lastName(),
            'email'    => $this->email()
        ];
    }
}
