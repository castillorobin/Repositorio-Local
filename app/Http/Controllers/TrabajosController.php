<?php

namespace App\Http\Controllers;

use App\Models\Trabajos;
use Illuminate\Http\Request;

class TrabajosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajo = Trabajos::all();
        return view('trabajos.index', compact('trabajo') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajos.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trabajo = request()->except('_token');
        if($request->hasFile('archivo')){
           // $trabajo['archivo'] = $request->file('archivo')->store('archivos');
            $trabajo['archivo'] = $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('archivosPDF', $trabajo['archivo']);
        }
        Trabajos::insert($trabajo);
        //return response()->json($trabajo);
        return redirect()->route('trabajos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajos  $trabajos
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajos $trabajos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabajos  $trabajos
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajos $trabajos)
    {
        return view('trabajos.editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajos  $trabajos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajos $trabajos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajos  $trabajos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajos $trabajos)
    {
        //
    }
}
