<?php

namespace App\Models;

class ForestFire {
    private string $discoveryDate;

    public function __construct(private string $fpaId, private string $name, private string $forestName, private ?string $fireCode, string $discoveryDate, private string $cause) {
        $this->discoveryDate = julianToGregorianDate($discoveryDate);
    }

    public function getFpaId(): string {
        return $this->fpaId;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getForestName(): string {
        return $this->forestName;
    }

    public function getCode(): ?string {
        return $this->fireCode;
    }

    public function getDiscoveryDate(): string {
        return $this->discoveryDate;
    }

    public function getCause(): string {
        return $this->cause;
    }
}