<?php

require_once "ContaAbstract.php";
require_once realpath(__DIR__ . "/../Interfaces/ContaFazDepositoInterface.php");
require_once realpath(__DIR__ . "/../Interfaces/ContaFazSaqueInterface.php");

class ContaRale extends ContaAbstract
{
    public function __construct($agencia, $id)
    {
        parent::__construct($agencia, $id);

        $this->tipo = "002";
    }

    public function deposito(float $valor)
    {
        $this->depositoBase($valor);
    }

    public function saque(float $valor)
    {
        if (!$this->podeSacar($valor + 0.01)) {
            print("Saldo insuficiente de saque no valor R$ " . $valor. "<br>");
            return;
        }

        $this->movimentacao[] = -$valor;
        $this->movimentacao[] = -0.01;
    }

    public function extrato()
    {
        $this->movimentacao[] = -0.1;

        parent::extrato();
    }
}
