<?php
/*
### EXPLICAÇÕES ####

Caso o metodo "resize" receba um "Rectangle", ele irá redimencionar o mesmo da forma esperada, porém se receber um 
"Square", não importa os parâmetros utilizados, o redimencionamento sempre será para um quadrado.

Este "bug" ocorre, porque a classe derivada "Square" não respeita a regra da classe base "Rectangle" de variar a 
largura e altura de forma independente. Ou seja, a classe "Square" fez um "override" alterando a regra da classe base 
que manipula os atributos "width" e "height" compartilhados por elas.

A violação do LSP ocorre aqui, pois no método "resize" não é possível substituir um objeto da classe derivada por outro 
sem quebrar a regra, pois a atribuição de largura e altura teve a regra alterada na classe "Square". Todo o quadrado é 
um retângulo, porém nem todo o retângulo é um quadrado.
*/
namespace GSoares\SOLID\LiskovSubstitution;

class Rectangle 
{
    protected $height;
    protected $width; 
    
    public function setWidth($width)
    {
        $this->width = $width;
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
    }
    
    public function getWidth()
    {
        return $this->width;
    }
    
    public function getHeight()
    {
        return $this->height;
    }
    
    public function calculateArea()
    {
        return $this->height * $this->width;
    }
}

class Square extends Rectangle {
    
	public function setWidth($width) 
	{
		$this->width = $width;
		$this->height = $width;
	}
	
	public function setHeight($height) 
	{
		$this->width = $height;
		$this->height = $height;
	}
}

class GraphicEditor
{
    public function resize(Rectangle $rectangle)
    {
        $rectangle->setHeight($rectangle->getHeight() * 2);
        $rectangle->setWidth($rectangle->getWidth() * 4);
    }
}