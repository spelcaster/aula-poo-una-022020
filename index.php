<?php

class Conta
{
    private $id;
    private $agencia;
    private $tipo;
    private $movimentacao;

    protected $limite;

    public function __construct($agencia, $id, $tipo)
    {
        $this->agencia = $agencia;
        $this->id = $id;
        $this->tipo = $tipo;

        // inicializacao de atributos
        $this->movimentacao = [];
        $this->limite = 0.0;
    }

    public function setLimite($limite)
    {
        $this->limite = $limite;

        return $this;
    }

    public function getLimite()
    {
        return $this->limite;
    }

    public function saque(float $valor)
    {
        $saldo = $this->saldo();
        $novoSaldo = $saldo - $valor;

        if (($novoSaldo <= 0) && ($valor > $this->limite)) {
            print("Saldo insuficiente");
            return;
        }

        $this->movimentacao[] = -$valor;
    }

    public function deposito(float $valor)
    {
        $this->movimentacao[] = $valor;
    }

    public function saldo()
    {
        $valor = 0;

        foreach ($this->movimentacao as $transacao) {
            $valor += $transacao;
        }

        return $valor;
    }

    public function extrato()
    {
        foreach ($this->movimentacao as $transacao) {
            if ($transacao > 0) {
                print("Entrada: R$ ". $transacao . "\n");
                continue;
            }

            print("Saída: R$ ". abs($transacao) . "\n");
        }
    }
}

//$conta1 = new Conta("0001", 1, 'cc');
//print($conta1->agencia . " ". $conta1->id . "<br>");

//$conta2 = new Conta("0001", 2, 'p');
//print($conta2->agencia . " ". $conta2->id . "<br>");

