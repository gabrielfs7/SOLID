<?php
/*
### EXPLICAÇÕES ####

- No exemplo abaixo podemos identificar que a classe "Sale" que deveria apenas 
trabalhar com os valores da venda, também calcula o saldo da conta do cliente.

- Isto está ERRADO, pois o cálculo do saldo diz respeito a conta e a contabilização do mesmo deveria ficar
na classe "Account" ou em um serviço responsável por cálculo de saldo. Do jeito implementado abaixo, 
a classe teria "dois motivos" para ser alterada: 
    1) Houve mudança nas regras de venda ou 
    2) Houve mudança no cálculo de saldo da conta.

E isso vai contra o princípio de "Single Responsability Principle" que afirma que: 
    “Uma classe deve ter somente uma razão para mudar”.
*/
namespace GSoares\SOLID\SingleResponsability;

class NoBalanceAvailableException extends \Exception {}

class Product {
    public function getValue() {}
}

class Account 
{
    public function getBalance() {}
    public function setBalance() {}
}

class Customer 
{
    public function getAccount() {}
}

class Sale
{
    public function getValue() {}
    public function setValue() {}
    
    public function sell(array $products, Customer $customer)
    {
        $value = $this->calculateTotalValue($products);
        
        if (!$this->haveBalanceAvailable($customer, $value)) {
            throw new NoBalanceAvailableException();
        }

        /*..... something.....*/
        
        $this->setValue($value);
        $this->calculateBalance($customer);
    }
    
    public function calculateBalance(Customer $customer)
    {
        $customer->getAccount()->setBalance($customer->getAccount()->getBalance() - $this->getValue());
    }
    
    public function haveBalanceAvailable(Customer $customer, $value)
    {
        return $customer->getAccount()->getBalance() >= $value;
    }
    
    private function calculateTotalValue(array $products)
    {
        $value = 0;
    
        foreach ($products as $product) {
            $value += $product->getValue();
        }
    
        return $value;
    }
}