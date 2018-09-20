<?php

namespace TDD;


use PHPUnit\Framework\TestCase;

class CartaTest extends TestCase {
    public function testConstruction() {
        $carta = new Carta(TiposCarta::E_BASTO, 1);
        $this->assertEquals(TiposCarta::E_BASTO, $carta->TIPO);
        $this->assertEquals(1, $carta->NUMERO);
    }
}