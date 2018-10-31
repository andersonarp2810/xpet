@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="pet/create">Registrar novo pet</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @forelse($pets as $pet)
                    {{$pet->name}}
                @empty
                    Num tem cachorro aqui não
                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
