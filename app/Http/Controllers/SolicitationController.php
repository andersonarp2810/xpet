<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitationRequest;
use App\Solicitation;
use App\User;
use Illuminate\Http\Request;
use Auth;

class SolicitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sent = Solicitation::all()->where('requester_user_id', Auth::user()->id);
        $received = Solicitation::all()->where('requested_user_id', Auth::user()->id);

        return view('solicitation.index', ['sent' => $sent, 'received' => $received]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();

        return view('solicitation.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitationRequest $request)
    {
        //
        $solicitation = new Solicitation($request->all());
        $this->authorize('create', $solicitation);
        $solicitation->save();

        return view('/')->with('status', 'Solicitação enviada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitation  $solicitation
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitation $solicitation)
    {
        //
        $this->authorize('view', $solicitation);

        return view('solicitation.show', ['solicitation' => $solicitation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitation  $solicitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitation $solicitation)
    {
        //
        $this->authorize('update', $solicitation);

        return view('solicitation.edit', ['solicitation' => $solicitation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitation  $solicitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitation $solicitation)
    {
        //
        $this->authorize('update', $solicitation);

        $solicitation->update($request->all());

        return redirect()->route('solicitation.show', [$solicitation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitation  $solicitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitation $solicitation)
    {
        //
        $this->authorize('delete', $solicitation);

        $solicitation->delete();

        return redirect('/')->with('status', 'Solicitação excluída');
    }
}
