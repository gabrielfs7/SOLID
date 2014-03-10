<?php
/*
### EXPLICAÇÕES ####

As classe "Bicycle" é obrigada a implementar os métodos "turnOn" e "fuel", pois a interface "Vehicle" é genérica demais.
Sempre que eu implementar uma interface todos os métodos da mesma devem ser úteis para a classe em questão. Se existir 
algum método desnecessário sendo implementado, ou você está implementando a interface errada, ou a interface é genérica 
demais e necessidade ser segregada, ou separada em interfaces mais específicas.
*/
namespace GSoares\SOLID\InterfaceSegregation;

interface Vehicle 
{
	public function turnOn();
	public function run();
	public function fuel();
}

class Motorcycle implements Vehicle
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
	public function turnOn() 
	{
		//does nothing, because bicycles doesn't turn on
	}
	
	public function run() 
	{
		echo 'Bicycle running...';
	}
	
	public function fuel() 
	{
	    //does nothing, because bicycles doesn't turn on
	}
}