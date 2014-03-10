<?php
/*
 ### EXPLICAÇÕES ####

No exemplo abaixo a classe "Vehicle" foi transformada em abstrata e o metodo "tunOn" foi abstratido pelas classes que 
estendem "Vehicle", desta forma, se criarmos um novo veículo, por exemplo "Truck", não será mais necessário alterar
o código existente (método Driver::drive), necessitando apenas que "Truck" estenda "Vehicle" e implemente o método "turnOn".
*/
namespace GSoares\SOLID\OpenClosed;

abstract class Vehicle 
{
    public function run(){}
    abstract public function turnOn();
}

class Motorcycle extends Vehicle
{
    public function turnOn()
    {
        echo 'Turning on the motorcycle';
    } 
}

class Car extends Vehicle
{
    public function turnOn()
    {
        echo 'Turning on the car';
    }
}

class Truck extends Vehicle
{
    public function turnOn()
    {
        echo 'Turning on the truck';
    }
}

class Driver 
{
    public function drive(Vehicle $vehicle)
    {
        $vehicle->turnOn();
        $vehicle->run();
    }
}