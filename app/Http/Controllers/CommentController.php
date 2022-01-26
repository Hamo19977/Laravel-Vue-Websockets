<?php

namespace App\Http\Controllers;

use App\Events\NewGroupMessage;
use App\Models\Comment;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request,Room $room)
    {
        $comments = Comment::with('user')->where('room_id', $request->post)->get();
        return response()->json($comments);
    }

    public function store(Request $request, Room $room) {
        $comment = Comment::create([
            'text' => $request->text,
            'room_id' => +$request->post,
            'user_id' => $request->user_id,
        ]);
        broadcast(new NewGroupMessage($comment))->toOthers();
        return response()->json($comment);
    }

    public function getRoomUsers($id){
        $users = Comment::with('user')->where('room_id', $id)->get()->unique('user_id');
        return response()->json($users);
    }
}
