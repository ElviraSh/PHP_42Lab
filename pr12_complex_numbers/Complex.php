<?php

class Complex
{
    private $real;
    private $imaginary;


    function getreal(): float
    {
        return $this->real;
    }

    function getimaginary(): float
    {
        return $this->imaginary;
    }


    function __construct(float $real, float $imaginary)
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
    }

    function add(Complex $complex): Complex
    {
        $real = $this->real + $complex->getreal();
        $imaginary = $this->imaginary + $complex->getimaginary();
        return new Complex($real, $imaginary);
    }

    function sub(Complex $complex): Complex
    {
        $real = $this->real - $complex->getreal();
        $imaginary = $this->imaginary - $complex->getimaginary();
        return new Complex($real, $imaginary);
    }


    function mult(Complex $complex): Complex
    {
        $real = $this->real * $complex->real - $this->imaginary * $complex->imaginary;
        $imaginary = $this->real * $complex->imaginary + $this->imaginary * $complex->real;
        return new Complex($real, $imaginary);
    }


     function div(Complex $complex): Complex
    {
        $real = ($this->real * $complex->getreal() + $this->imaginary * $complex->getimaginary()) / ($complex->getreal() * $complex->getreal() + $complex->getimaginary() * $complex->getimaginary());
        $imaginary = ($this->imaginary * $complex->getreal() - $this->real * $complex->getimaginary()) / ($complex->getreal() * $complex->getreal() + $complex->getimaginary() * $complex->getimaginary());
        return new Complex($real, $imaginary);
    }
}
