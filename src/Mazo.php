<?php

namespace TDD;

use RuntimeException;

class Mazo {

    private $cartas = [];

    public function mezclar() {
        shuffle($this->cartas);
        return TRUE;
    }

    public function cortar() {
        if($this->size() == 0) return;

        $randIndex = rand(0, $this->size()-1);
        $start = array_splice($this->cartas, 0, -$randIndex);
        $this->cartas = array_merge ($this->cartas, $start);
    }

    public function add(Carta $carta) {
        $this->cartas[] = $carta;
    }

    public function get(int $i): Carta {
        return $this->cartas[$i];
    }

    public function equals(Mazo $b): bool {
        if($this->size() != $b->size()) return false;

        for($i = 0; $i < $this->size(); $i++) {
            if($this->get($i) !== $b->get($i)) return false;
        }

        return true;
    }

    public function equalsIgnoreOrder(Mazo $b): bool {
        return $this->hashIgnoreOrder() == $b->hashIgnoreOrder();
    }

    public function isEmpty(): bool {
        return $this->size() == 0;
    }

    public function size(): int {
        return count($this->cartas);
    }

    public function __clone() {
        for($i = 0; $i < $this->size(); $i++) {
            $this->cartas[$i] = clone $this->cartas[$i];
        }
    }

    private function hashIgnoreOrder(): int {
        $result = 37;

        foreach ($this->cartas as $carta) {
            if(!($carta instanceof Carta)) throw new RuntimeException();

            $result += 37 * $carta->hash();
        }

        return $result;
    }

}
