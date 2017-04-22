<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = \App\Jurusan::all(); // mengambil semua data kendaraan

      	return view('crud.jurusan.view', compact('jurusans')); // melempar data ke view
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validate = \Validator::make($request->all(), [
    			'nama_jurusan' => 'required'
    		],

        $after_save = [
            'alert' => 'danger',
            'title' => 'Oh wait!',
            'text-1' => 'Ada kesalahan',
            'text-2' => 'Silakan coba lagi.'
        ]);

        if($validate->fails()){
            return redirect()->back()->with('after_save', $after_save);
        }

        $after_save = [
            'alert' => 'success',
            'title' => 'God Job!',
            'text-1' => 'Tambah lagi',
            'text-2' => 'Atau kembali.'
        ];

        $data = [
            'nama_jurusan' => $request->nama_jurusan
        ];

        $store = \App\Jurusan::insert($data);

        return redirect()->back()->with('after_save', $after_save);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$showById = \App\Jurusan::find($id);
    	return view('crud.jurusan.edit', compact('showById'));
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
      $validate = \Validator::make($request->all(), [
            'nama_jurusan' => 'required'
        ],

        $after_update = [
            'alert' => 'danger',
            'title' => 'Oh wait!',
            'text-1' => 'Ada kesalahan',
            'text-2' => 'Silakan coba lagi.'
        ]);

        if($validate->fails()){
            return redirect()->back()->with('after_update', $after_update);
        }

        $after_update = [
            'alert' => 'success',
            'title' => 'God Job!',
            'text-1' => 'Update berhasil',
            'text-2' => '.'
        ];

        $data = [
            'nama_jurusan' => $request->nama_jurusan
        ];

        $update = \App\Jurusan::where('id', $id)->update($data);

        return redirect()->to('jurusan')->with('after_update', $after_update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $destroy = \App\Jurusan::findOrFail($id);
      $destroy->delete();
      return redirect()->back()->with('success');
    }
}
