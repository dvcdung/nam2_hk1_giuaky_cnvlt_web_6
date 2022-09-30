<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staffs = DB::select("select * from nhanvien");
        return view('StaffManagement/show_staff_list', ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset($_POST['act']) && $_POST['act'] === "add") {
            $tennhanvien = filter_input(INPUT_POST, 'tennhanvien');
            try {
                DB::insert("insert into nhanvien (id, tennhanvien) values (null, '$tennhanvien')");
                return redirect()->route('staff-management.index');
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return view('StaffManagement/add_staff');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        if(isset($_POST['act']) && $_POST['act'] === "save") {
            try {
                DB::update("update nhanvien set tennhanvien='". $_POST['object']['tennhanvien'] ."' where id = ". $_POST['object']['id']);
                return redirect()->route('staff-management.index');
            } catch (\Throwable $th) {
                //throw $th;
            }
        }else {
            $id = $request->input('id');
            try {
                $object = DB::select("select * from nhanvien where id = $id");
                return view('StaffManagement/update_staff', ['object' => $object[0]]);
            } catch (\Throwable $th) {
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try {
            DB::delete("delete from nhanvien where id = $id");
        } catch (\Throwable $th) {
        }
        return redirect()->route('staff-management.index');
    }

    public function resetTable() {
        try {
            DB::delete("delete from nhanvien");

        } catch (\Throwable $th) {
            //throw $th;
        }    
        return redirect()->route('staff-management.index');
    }

    public function search(Request $request) {
        $pattern = trim($request->input('pattern'));
        try {
            $staffs = DB::select("select * from nhanvien where id=? or tennhanvien=?", [$pattern, $pattern]);
            return view('StaffManagement/show_staff_list', ['staffs' => $staffs]);
        } catch (\Throwable $th) {
            
        }
    }
}
