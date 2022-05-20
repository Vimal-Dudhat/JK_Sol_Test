<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CandidateController extends Controller
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
        $resume = $request->file('resume');
        $img_name = rand(10,9999).$resume->getClientOriginalName();
        $path = public_path().'/uploads/resume/';

        $user = new User;
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->education = $request->education;
        $user->skill = $request->skill;
        $user->department = $request->department;
        $user->time = $request->time;
        $user->total_question = 0;
        $user->test_type = $request->test_type;
        $user->status = 0;
        $user->resume = $img_name;
        $user->current_salary = $request->current_salary;
        $user->expected_salary = $request->expected_salary;
        $user->notice_period = $request->notice_period;
        $user->total_experience = $request->total_experience;
        $user->role = 2;
        $user->save();

        $resume->move($path,$img_name);

        return response()->json(['status' => 1,'msg' => 'Successful Candidate Added..']);
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
    public function edit(Request $request)
    {
        $candidate = User::find($request->c_id);
        $view = view("edit-candidate")->with('candidate', $candidate)->render();
        
        return response()->json(['status' => 1,'html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->c_id);

        if ($user->resume != null || $user->resume != "") {

            if (file_exists(public_path('uploads/resume/'.$user->resume))) {
                unlink('uploads/resume/'.$user->resume);
            }
        }
        $user->delete();
        return response()->json(['status' => 1,'msg' => 'Candidate Deleted Successfully..']);
    }
}
