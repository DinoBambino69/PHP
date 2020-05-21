<?php

namespace app;
class ComplexMain
{

    public float $first; //real
    public float $second; //complex

    function __construct($first, $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    function __toString()
    {
        return "({$this->first},{$this->second})";
    }

    function add($f, $s) : void
    {
        $this->first += $f;
        $this->second += $s;
    }

    function sub($num) : void
    {
        $this->first *= $num;
        $this->second *= $num;
    }

    function mult($f, $s) : void
    {
        $helperNum = $this->first;
        $this->first = $this->first * $f - $this->second * $s;
        $this->second = $helperNum * $s + $this->second * $f;
    }

    function div($f, $s) : void
    {
        if ($f != 0 && $s != 0) {
            $helperNum = $this->first;
            $this->first = (($this->first * $f) + ($this->second * $s)) / (pow($f, 2) + pow($s, 2));
            $this->second = (($this->second * $f) - ($helperNum * $s)) / (pow($f, 2) + pow($s, 2));
        } else echo "Error! Div 0!";
    }

    function abs() : float
    {
        return sqrt(pow($this->first, 2) + pow($this->second, 2));
    }
}