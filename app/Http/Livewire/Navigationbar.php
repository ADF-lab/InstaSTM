<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Navigationbar extends Component
{
	public $search,$searchuser,$searchmodal;
    public function render()
    {
    	
    	//search bar
        if ($this->searchuser!='') {
            $this->search=DB::table('users')->where('username','LIKE',$this->searchuser.'%')->get();
        }
        return view('livewire.navigationbar');
    }
    public function searchbutton(){
        $this->resetFields();
        $this->open();
    }

    public function close()
    {
        $this->searchmodal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function open()
    {
        $this->searchmodal = true;
    }

    //FUNGSI INI UNTUK ME-RESET FIELD/KOLOM, SESUAIKAN FIELD APA SAJA YANG KAMU MILIKI
    public function resetFields()
    {
        $this->searchuser = '';
    }
}
