<?php
abstract class Account
{
    private $id;
    private $balance;
    abstract protected function deposit($amount);
    abstract protected function withdraw($amount);
    abstract protected function getBalance();

}

class Savings extends Account
{
    private $id;
    private $balance;
    const MAX_MONTHLY_WITHDRAWALS = 6;
    private $monthlywithdrawals;


    function __construct($id, $initialBalance) {
        $this->id = $id;
        $this->balance = $initialBalance;
      }

    public function deposit($amount) {
        $this -> balance += $amount;
    }

    public function withdraw($amount) {
        if(($this -> balance < $amount) || ($this -> monthlywithdrawals > $this -> MAX_MONTHLY_WITHDRAWALS)){
            return false;
        }
        else{
            $this -> balance -= $amount;
        }

    }

    public function getBalance() {
        return $this -> balance;
    }
}
    class Checkings extends Account
{
    private $id;
    private $balance;

    function __construct($id, $initialBalance) {
        $this->id = $id;
        $this->balance = $initialBalance;
      }

    public function deposit($amount) {
        $this -> balance += $amount;
    }

    public function withdraw($amount) {
        if($this -> balance > $amount){
            $this -> balance -= $amount;
        }
    }

    public function getBalance() {
        return $this -> balance;
    }
}
