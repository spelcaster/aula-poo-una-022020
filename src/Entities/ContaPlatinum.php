<?php

require_once "ContaAbstract.php";
require_once realpath(__DIR__ . "/../Interfaces/ContaFazDepositoInterface.php");
require_once realpath(__DIR__ . "/../Interfaces/ContaFazSaqueInterface.php");

class ContaPlatinum extends ContaAbstract
{
    public function __construct($agencia, $id)
    {
        parent::__construct($agencia, $id);

        $this->tipo = "004";
    }

    public function deposito(float $valor)
    {
        $this->depositoBase($valor);
        $this->depositoBase(1);
    }

    public function saque(float $valor)
    {
        $this->movimentacao[] = -$valor;

        if ($valor > 1) {
            $this->depositoBase(0.5);
        }
    }
}
