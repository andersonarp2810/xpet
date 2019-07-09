@extends('layouts.base')
@section('content')

<div class="">
    <div class="row justify-content-center">
        <button class="btn btn-info col-sm-10 col-md-4" data-toggle="modal" data-target="#modal-create">
            Novo Pet <i class="fas fa-plus"></i>
        </button>
    </div>

    <hr class="mt-5 mb-5" />
    <div class="row">
        @foreach($pets as $pet)
        <div class="col-sm-12 col-lg-4 mb-4">
            <div class="card card-cascade wider">
                @include('layouts.pet-card-image', ['pet' => $pet])
                <div class="card-body card-body-cascade text-center">
                    <h3 class="card-title">{{$pet->name}}</h3>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <button class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">
                                Editar <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <form method="POST" action="{{ route('pet.delete', ['pet' => $pet]) }}" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-block">
                                    Excluir <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <section>
                    @include('layouts.pet-form', ['pet' => null])
                    @foreach($pets as $pet)
                    @include('layouts.pet-form', ['pet' => $pet])
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
