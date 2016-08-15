
<?php

require_once __DIR__ . '/Model.php';

class Ad extends Model 
{

	protected static $table = 'ads';
	public function trimDescription ()
	{
		$out = strlen($this->attributes['description']) > 100 ? substr($this->attributes['description'],0,100)."..." : $this->attributes['description'];
		return $out;
	}


 
}