<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController
{

    public function deleteUser($id, Request $request) {
        User::find($id)->delete();
        return back();
    }
    public function viewUser($id) {
        return response()->json(User::find($id));
    }

    public function editUser($id, Request $request){
//        dd($id, $request->avatar);
        if($request->avatar){
            $destination_path = "public/images/users";
            $image_n = $request->avatar;
            $image_name = $image_n->getClientOriginalName();
            $request->avatar->storeAs($destination_path,$image_name);
        }
        $image_name = "images/users/" . $request->avatar->getClientOriginalName();

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_image = $image_name;
        $user->save();
    }
}
