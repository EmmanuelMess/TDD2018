<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    public function testMezclarVacio() {
        $mazo = new Mazo;
        $mazoCpy = clone $mazo;
        $mazo->mezclar();
        $this->assertTrue($mazo->equals($mazoCpy));
    }

    public function testMezclarElem() {
        $mazo = new Mazo;
        
        for($i = 0; $i < 100; $i++) {
            $mazo->add(new Carta(TiposCarta::E_ORO, 1));
        }

        $mazoCpy = clone $mazo;
        $mazo->mezclar();
        $this->assertFalse($mazo->equals($mazoCpy));
        $this->assertTrue($mazo->equalsIgnoreOrder($mazoCpy));
    }

    public function testCloneAndEquals() {
        $mazo1 = new Mazo();
        $mazo2 = clone $mazo1;
        $this->assertTrue($mazo1->equals($mazo2));

        $mazo1 = new Mazo();
        $mazo2 = clone $mazo1;
        $mazo1->add(new Carta(TiposCarta::E_ORO));
        $this->assertFalse($mazo1->equals($mazo2));
    }
}
