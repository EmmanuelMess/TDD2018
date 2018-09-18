<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    public function testMezclarVacio() {
        $mazo = new Mazo;
        $mazoCpy = $mazo->clone();
        $mazo->mezclar();
        $this->assertTrue($mazo->equals($mazoCpy));
    }

    public function testMezclarElem() {
        $mazo = new Mazo;
        
        for($i = 0; $i < 100; $i++) {
            $mazo->add(new Carta(TiposCarta::E_ORO, 1));
        }

        $mazoCpy = $mazo->clone();
        $mazo->mezclar();
        $this->assertFalse($mazo->equals($mazoCpy));
        $this->assertTrue($mazo->equalsIgnoreOrder($mazoCpy));
    }
}
