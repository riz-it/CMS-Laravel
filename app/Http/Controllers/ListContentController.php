<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ListContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\ListContent::paginate(5);
        return view('admin.listcontent.index', compact('data', ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = \App\CategoryContent::where('status', 'on')->get();
        return view('admin.listcontent.create', compact('data'));
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
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'closing' => 'required|min:5',
        ]);

        $image = $request->file('image')->store('contents');

        $data = \App\ListContent::create(
            [
                'category' => Str::slug($request->category),
                'title' => $request->title,
                'description' => $request->description,
                'closing' => $request->closing,
                'image' => $image
            ]
        );
        return redirect()->route('listcontent.index')->with('success', 'Content has been created !');
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
        $category = \App\CategoryContent::where('status', 'on')->get();
        $data = \App\ListContent::findorfail($id);
        return view('admin.listcontent.edit', compact('category','data'));
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
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'closing' => 'required|min:5',
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);

        $dataImages = $request->image;
        if(!$dataImages){
            $data1 = \App\ListContent::where('id', $id)->first();
            $dataImage = $data1->image;

            $data = [
                'category' => Str::slug($request->category),
                'title' => $request->title,
                'description' => $request->description,
                'closing' => $request->closing,
                'image' => $dataImage
        ];
        \App\ListContent::whereid($id)->update($data);
        
        return redirect()->route('listcontent.index')->with('success', 'Content has been updated !');

        }else{

            $image = $request->file('image')->store('contents');
            
            $data = [
                'category' => Str::slug($request->category),
                'title' => $request->title,
                'description' => $request->description,
                'closing' => $request->closing,
                'image' => $image
            ];

            $data1 = \App\ListContent::where('id', $id)->first();
            $dataImage = $data1->image;
            Storage::delete($dataImage);

            \App\ListContent::whereid($id)->update($data);
        
            return redirect()->route('listcontent.index')->with('success', 'Content has been updated !');
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
        $category = \App\ListContent::findorfail($id);
        $data = \App\ListContent::where('id', $id)->first();
        $dataImage = $data->image;
        Storage::delete($dataImage);
        $category->delete();
        return redirect()->route('listcontent.index')->with('success', 'Content has been deleted !');
    }
}
