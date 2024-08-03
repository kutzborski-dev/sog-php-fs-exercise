<?php

namespace App\Models;

class Forest {
    public function __construct(private string $name, private ?string $state = '', private ?array $fires = []) {
    }

    public function setFires(array $fires = []): void {
        $this->fires = $fires;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getState(): ?string {
        return $this->state;
    }

    public function getFires(): ?array {
        return $this->fires;
    }

    public function getFireById(int $id): ?ForestFire {
        $fire = null;

        foreach($this->fires as $forestFire) {
            if($forestFire->id === $id) {
                $fire = $forestFire;
            }
        }

        return $fire;
    }

    public function getFireByName(string $name): ?ForestFire {
        $fire = null;

        foreach($this->fires as $forestFire) {
            if($forestFire->name === $name) {
                $fire = $forestFire;
            }
        }

        return $fire;
    }
}