<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UserTrait;

class sonUser extends Model
{
	use UserTrait;

    public function __construct()
    {
    	$this->setName("David");
        echo "<br>hello world sonUser<br>";
        echo "name: ".$this->getName()."<br>";
    }
}
