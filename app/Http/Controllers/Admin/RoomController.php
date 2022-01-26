<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController
{

    public function store(Request $request) {
        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;
        $room->save();
        return back();
    }

    public function viewRoom($id, Room $room){

        $users = User::with(['comments' => function($query) use ($id) {
            $query->where('room_id', $id);
        }])->get();

        return response()->json($users);
    }

    public function edit($id, Request $request) {
        $room = Room::find($id);
        $room->name = $request->name;
        $room->description = $request->description;
        $room->save();
        return back();
    }
    public function delete($id, Request $request){
        $room = Room::find($id);
        $room->delete();
        return back();
    }
}
