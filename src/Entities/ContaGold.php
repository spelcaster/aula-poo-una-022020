<?php

require_once "ContaAbstract.php";
require_once realpath(__DIR__ . "/../Interfaces/ContaFazDepositoInterface.php");
require_once realpath(__DIR__ . "/../Interfaces/ContaFazSaqueInterface.php");

class ContaGold
    extends ContaAbstract
    implements ContaFazDepositoInterface,
        ContaFazSaqueInterface
{
    public function __construct($agencia, $id)
    {
        parent::__construct($agencia, $id);

        $this->limite = 50;
        $this->tipo = "003";
    }

    public function deposito(float $valor)
    {
        $this->movimentacao[] = $valor;
        $this->movimentacao[] = 0.1;
    }

    public function saque(float $valor)
    {
        $saldo = $this->saldo();
        $novoSaldo = $saldo - $valor;

        if (($novoSaldo < 0) && (abs($novoSaldo) > $this->limite)) {
            print("Saldo insuficiente de saque no valor R$ " . $valor. "<br>");
            return;
        }

        $this->movimentacao[] = -$valor;
    }
}
