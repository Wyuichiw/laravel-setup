<?php
require_once __DIR__ . '/AccountInterface.php';

class BankAccount implements AccountInterface {
    public const MIN_BALANCE = 0;

    protected float $balance;
    protected string $currency;

    public function __construct(float $initialBalance = 0.0, string $currency = "USD") {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути меншим за мінімальний допустимий.");
        }
        $this->balance = $initialBalance;
        $this->currency = $currency;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення має бути більшою за нуль.");
        }
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття має бути більшою за нуль.");
        }
        if (($this->balance - $amount) < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів на рахунку для зняття суми: $amount {$this->currency}.");
        }
        $this->balance -= $amount;
        return $this->balance;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getCurrency() {
        return $this->currency;
    }
}