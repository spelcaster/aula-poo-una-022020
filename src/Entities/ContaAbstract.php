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
        foreach ($this->movimentacao as $transacao) {
            if ($transacao > 0) {
                print("Entrada: R$ ". $transacao . "<br>");
                continue;
            }

            print("Saída: R$ ". abs($transacao) . "<br>");
        }
    }
}
