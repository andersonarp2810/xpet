<?php

namespace App\Http\Controllers;

use App\Phone;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\PhoneRequest;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //$user requisitado
        $this->authorize('phone.index', $user);
        $phones = Phone::all()->where('user_id', $user->id);
        return view('phone.index', ['phones' => $phones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('phone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        //
        $phone = new Phone($request->all());
        $this->authorize('create', $phone);
        $phone->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
        $this->authorize('view', $phone);
        return view('phone.show', ['phone' => $phone]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
        $this->authorize('edit', $phone);
        return view('phone.edit', ['phone' => $phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        //
        $this->authorize('update', $phone);
        $phone->update($request->all());

        return redirect()->route('phone.show', [$phone])->with('status', 'Contatos atualizados');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        //
        $this->authorize('destroy', $phone);
        $phone::delete();

        return redirect('/');
    }
}
