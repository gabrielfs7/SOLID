<?php
/*
 ### EXPLICAÇÕES ####

Como o princípio do "Aberto e Fechado" diz que a classe deve estar aberta para extensão e fechada para alteração, 
porém no exemplo abaixo o método "drive" da classe "Driver" precisará ser alterado sempre que for criado um novo 
tipo de veículo. Ou seja, ao adicionar um novo comportamento o código existente terá que ser alterado, indo totalmente 
contra o princípio do "Open/Closed"
*/
namespace GSoares\SOLID\OpenClosed;

class Vehicle 
{
    public function run(){}
}

class Motorcycle extends Vehicle
{
    
}

class Car extends Vehicle
{
    
}

class Driver 
{
    public function drive(Vehicle $vehicle)
    {
        if ($vehicle instanceof Motorcycle) {
            $this->turnOnMotorcycle();
        }       
        
        if ($vehicle instanceof Car) {
            $this->turnOnCar();
        }
        
        $vehicle->run();
    }
    
    private function turnOnCar()
    {
        echo 'Turning on the car';
    }
    
    private function turnOnMotorcycle()
    {
        echo 'Turning on the motorcycle';
    }
}