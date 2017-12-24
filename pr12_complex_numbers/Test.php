<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './Complex.php';

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    function testAdd()
    {
        $complex_number1 = new Complex(1, 2);
        $complex_number2 = new Complex(3, 4);
        $this->assertEquals(4, $complex_number1->add($complex_number2)->getreal());
        $this->assertEquals(6, $complex_number1->add($complex_number2)->getimaginary());
    }

    function testSub()
    {
        $complex_number1 = new Complex(1, 2);
        $complex_number2 = new Complex(3, 4);
        $this->assertEquals(-2, $complex_number1->sub($complex_number2)->getreal());
        $this->assertEquals(-2, $complex_number1->sub($complex_number2)->getimaginary());
    }

    function testMult()
    {
        $complex_number1 = new Complex(1, 2);
        $complex_number2 = new Complex(3, 4);
        $this->assertEquals(-5, $complex_number1->mult($complex_number2)->getreal());
        $this->assertEquals(10, $complex_number1->mult($complex_number2)->getimaginary());
    }

    function testDiv()
    {
        $complex_number1 = new Complex(1, 2);
        $complex_number2 = new Complex(3, 4);
        $this->assertEquals(0.44, $complex_number1->div($complex_number2)->getreal());
        $this->assertEquals(0.08, $complex_number1->div($complex_number2)->getimaginary());
    }
}