<?php
namespace App\Traits;

trait UserTrait
{
    protected $name="default";

    public function setName($name){
    	$this->name =$name;
    }
  
	public function getName(){
    	echo "getName() <br>";
    return $this->name;
    }

    public function __construct(){
    	echo "<br>hello UserTrait constructor"; 
    }
}