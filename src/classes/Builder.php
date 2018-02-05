<?php

namespace App\classes;
use App\classes\Message;
use App\classes\Import;
//use App\classes\Export;
/**
* Class to build other class
* Using pattern Builder
*/
class Builder 
{
	private $class;
	use Message;

	static public function create()
	{	
		return new static;
	}

	public function build($class = "")
	{
		$this->class = $class;

		if($this->class == "") {
			
			$this->getMessage('Está faltando nome da class, para ser construido no metódo build.');
			exit;

		}

		$this->class = 'App\classes'.$this->class;

		if(class_exists($this->class)){

			return new $this->class();
			
		}else{

			$this->getMessage('Class não encontrado!');
			exit;
		}

	}
}