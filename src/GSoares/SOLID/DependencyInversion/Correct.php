<?php
/*
### EXPLICAÇÕES ####

No exemplo abaixo abstraimos os detalhes do "Computer", ou seja abstraimos o comportamento dele de ligar e 
desligar através da interface "PowerDevice". Agora "invertemos" a dependência do "Button" para o 
"Computer", ou seja, ambos dependem de abstração. Dessa fora a classe "Button" poderá travalhar com qualquer 
"Power Device", não se preocupando como os detalhes do mesmo.
*/
namespace GSoares\SOLID\DependencyInversion;

interface PowerDevice
{
   public function on();
   public function off();
       
}

class Computer implements PowerDevice
{
    public function on()
    {
        echo 'Computer power on!';
    }
    
    public function off()
    {
        echo 'Computer power off...';
    }
}

class Button 
{
    /**
     * @var PowerDevice
     */
    private $powerDevice;
    
    public function setPowerDevice(PowerDevice $powerDevice)
    {
        $this->powerDevice = $powerDevice;
    }
    
    public function turnOn()
    {
        if (condition) { //some condition
            $this->powerDevice->on();
        }
    }
    
}