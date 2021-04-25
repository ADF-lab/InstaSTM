<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Post;
use App\Models\Friend;
use App\Models\Like;

class Home extends Component
{
    use WithFileUploads;
	public $follow,$user,$isModal,$searchuser;
    public $caption=' ', $image, $imageName, $id_user,$id_post,$search;

    public function render()
    {   
        $followuser = Friend::where('id_user', Auth()->User()->id)->pluck('following')->toArray();
        $this->follow=DB::table('posts')->whereIn('id_user',$followuser)
                    ->orderBy('created_at','DESC')
                    ->get();;
        $this->user=DB::table('users')->get();

        //search bar
        if ($this->searchuser!='') {
            $this->search=DB::table('users')->where('username','LIKE',$this->searchuser.'%')->get();
        }
        
        return view('livewire.home');
    }

    //FUNGSI INI AKAN DIPANGGIL KETIKA TOMBOL TAMBAH ANGGOTA DITEKAN
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