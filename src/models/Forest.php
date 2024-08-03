<?php

namespace App\Models;

class Forest {
    public function __construct(private string $name) {
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }
}