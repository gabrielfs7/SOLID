<?php 
/*
### EXPLICAÇÕES ####

Ambos quadrado e retângulo são paralelogramas, quadrilateros convexos que possuem dois pares lados paralelos, 
porém com regras diferenciadas. Observando que uma regra da classe base necessita ser modificada por classe derivada, 
devemos então criar um nível de abstração mais acima, contêndo somente os comportamentos e atributos comuns.

Criamos a classe abstrata "Parallelogram" com o metodo "resize" que deve ser implementado pelas classes derivadas 
para que as mesmas façam o redimencionamento de acordo com a regra de cada forma geométrica.
*/
namespace GSoares\SOLID\LiskovSubstitution;

abstract class Parallelogram 
{
    protected $height;
    protected $width;
    
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
    
    public abstract function resize($height, $width);
}

class Rectangle extends Parallelogram 
{
	public function resize($height, $width)
	{
	    $this->height = $height;
	    $this->width = $width;
	}
}

class Square extends Parallelogram {
    
	public function resize($height, $width)
	{
	    $this->width = $width;
	    $this->height = $width;
	}
}

class GraphicEditor
{
    public function resize(Parallelogram $parallelogram)
    {
        $parallelogram->resize(
            $parallelogram->getHeight() * 2,
            $parallelogram->getWidth() * 4
        );
    }
}