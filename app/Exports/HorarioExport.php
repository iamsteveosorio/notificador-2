<?php

namespace App\Exports;

use App\Horario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HorarioExport implements FromView
{	
	public function __construct($view){
		$this->view = $view;
	}
	
	public function view(): View{
		return $this->view;
	}
}
