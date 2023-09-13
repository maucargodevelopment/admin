<?php

namespace App\Http\Controllers;

use App\Models\TipeContainer;
use Illuminate\Http\Request;

class TipeContainerController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipecontainer = TipeContainer::all();
        return view('tipecontainers.index', ['tipecontainers' => $tipecontainer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipecontainers.create');
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
            'no_container' => 'required',
            // 'volume' => 'volume',
            // 'vessel' => 'vessel',
        ]);

        $tipecontainer = TipeContainer::create([
            'no_container' => $request->no_container,
            'volume' => $request->volume,
            'vessel' => $request->vessel,
        ]);

        if ($tipecontainer) {
            return redirect()->route('tipecontainers.index', $tipecontainer)->withSuccess('New role created');
        } else {
            return redirect()->route('tipecontainers.index')->with(['error' => 'Failed Insert Data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipeContainer  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipeContainer  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipecontainer $tipecontainer)
    {
        return view('tipecontainers.edit', [
            'tipecontainer'  => $tipecontainer, 'tipecontainers' => Tipecontainer::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipeContainer  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeContainer $tipecontainer)
    {
        $data = [
            'no_container' => $request->no_container,
            'volume' => $request->volume,
            'vessel' => $request->vessel,
        ];

        $tipecontainer->update($data);
        return redirect()->route('tipecontainers.index', $tipecontainer)->withSuccess('Role updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipecontainer  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipecontainer $tipecontainer)
    {
        $tipecontainer->delete();
    }
}
