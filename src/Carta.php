<?php

namespace TDD;


class Carta {
    public $TIPO;
    public $NUMERO;

    public function __construct(string $tipo, int $numero) {
        $this->TIPO = $tipo;
        $this->NUMERO = $numero;
    }

    /*package*/ function hash() {
        $result = 31;

        $result = 31 * $result + TiposCarta::hash($this->TIPO);

        $result = 31 * $result + $this->NUMERO;

        return $result;
    }
}