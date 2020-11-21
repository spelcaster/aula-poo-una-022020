<?php

require_once "ContaAbstract.php";

class ContaPadrao extends ContaAbstract
{
    public function __construct($agencia, $id)
    {
        parent::__construct($agencia, $id);

        $this->tipo = "001";
    }
}
