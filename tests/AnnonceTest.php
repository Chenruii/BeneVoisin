<?php


class AnnonceTest extends \PHPUnit_Framework_TestCase
{
    public function getDescription() : ?string
    {
        $strings = " ";
        $this->assertEquals(1,string::getdescription($strings));
    }
}