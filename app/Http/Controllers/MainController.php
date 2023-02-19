<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $data = Main::first();
            return view('pages.dashboard', ['data' => $data]);
        
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
    public function show()
    {
        $data = Main::first();
        return view('pages.index', ['data' => $data]);

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
    public function update(Request $request)
    {
        //
        /* echo 404;
        exit; */
        
        $this->validate($request, [
            'name' => 'required|string',
            'title' => 'required|string',
        ]);
        
        $data = Main::first();
        $data->name = $request->name;
        $data->title = $request->title;
        //$data->bg_image = $request->file('image');
       /*  echo 404;
        exit; */
        /* if($request->file('bg_image')) {
            $bg_img = $request->file('bg_image');
            $bg_img -> storeAs('public/img/hero-bg.jpg' . $bg_img-> getClientOriginalExtension());
            $data->bg_image = 'storage/img/hero-bg.jpg.' . $bg_img-> getClientOriginalExtension();
        } */
        //dd($request->hasFile('image'));
        //dd($_POST);
        if($request->hasFile('image')){
            /* echo "Ok";
            exit; */
            $img_file = $request->file('image');
            $img_file->storeAs('public/img/','image.' . $img_file->getClientOriginalExtension());
           
            $data->bg_image = 'public/img/image.' . $img_file->getClientOriginalExtension();
        }
        if($request->hasFile('resume')){
            $resume = $request->file('resume');
            $resume->storeAs('public/pdf/','resume.' . $resume->getClientOriginalExtension());
            $data->resume = 'storage/pdf/resume.' . $resume->getClientOriginalExtension();
        }

        $data->save();
        return redirect()->route('admin')->with('success', "Data has been updated successfully!");

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
