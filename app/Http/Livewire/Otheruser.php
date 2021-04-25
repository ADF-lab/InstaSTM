<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Post;
use App\Models\User;
use App\Models\Friend;

class Otheruser extends Component
{
	use WithFileUploads;
	Public $slug,$profile,$searchuser,$search;
	Public $followed=true,$other,$mengikuti,$diikuti;
	public $caption=' ', $image, $imageName, $id_user,$id_post,$isModal;

	public function mount($slug){
		$this->slug=$slug;
	}
    public function render()
    {
    	
    	// $user=User::find($this->slug);
    	$user=DB::table('users')->where('username', $this->slug)->first();
    	$username=$user->username;
    	$bio=Str::limit($user->bio,240,' ...');
    	$name=$user->name;
    	$photoprofile=$user->profile_photo_path;
    	$id_user=$user->id;

    	$this->diikuti=DB::table('friends')->where('id_user', $id_user)->count();
    	$this->mengikuti=DB::table('friends')->where('following', $id_user)->count();
    	if($username!=Auth()->User()->username){
    		$this->other=true;
    	}else{ $this->other=false; }
    	$statement=DB::table('friends')
                ->where([
                    ['following','=',$id_user],
                    ['id_user','=',Auth()->User()->id] ])
                ->get();
        if (!$statement->isEmpty()) {
            $this->followed=true;
        }else{$this->followed=false;}

    	
        $this->profile = DB::table('posts')
                    ->where('id_user', '=', $id_user)
                    ->orderBy('created_at', 'DESC')
                    ->get();
        if ($this->searchuser!='') {
            $this->search=DB::table('users')->where('username','LIKE',$this->searchuser.'%')->get();
        }
        return view('livewire.otheruser',[
        	'username'=>$username,
        	'bio'=>$bio,
        	'name'=>$name,
        	'fotoprofil'=>$photoprofile
        ]);
    }

    public function follow(){
    	$Username =DB::table('users')->where('username', $this->slug)->first();
        $id_user=$Username->id;
        $statement=DB::table('friends')
                ->where([
                    ['following','=',$id_user],
                    ['id_user','=',Auth()->User()->id] ])
                ->get();

        if (!$statement->isEmpty()) {
            DB::table('friends')
                ->where([
                    ['following', '=', $id_user],
                    ['id_user', '=', Auth()->User()->id] ])
                ->delete();
                $this->followed=false;
        }
        else{
            Friend::Create([
            'following' => $id_user,
            'id_user' => Auth()->User()->id,
            ]);
            $this->followed=true;
        }
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
        Posts::updateOrCreate(['id' => $this->id_post], [
            'id_user' => $this->id_user,
            'caption' => $this->caption,
            'nama_foto' => $this->imageName,
        ]);

    
        $this->closeModal();
    }

    }
    public function hapus($id){
        $post = Post::find($id);
        $usersImage = public_path("storage/img/post/".$post->nama_foto); 
        unlink($usersImage);
        $post->delete();
    }
    public function edit($id){
        $post=Post::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->id_post=$id;
        $this->caption=$post->caption;
        $this->imageName=$post->nama_foto;
        $this->id_user=$post->id_user;

        $this->openModal(); //LALU BUKA MODAL
    }
}
