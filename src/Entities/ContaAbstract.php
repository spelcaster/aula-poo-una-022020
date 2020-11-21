<?php

abstract class ContaAbstract
{
    private $id;
    private $agencia;
    private $tipo;

    protected $movimentacao;

    protected $limite;

    public function __construct($agencia, $id)
    {
        $this->agencia = $agencia;
        $this->id = $id;

        // inicializacao de atributos
        $this->movimentacao = [];
        $this->limite = 0.0;
    }

    public function getLimite()
    {
        return $this->limite;
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
        $valor = 0;

        foreach ($this->movimentacao as $transacao) {
            $valor += $transacao;

            if ($transacao > 0) {
                print("Entrada: R$ ". $transacao . "<br>");
                continue;
            }

            print("Saída: R$ ". abs($transacao) . "<br>");
        }

        print("Saldo Total: R$ " . $valor . "<br>");

        if ($valor < 0) {
            print("Cheque Especial sendo utilizado<br>");

        }
    }

    protected function podeSacar($valor)
    {
        $saldo = $this->saldo();
        $novoSaldo = $saldo - $valor;

        return ($novoSaldo < 0)
            && (abs($novoSaldo) <= $this->limite);
    }

    public function depositoBase(float $valor)
    {
        $this->movimentacao[] = $valor;
    }

    public function saqueBase(float $valor)
    {
        if (!$this->podeSacar($valor)) {
            print("Saldo insuficiente de saque no valor R$ " . $valor. "<br>");
            return;
        }

        $this->movimentacao[] = -$valor;
    }
}
