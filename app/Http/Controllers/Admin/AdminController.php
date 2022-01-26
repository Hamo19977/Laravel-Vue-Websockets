<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function users() {
        $users = User::get();
        return response()->json($users);
    }

    public function rooms() {
        $rooms = Room::get();
        return response()->json($rooms);
    }

}
