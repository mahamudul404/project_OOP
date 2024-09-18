<?php

class BankAccount
{
  protected $accountNumber;
  protected $balance;

  public function __construct($accountNumber, $initialBalace = 0)
  {
    $this->accountNumber = $accountNumber;
    $this->balance = $initialBalace;
  }

  public function deposit($amount)
  {

    if ($amount > 0) {
      $this->balance += $amount;
      echo "Deposited: $$amount\n";
    } else {
      echo "Invalid deposit amount";
    }
  }

  public function withdraw($amount)
  {

    if ($amount > 0 && $amount <= $this->balance) {
      $this->balance -= $amount;
      echo "withdraw: $$amount\n";
    } else {
      echo "Invalid withdraw amount";
    }
  }

  public function getBalace()
  {
    return $this->balance;
  }

  public function getAccountNumber()
  {
    return $this->accountNumber;
  }
}


class SavingAccount extends BankAccount
{
  private $interestRate;

  public function __construct($accountNumber, $initialBalace = 0, $interestRate = 0.5)
  {
    Parent::__construct($accountNumber, $initialBalace);
    $this->interestRate = $interestRate;
  }

  public function addInterest()
  {
    $interest = $this->balance * $this->interestRate;
    $this->balance += $interest;
    echo "Interest added: $$interest";
  }
}

class CurrentAccount extends BankAccount
{

  private $overdraftLimit;

  public function __construct($accountNumber, $initialBalace = 0, $overdraftLimit = 500)
  {
    Parent::__construct($accountNumber, $initialBalace);
    $this->overdraftLimit = $overdraftLimit;
  }

  public function withdraw($amount)
  {
    if ($amount > 0 && ($this->balance + $this->overdraftLimit) >= $amount) {
      $this->balance -= $amount;
      echo "Withdraw : $$amount\n";
    }else{
      echo "Exceeded overdraft Limit";
    }
  }
}


$savingsAccount = new SavingAccount("SA123",1099,0.03);
echo "Saving account number : " . $savingsAccount->getAccountNumber(). "\n";
echo "Initial Balance : $" . $savingsAccount->getBalace() . "\n";

$savingsAccount->deposit(400);
echo "Balacnce after deposite : $" . $savingsAccount->getBalace() . "\n";

$savingsAccount->addInterest();
echo "Balance after Interest: $" . $savingsAccount->getBalace() . "\n";

$currentAmount = new CurrentAccount("CA232",2000,230);
echo "\nCurrent Account Number : " . $currentAmount->getAccountNumber() . "\n";
echo "Initial Balance : $" . $currentAmount->getBalace() . "\n";

$currentAmount->withdraw(232);
echo "Balance after exceeding overdraft : $" . $currentAmount->getBalace() . "\n";