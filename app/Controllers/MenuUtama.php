<?php

namespace App\Controllers;

class MenuUtama extends BaseController
{
	public function index()
	{

		$data =[
			'judul'=> '1'
		];
		return view('MenuUtama',$data);
	}
}