<?php

require_once "ContaAbstract.php";

class ContaRale extends ContaAbstract
{
    public function __construct($agencia, $id)
    {
        parent::__contruct($agencia, $id);

        $this->tipo = "002";
    }
}
