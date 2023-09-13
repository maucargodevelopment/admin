<?php

namespace App\Http\Controllers;

use App\Models\Container;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $containers = Container::all();
        return view('containers.index', ['containers' => $containers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('containers.create');
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
            'no_container'     => 'required',
            'no_seal'   => 'required',
            'volume'   => 'required',
            'vessel'   => 'required'
        ]);
        $container = Container::create([
            'no_container'             => $request->no_container,
            'no_seal'                  => $request->no_seal,
            'volume'                   => $request->volume,
            'vessel'                   => $request->vessel,
            'document_id'              => $request->document_id,
        ]);

        if ($container) {
            return redirect()->route('documents.detail',  $request->document_id)->withSuccess('New container created');
        } else {
            return redirect()->route('documents.detail',  $request->document_id)->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function show(Container $container)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function edit(Container $container)
    {
        return view('containers.edit', [
            'container'  => $container,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Container $container)
    {
        $data = [
            'no_container'             => $request->no_container,
            'no_seal'                  => $request->no_seal,
            'volume'                   => $request->volume,
            'vessel'                   => $request->vessel,
        ];


        $container->update($data);


        return redirect()->route('documents.detail',  $request->document_id)->withSuccess('Container updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function destroy(Container $container)
    {
        $container->delete();
    }

    public function activate(Request $request, Container $container)
    {

        $container->status      = $request->state == "true" ? "Aktif" : "Tidak Aktif";
        $container->update();
        return ['state' => $container->status == "Aktif" ? true : false];
    }
}
