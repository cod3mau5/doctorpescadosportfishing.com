<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isFisherman');
    }

    public function index()
    {
        return view('panel.admin.index');
    }

    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show($id)
    // {
    //     //
    // }


    // public function edit($id)
    // {
    //     //
    // }


    // public function update(Request $request, $id)
    // {
    //     //
    // }


    // public function destroy($id)
    // {
    //     //
    // }
}
