<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function rooms() {
        $comments = Comment::where('user_id', Auth::user()->id)->get();
        $data = $comments->unique('room_id');
        $data->load('room');
        return response()->json($data);
    }
}
