<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$mahasiswas = \App\Mahasiswa::all(); // mengambil semua data mahasiswa

    	return view('crud.mahasiswa.view', compact('mahasiswas')); // melempar data ke view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // mengambil semua jurusans untuk di jadikan dropdwon list pemilik di form create

      $jurusans = \App\Jurusan::all();

      // melempar ke view di file create.blade.php yang berada di folder crud/mahasiswa, sekaligus mengirim data jurusan yang disimpan di variable $jurusans

      return view('crud.mahasiswa.create', compact('jurusans'));
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

    	$validate = \Validator::make($request->all(), [
    			'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'jurusan' => 'required'
    		],

            // $after_save adalah isi session ketika form kosong dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan error dan alert warna merah di ambil dari 'alert' => 'danger', dst.

            $after_save = [
                'alert' => 'danger',
                'title' => 'Oh wait!',
                'text-1' => 'Ada kesalahan',
                'text-2' => 'Silakan coba lagi.'
            ]);

        // jika form kosong maka artinya fails() atau gagal di proses, maka di return redirect()->back()->with('after_save', $after_save) artinya page di kembalikan ke form dengan membawa session after_save yang sudah kita deklarasi di atas.

        if($validate->fails()){
            return redirect()->back()->with('after_save', $after_save);
        }

        // $after_save adalah isi session ketika data berhasil disimpan dan di kembalikan lagi ke form dengan membawa session di bawah ini (lihat form bagian part alert), dengan keterangan success dan alert warna merah di ganti menjadi warna hijau di ambil dari 'alert' => 'success', dst.

        $after_save = [
            'alert' => 'success',
            'title' => 'God Job!',
            'text-1' => 'Tambah lagi',
            'text-2' => 'Atau kembali.'
        ];

        // jika form tidak kosong artinya validasi berhasil di lalui maka proses di bawah ini di jalankan, yaitu mengambil semua kiriman dari form
        // nama_kendaraan,jenis_kendaraan,buatan,user_id adalah nama kolom yang ada di table kendaraan
        // sedangkan $request->nama_kendaraan adalah isi dari kiriman form

    	$data = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'jurusan_id' => $request->jurusan
        ];

        // di bawah ini proses insert ke tabel kendaraan

    	$store = \App\Mahasiswa::insert($data);

        // jika berhasil kembalikan ke page form dengan membawa session after_save success.

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
        $jurusans = \App\Jurusan::all();

        $showById = \App\Mahasiswa::find($id);

    	  return view('crud.mahasiswa.edit', compact('showById', 'jurusans'));
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required'
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
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'jurusan_id' => $request->jurusan
        ];

        $update = \App\Mahasiswa::where('id', $id)->update($data);

        return redirect()->to('mahasiswa')->with('after_update', $after_update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $destroy = \App\Mahasiswa::findOrFail($id);
      $destroy->delete();
      return redirect()->back()->with('success');
    }
}
