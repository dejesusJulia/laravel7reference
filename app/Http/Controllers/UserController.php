<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
use App\User;

class UserController extends Controller
{
    public function index(){

        // $data = [
        //     'name' => 'berd',
        //     'email' => 'bredBerd@gmail.com',
        //     'password' => bcrypt('password')
        // ];
        /* RAW QUERY */
        // DB::insert('insert into users (name, email, password) values (?,?,?)', [
        //     'sarthak', 'sarthak@bitfumes.com', 'password'
        // ]);

        // DB::update('update users set name = ? where id = 1', ['bitfumes']);

        // DB::delete('delete from users where id = 1');

        // $users = DB::select('select * from users');

        /* ELOQUENT */    
        // INSERT
        // $user = new User();
        // $user->name = 'Julia';
        // $user->email = 'julsvdj01@gmail.com';
        // $user->password = bcrypt('password');
        // $user->save();

        // MASS ASSIGNMENT
        // User::create($data);

        // DELETE
        // User::where('id', 4)->delete();

        // UPDATE
        // User::where('id', 5)->update(['name' => 'juls']);

        // SELECT
        $user = User::all();



        return $user;
        return view('home');
    }

    public function uploadAvatar(Request $request){

        if($request->hasFile('image')){
            // TO SAVE ORIGINAL FILENAME
            // $filename = $request->image->getClientOriginalName();
            // $this->deleteOldImage();
            // $request->image->storeAs('images', $filename, 'public');
            // auth()->user()->update(['avatar' => $filename]);

            // TO SAVE FILE
            // $filename = $request->image->hashName();
            // $this->deleteOldImage();
            // $request->image->store('images', 'public');            
            // auth()->user()->update(['avatar' => $filename]);

            // TO SAVE FROM MODEL
            User::uploadAvatar($request->image);
            return redirect()->back()->with('successMessage', 'Image uploaded!');
        }   

        return redirect()->back()->with('errorMessage', 'Image not uploaded.');
    }

    
}
