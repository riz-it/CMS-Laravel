<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ListProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\ListProduct::paginate(5);
        return view('admin.listproduct.index', compact('data', ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = \App\CategoryProduct::where('status', 'on')->get();
        return view('admin.listproduct.create', compact('data'));
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
            'category' => 'required',
            'name' => 'required|min:3',
            'price' => 'required',
            'description' => 'required|min:5',
        ]);

        $image = $request->file('image')->store('products');

        $data = \App\ListProduct::create(
            [
                'category' => Str::slug($request->category),
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $image
            ]
        );
        return redirect()->route('listproduct.index')->with('success', 'Product has been created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = \App\CategoryProduct::where('status', 'on')->get();
        $data = \App\ListProduct::findorfail($id);
        return view('admin.listproduct.show', compact('category','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = \App\CategoryProduct::where('status', 'on')->get();
        $data = \App\ListProduct::findorfail($id);
        return view('admin.listproduct.edit', compact('category','data'));
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
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required|min:3',
            'price' => 'required',
            'description' => 'required|min:5',
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);

        $check = $request->image;
        if(!$check){
            $data = \App\listProduct::where('id', $id)->first();
            $dataImage = $data->image;
            $data =
            [
                'category' => Str::slug($request->category),
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $dataImage
            ];

        \App\ListProduct::whereid($id)->update($data);

        return redirect()->route('listproduct.index')->with('success', 'Product has been updated !');
        }else{
            $image = $request->file('image')->store('products');
            $data =
            [
                'category' => Str::slug($request->category),
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $image
            ];

            $data1 = \App\listProduct::where('id', $id)->first();
            $dataImage = $data1->image;
            Storage::delete($dataImage);

        \App\ListProduct::whereid($id)->update($data);

        return redirect()->route('listproduct.index')->with('success', 'Product has been updated !');
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
        $category = \App\listProduct::findorfail($id);
        $data = \App\listProduct::where('id', $id)->first();
        $dataImage = $data->image;
        Storage::delete($dataImage);
        $category->delete();
        return redirect()->route('listproduct.index')->with('success', 'Product has been deleted !');
    }
}
