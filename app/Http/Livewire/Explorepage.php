<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

use App\Models\Post;

class Explorepage extends Component
{
	use WithFileUploads;
    public $tinggi=1000,$loadAmount=6,$totalRecords;
	public $explores,$searchuser,$search,$isModal;
	public $caption=' ', $image, $imageName, $id_user,$id_post;

    public function loadMore()
    {
        if($this->loadAmount>=$this->totalRecords){
            
        }else{
            $this->loadAmount += 5;
            $this->tinggi+=200;
        }
    }

    public function render()
    {
        $this->totalRecords = Post::count();
    	$this->explores=Post::orderBy('id', 'desc')->limit($this->loadAmount)->get();
    	
    	//search bar
        if ($this->searchuser!='') {
            $this->search=DB::table('users')->where('username','LIKE',$this->searchuser.'%')->get();
        }
        return view('livewire.explorepage');
    }

    public function upload()
    {
        //KEMUDIAN DI DALAMNYA KITA MENJALANKAN FUNGSI UNTUK MENGOSONGKAN FIELD
        $this->resetFields();
        //DAN MEMBUKA MODAL
        $this->openModal();
    }

    //FUNGSI INI UNTUK MENUTUP MODAL DIMANA VARIABLE ISMODAL KITA SET JADI FALSE
    public function closeModal()
    {
        $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
        $this->isModal = true;
    }

    //FUNGSI INI UNTUK ME-RESET FIELD/KOLOM, SESUAIKAN FIELD APA SAJA YANG KAMU MILIKI
    public function resetFields()
    {
        $this->caption = '';
        $this->image='';
        $this->imageName='';
        $this->id_user=Auth()->User()->id;
    }

    public function pagep(){
        return redirect()->route('user', ['slug' => Auth()->User()->username]);
    }

    public function pagex(){
        return redirect()->route('explore');
    }
    
    public function post(){
        if ($this->imageName=='') {
            $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $this->imageName = time().'.'.$this->image->extension();  

        // dd($imageName);

        // $this->image->move(public_path('img/post'), $imageName);
        $this->image->storeAs('public/img/post', $this->imageName);    
        }
        
        else{
        /* Store $imageName name in DATABASE from HERE */
        Post::updateOrCreate(['id' => $this->id_post], [
            'id_user' => $this->id_user,
            'caption' => $this->caption,
            'nama_foto' => $this->imageName,
        ]);

    
        $this->closeModal();
    }

    }
}
