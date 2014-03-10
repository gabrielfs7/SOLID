<?php
/*
### EXPLICAÇÕES ####

Para fazer com que a classe "Vehicle" não seja mais genérica, foi criada a interface "AutomotiveVehicle" que possui
as funcões de veículo, porém com métodos adicionais que dizem respeito apenas a veículos automotivos. Desta forma temos 
interfaces mais específicas que pode ser usadas por mais classes com comportamentos diferentes.
*/
namespace GSoares\SOLID\InterfaceSegregation;

interface Vehicle 
{
	public function run();
}

interface AutomotiveVehicle extends Vehicle
{
    public function turnOn();
    public function fuel();
}

class Motorcycle implements AutomotiveVehicle
{
    public function turnOn()
    {
        echo 'Motorcycle Turning on...';
    }

    public function run()
    {
        echo 'Motorcycle running...';
    }

    public function fuel()
    {
        echo 'Fuel the Motorcycle';
    }
}

class Bicycle implements Vehicle 
{
	public function run() 
	{
		echo 'Bicycle running...';
	}
}