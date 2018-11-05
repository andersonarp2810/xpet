<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Pet;
use App\Services\PhotoService;
use App\Solicitation;
use Auth;
use Illuminate\Http\Request;

class PetController extends Controller
{

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pets = Pet::all()->where('user_id', Auth::user()->id);
        return view('pet.index', ['pets' => $pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {
        //
        $pet = new Pet([
            'name' => $request->name,
            //'type' => $request->type, // mvp só cachorro
            'race' => $request->race,
            'size' => $request->size,
            'gender' => $request->gender,
            'pedigree' => $request->pedigree,
            'user_id' => $request->user_id,
        ]);
        $this->authorize('isOwner', $pet);

        $pet->save();

        if ($request['images'] != null) {
            $this->photoService->store($request, $pet->id);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
        //logica de ser pode ver contato ou não
        $phones = [];
        $address = null;
        $user = Auth::user();
        if ($user->id == $pet->user_id) { //dono
            $phones = $user->phones;
            $address = $user->address;
        } else if ($pet->user->public_contact_info) {
            $phones = $pet->user->phones;
            $address = $pet->user->address;
        } else { //user autenticado é requisitador
            $solicitations = Solicitation::all()->where('requester_user_id', $user->id)->where('requested_user_id', $pet->user_id)->where('status', 'aceito');
            if (count($solicitations) > 0) {
                $phones = $pet->user->phones;
                $address = $pet->user->address;
            } else { //user autenticado é requisitado
                $solicitations = Solicitation::all()->where('requester_user_id', $pet->user_id)->where('requested_user_id', $user->id)->where('status', 'aceito');
                if (count($solicitations) > 0) {
                    $phones = $pet->user->phones;
                    $address = $pet->user->address;
                } else { // visualização pública
                    $address = $pet->user->address;
                    unset($address['district']);
                    unset($address['street']);
                    unset($address['number']);
                    unset($address['complement']);
                    unset($address['coordinateX']);
                    unset($address['coordinateY']);
                }
            }
        }

        return view('pet.show',
            [
                'pet' => $pet,
                'phones' => $phones,
                'address' => $address,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
        $this->authorize('isOwner', $pet);
        return view('pet.edit', ['pet' => $pet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
        $this->authorize('isOwner', $pet);
        $pet->update($request->all());
        return redirect()->route('pet.show', [$pet])->with('status', 'Pet atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
        $this->authorize('isOwner', $pet);
        $pet->delete();

        return redirect('/');
    }


    public function addPhoto(Request $request, Pet $pet){
        $this->authorize('isOwner', $pet);

        if($request['images'] != null){
            $this->photoService->store($request, $pet->id);
        }

        return redirect()->back();
    }

    public function destroyPhoto($photo_id, Pet $pet){
        $this->authorize('isOwner', $pet);

        $this->photoService->delete($photo_id, $pet->id);

        return redirect()->back();
    }
}
