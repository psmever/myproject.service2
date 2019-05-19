<?php namespace App\Controllers\Dev;

use App\Controllers\ServiceController;

class Test extends ServiceController
{
	
	public function index()
	{
		echo __FILE__;
	}
	
	//--------------------------------------------------------------------
	
}