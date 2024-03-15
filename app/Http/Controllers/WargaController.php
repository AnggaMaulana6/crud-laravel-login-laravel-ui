<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(){
        $warga = Warga::all();
        return view('warga.index', compact(['warga']));
    }
    public function create(){
        return view('warga.create');
    }
    public function store(Request $request){
        Warga::create($request->except(['_token','submit']));
        return redirect('/warga');
    }
    public function edit($id){
        $warga = Warga::find($id);
        return view('/warga.edit', compact(['warga']));
    }
    public function update(Request $request, $id){
        $warga = Warga::findOrFail($id);
       $warga->update($request->except(['_token','submit']));
       return redirect('/warga');
    }
    public function destroy($id){
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect('/warga');
    }
}
