<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $siswa = Siswa::all();
        return view('siswa.index', compact(['siswa']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|max:20',
            'name' => 'required|max:100',
            'class' => 'required|max:20',
            'major' => 'required|max:50',
            'gender' => 'required|in:L,P',
            'address' => 'nullable',
            'foto' => 'nullable|image|max:2048',
        ], [
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.max' => 'Ukuran file foto tidak boleh melebihi 2MB.',
        ]);
    
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto', 'public');
            $validated['foto'] = $foto;
        }
    
        Siswa::create($validated);
        
        return redirect('/siswa');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('/siswa.edit', compact(['siswa']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, $id)
        {
        $siswa = Siswa::findOrFail($id);
        
        $validateData = $request->validate([
            'nis' => 'required|max:20',
            'name' => 'required|max:100',
            'class' => 'required|max:20',
            'major' => 'required|max:50',
            'gender' => 'required|in:L,P',
            'address' => 'nullable',
            'foto' => 'nullable|image|max:2048',
        ], [
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.max' => 'Ukuran file foto tidak boleh melebihi 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            if ($siswa->foto) {
                Storage::delete('public/' . $siswa->foto); // Hapus foto lama jika ada
            }
            $foto = $request->file('foto')->store('public/foto'); // Simpan foto baru ke direktori 'public/foto'
            $validateData['foto'] = $foto;
        }

        $siswa->update(($validateData));

        return redirect('/siswa');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if($siswa->foto){
            Storage::delete($siswa->foto);
        }
        $siswa->delete();

        return redirect('/siswa');
    }
    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
