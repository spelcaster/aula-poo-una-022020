<?php

require_once "ContaAbstract.php";

class ContaPlatinum extends ContaAbstract
{
    public function __construct($agencia, $id)
    {
        parent::__contruct($agencia, $id);

        $this->tipo = "004";
    }
}
