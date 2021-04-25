<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;

class Postpage extends Component
{
    public $slug,$comment,$comments,$usercomment,$liketrue=true;
    public $searchuser,$search;

    public function mount($slug){
        $this->slug=$slug;
    }

    public function render()
    {        
        $Post = Post::find($this->slug);
        $nama_foto = $Post->nama_foto;
        $caption = $Post->caption;
        $id_user=$Post->id_user;
        $id_post=$Post->id;
        $date=$Post->created_at->diffForHumans();

        $user=User::find($id_user);
        $username=$user->username;
        $photoprofile=$user->profile_photo_path;
        
        $jumlahlike=DB::table('likes')->where('id_post', '=', $id_post)->count();
        $this->usercomment=DB::table('users')->get();
        $this->comments=DB::table('comments')
                    ->where('id_post', '=', $this->slug)
                    ->orderBy('created_at', 'ASC')
                    ->get();
        // $matchThese = ['field' => 'value', 'another_field' => 'another_value', ...];
        // $results = User::where($matchThese)->get();
        $statement=DB::table('likes')
                ->where([
                    ['id_post','=',$id_post],
                    ['id_user','=',Auth()->User()->id] ])
                ->get();

        if (!$statement->isEmpty()) {
            $this->liketrue=true;
        }else{$this->liketrue=false;}

        if ($this->searchuser!='') {
            $this->search=DB::table('users')->where('username','LIKE',$this->searchuser.'%')->get();
        }

        return view('livewire.postpage',[
            'nama_foto'            => $nama_foto, 
            'caption'          => $caption,
            'username'=>$username,
            'jumlahlike'=>$jumlahlike,
            'photoprofile'=>$photoprofile,
            'date'=>$date
        ]);
    }

    public function like(){
        $Post = Post::find($this->slug);
        $id_post=$Post->id;
        $statement=DB::table('likes')
                ->where([
                    ['id_post','=',$id_post],
                    ['id_user','=',Auth()->User()->id] ])
                ->get();

        if (!$statement->isEmpty()) {
            DB::table('likes')
                ->where([
                    ['id_user', '=', Auth()->User()->id],
                    ['id_post', '=', $id_post] ])
                ->delete();
                $this->liketrue=false;
        }
        else{
            Like::Create([
            'id_user' => Auth()->User()->id,
            'id_post' => $id_post,
            ]);
            $this->liketrue=true;
        }
        
    }

    public function resetfield(){
        $this->comment = '';
    }

    public function tambahcomment(){
        $Post = Post::find($this->slug);
        $id_post=$Post->id;
        if ($this->comment!='') {
            Comment::Create([
            'id_user' => Auth()->User()->id,
            'id_post' => $id_post,
            'isi'=>$this->comment,
            ]);
            $this->resetfield();
        }
        
    }

    public function hapus($id){
        DB::table('comments')->where('id', '=', $id)->delete();
    }
}
