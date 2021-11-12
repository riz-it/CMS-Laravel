<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JumbotronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Jumbotron::paginate(6);
        return view('admin.jumbotron.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jumbotron.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'image1' => 'required|image|mimes:jpg,png,jpeg',
            'image2' => 'required|image|mimes:jpg,png,jpeg',
            'image3' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $image = $request->file('image')->store('jumbotrons');
        $image1 = $request->file('image1')->store('jumbotrons/img1');
        $image2 = $request->file('image2')->store('jumbotrons/img2');
        $image3 = $request->file('image3')->store('jumbotrons/img3');

        $data = \App\Jumbotron::create(
            [
                'title'=> $request->title,
                'image' => $image,
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3,
                'date' => date('Y/m/d - H:i:s')
            ]
        );
        return redirect()->route('jumbotron.index')->with('success', 'Jumbotron has been added !');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = \App\Jumbotron::findorfail($id);
        $data = \App\Jumbotron::where('id', $id)->first();
        $dataImage = $data->image;
        Storage::delete($dataImage);
        $category->delete();
        return redirect()->route('jumbotron.index')->with('success', 'Jumbotron has been deleted !');
    }
}
