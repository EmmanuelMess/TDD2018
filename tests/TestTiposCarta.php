<?php

namespace TDD;


use PHPUnit\Framework\TestCase;

class TestTiposCarta extends TestCase {
    public function testHash() {
        $hashArr = [TiposCarta::hash(TiposCarta::E_ORO),
            TiposCarta::hash(TiposCarta::E_COPA),
            TiposCarta::hash(TiposCarta::E_ESPADA),
            TiposCarta::hash(TiposCarta::E_BASTO),
            TiposCarta::hash(TiposCarta::P_TREBOL),
            TiposCarta::hash(TiposCarta::P_PICA),
            TiposCarta::hash(TiposCarta::P_CORAZON),
            TiposCarta::hash(TiposCarta::P_DIAMANTE)];

        $this->assertEquals($hashArr, array_unique($hashArr, SORT_NUMERIC));
    }
}