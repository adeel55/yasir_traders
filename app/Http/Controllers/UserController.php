<?php

namespace App\Http\Controllers;

use App\User;
use \Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('auth.edit_user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, User $user)
    {
        // return Hash::make($req->new_password);
        if(filled($req->old_password) or filled($req->new_password)){

            if(Hash::check($req->old_password, $user->password)){
                if($req->new_password==$req->confirm_new_password){
                    $rec = [
                        'name' => $req->name,
                        'email' => $req->email,
                        'password' => Hash::make($req->new_password),
                        'updated_at' => $req->updated_at
                    ];
                    $user->update($rec);
                    return view('components.alert',['msg'=>"Password changed successfully",'type'=>'success']);
                }else{

                    return view('components.alert',['msg'=>"New password doesn't matched with confirm password!",'type'=>'danger']);
                }
            }else{
                return view('components.alert',['msg'=>"Old password doesn't matched!",'type'=>'danger']);
            }

        }else{

            $rec = [
                'name' => $req->name,
                'email' => $req->email,
                'updated_at' => $req->updated_at
            ];
            $user->update($rec);
            return view('components.alert',['msg'=>"Profile Updated Successfully!",'type'=>'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
