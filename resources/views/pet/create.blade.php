@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo Pet</div>

                <div class="card-body">
                        <form method="POST" action="{{ route('pet.store') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="race" class="col-md-4 col-form-label text-md-right">{{ __('Raça') }}</label>
        
                                    <div class="col-md-6">
                                        Tem que mudar pra um select
                                        <input id="race" type="text" class="form-control{{ $errors->has('race') ? ' is-invalid' : '' }}" name="race" value="{{ old('race') }}" required>
        
                                        @if ($errors->has('race'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('race') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Tamanho') }}</label>
        
                                    <div class="col-md-6">
                                        
                                        <select name="size" id="size" class="form-control{{ $errors->has('size') ? ' is-invalid' : '' }}" value="{{ old('size') }}" required >
                                            <option value="" disabled selected>Selecionar</option>
                                            <option value="Micro">Micro</option>
                                            <option value="Pequeno">Pequeno</option>
                                            <option value="Médio">Médio</option>
                                            <option value="Grande">Grande</option>
                                            <option value="Gigante">Gigante</option>
                                        </select>
        
                                        @if ($errors->has('size'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('size') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Cor') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ old('color') }}">
        
                                        @if ($errors->has('color'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('color') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gênero') }}</label>
        
                                    <div class="col-md-6">
                                        
                                        <select name="gender" id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="{{ old('gender') }}" required >
                                            <option value="" disabled selected>Selecionar</option>
                                            <option value="Macho">Macho</option>
                                            <option value="Fêmea">Fêmea</option>
                                        </select>
        
                                        @if ($errors->has('gender'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="pedigree" class="col-md-4 col-form-label text-md-right">{{ __('Pedigree') }}</label>
        
                                    <div class="col-md-6">
                                        <select name="pedigree" id="pedigree" class="form-control{{ $errors->has('pedigree') ? ' is-invalid' : '' }}" value="{{ old('pedigree') }}" required >
                                            <option value="" disabled selected>Selecionar</option>
                                            <option value="true">Sim</option>
                                            <option value="false">Não</option>
                                        </select>

        
                                        @if ($errors->has('pedigree'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pedigree') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
        
                                    <div class="col-md-6">
                                        <textarea name="description" id="description" cols="30" rows="3" style="resize: vertical" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description') }}" ></textarea>
        
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Imagens') }}</label>
        
                                    <div class="col-md-6">
                                        <input type="file" name="images" id="images" accept="image/*" multiple class="form-control{{ $errors->has('images') ? ' is-invalid' : '' }}" value="{{ old('images') }}">
        
                                        @if ($errors->has('images'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('images') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
