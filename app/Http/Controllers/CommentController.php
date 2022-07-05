<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function comments(User $user)
    {
        $broj = Comment::query()->where('profile_id', '=', $user->id)->count();
        $komentari = Comment::query()->where('profile_id', '=', $user->id)->orderByDesc('created_at')->get();

        return view("korisnici.komentari", compact('user', 'broj', 'komentari'));
    }


    public function makecomment(User $user)
    {

        $data = request()->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'comment' => $data['comment'],
            'profile_id' => $user->id,
            'user_id' => auth()->id(),
        ]);


        return redirect("/comments{$user->id}")->with('success','Uspješno ste dodali komentar.');
    }

    public function delete(Comment $comment)
    {
        if (auth()->user()->id == $comment->user_id
            || auth()->user()->role == "Admin"
            || auth()->user()->role == "Moderator")
        {
            return view("korisnici.komentardelete", compact('comment'));

        }
        abort('403', 'Niste napisali ovaj komentar i ne možete ga brisati!');
    }

    public function commentdelete(Comment $comment)
    {

        DB::table('comments')->where("id", $comment->id)->delete();

        return redirect("/comments{$comment->profile_id}")->with('success', 'Uspješno ste obrisali komentar!');
    }

}
