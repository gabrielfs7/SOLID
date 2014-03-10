<?php
/*
### EXPLICAÇÕES ####

No exemplo abaixo podemos perceber que o botao depende de uma classe concreta "Computer" e conhece detalhes de
implementação da mesma violando o DIP que afirma que detalhes devem depender de abstrações.
*/
namespace GSoares\SOLID\DependencyInversion;

class Computer
{
    public function on() {}
}

class Button 
{
    /**
     * @var Computer
     */
    private $computer;

    public function on()
    {
        $this->computer->power();
    }
}
