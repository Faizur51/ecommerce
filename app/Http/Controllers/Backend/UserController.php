<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
class UserController extends Controller
{

    public function index()

    {
        $users=User::with('role')->get();

        return view('backend.user.manage',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userroles=UserRole::select('id','sl','name','status')->where('status','active')->OrderBy('sl','asc')->get();

        return view('backend.user.create',compact('userroles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'min:8','confirmed'],
        ]);

        $user = User::create([
            'role_id'=>$request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back();
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

    public function edit($id)
    {
        $user=User::findOrFail($id);

        $userroles=UserRole::select('id','sl','name','status')->where('status','active')->OrderBy('sl','asc')->get();


        return view('backend.user.edit',compact('user','userroles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,

        ]);

          try{
              $user=User::findOrFail($id);

              $user->role_id=$request->role_id;
              $user->name =$request->name;
              $user->email = $request->email;
              $user->mobile = $request->mobile;
              $user->status = $request->status;
              $user->password = Hash::make($request->password);
              $user->save();

          }catch(Exception $e){

          }

        return redirect()->back();
    }


    public function destroy($id)
    {

        $user=User::findOrFail($id);

         if(auth()->user()->id == $id){
             set_message('danger','User Delete Not Success');
             return redirect()->back();
         }else{
           $user->delete();
         }


  /*    return redirect()->back()->with([
          'type'=>'success',
          'message'=>'User Delete Success'
      ]);
         */

       set_message('success','User Delete Success');
      return redirect()->back();

    }
}
