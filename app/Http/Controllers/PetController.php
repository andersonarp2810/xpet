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
            'color' => $request->color,
            'gender' => $request->gender,
            'pedigree' => $request->pedigree,
            'description' => $request->description ? $request->description : '',
            'user_id' => $request->user_id,
        ]);

        //dd($pet);
        $pet->save();

        if ($request['images'] != null) {
            $this->photoService->store($request, $pet->id);
        }

        return redirect('/home')->with('status', 'Pet cadastrado com sucesso!');
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
        $user = Auth::user();
        
        $address = null;
        $phones = [];
        $solicitations = [];

        if ($user->id == $pet->user_id) { //dono
            $phones = $user->phones;
            $address = $user->address;
            $solicitations = Solicitation::all()->where('requesters_pet_id', $pet->id)->merge(Solicitation::all()->where('requesteds_pet_id', $pet->id));
        } else { // se solicitação aceita
            $solicitations = Solicitation::all()->where('requester_user_id', $user->id)->where('requesteds_pet_id', $pet->id);
            $solicitations = $solicitations->merge(Solicitation::all()->where('requested_user_id', $user->id)->where('requesters_pet_id', $pet->id));
            
            $accept = $solicitations->where('status', 'aceito');

            if ($pet->user->public_contact_info || count($accept) > 0){
                $address = $pet->user->address;
                $phones = $pet->user->phones;
            }
        }

        return view('pet.profile',
            [ 
                'pet' => $pet,
                'phones' => $phones,
                'address' => $address,
                'solicitations' => $solicitations,
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
        return redirect('/pets');
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
        $photos = $pet->photos;

        foreach ($photos as $photo) {
            $this->photoService->destroy($photo);
        }

        $pet->delete();

        return redirect('/pets');
    }

    public function addPhoto(Request $request, Pet $pet)
    {
        $this->authorize('isOwner', $pet);

        if ($request['images'] != null) {
            $this->photoService->store($request, $pet->id);
        }

        return redirect()->back();
    }

    public function destroyPhoto(Pet $pet, \App\Photo $photo)
    {
        $this->authorize('isOwner', $pet);

        $this->photoService->destroy($photo);

        return redirect()->back();
    }
}
