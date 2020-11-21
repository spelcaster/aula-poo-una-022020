<?php

require_once "src/Entities/ContaGold.php";
require_once "src/Entities/ContaPlatinum.php";
require_once "src/Entities/ContaRale.php";
require_once "src/Entities/ContaPadrao.php";

$conta = new ContaPlatinum("0001", 1);
$conta->deposito(10);
$conta->saque(20);
$conta->saque(.5);
print("EXTRATO CONTA<br>");
$conta->extrato();
