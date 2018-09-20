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

    public function testCortar() {
        $mazo = new Mazo;

        for($i = 0; $i < 3; $i++) {
            $mazo->add(new Carta(TiposCarta::E_ORO, $i));
        }

        $mazoCpy = clone $mazo;
        $mazo->cortar();
        $this->assertFalse($mazo->equals($mazoCpy));
        $this->assertTrue($mazo->equalsIgnoreOrder($mazoCpy));
    }

    public function testCloneAndEquals() {
        $mazo1 = new Mazo();
        $mazo2 = clone $mazo1;
        $this->assertTrue($mazo1->equals($mazo2));

        $mazo1 = new Mazo();
        $mazo2 = clone $mazo1;
        $mazo1->add(new Carta(TiposCarta::E_ORO, 1));
        $this->assertFalse($mazo1->equals($mazo2));
    }

    public function testContar() {
        $size = 100;

        $mazo = new Mazo;

        for($i = 0; $i < $size; $i++) {
            $mazo->add(new Carta(TiposCarta::E_ORO, 1));
        }

        $this->assertEquals($size, $mazo->size());
    }

    public function testObtenerN() {
        $mazo = new Mazo;

        for($i = 0; $i < 100; $i++) {
            $mazo->add(new Carta(TiposCarta::E_ORO, $i));
        }

        $this->assertEquals(0, $mazo->get(0)->NUMERO);
        $this->assertEquals(10, $mazo->get(10)->NUMERO);
    }

    public function testEmpty() {
        $mazo = new Mazo;

        $this->assertTrue($mazo->isEmpty());

        for($i = 0; $i < 100; $i++) {
            $mazo->add(new Carta(TiposCarta::E_ORO, 1));
        }

        $this->assertFalse($mazo->isEmpty());
    }

    public function testAdd() {
        $mazo = new Mazo;
        $carta = new Carta(TiposCarta::E_ORO, 1);
        
        $mazo->add($carta);
        $this->assertEquals(1, $carta->NUMERO);
    }
}
