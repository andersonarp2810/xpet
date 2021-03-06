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
                                        <select name="size" id="race" class="form-control{{ $errors->has('race') ? ' is-invalid' : '' }}" name="race" value="{{ old('race') }}" required>
                                            <option value="" disabled selected>Selecionar</option>
                                            <!-- Letra A -->
                                            <option value="Affenpinscher">Affenpinscher</option>
                                            <option value="Africano">Africano</option>
                                            <option value="Airedale">Airedale</option>
                                            <option value="Akita">Akita</option>
                                            <option value="Appenzeller">Appenzeller</option>
                                            <option value="American-Staffordshire-Terrier">American Staffordshire Terrier</option>
                                            <!-- Letra B -->
                                            <option value="Basenji">Basenji</option>
                                            <option value="Beagle">Beagle</option>
                                            <option value="Bluetick">Bluetick</option>
                                            <option value="Borzoi">Borzoi</option>
                                            <option value="Bouvier">Bouvier</option>
                                            <option value="Boxer">Boxer</option>
                                            <option value="Brabancon">Brabancon</option>
                                            <option value="Briard">Briard</option>
                                            <option value="Bulldog">Bulldog</option>
                                            <option value="Bulldog-Boston">Bulldog Boston</option>
                                            <option value="Bulldog-Francês">Bulldog Francês</option>
                                            <option value="Bull-Terrier">Médio</option>
                                            <option value="Bull-Terrier-Staffordshire">Bull Terrier Staffordshire</option>
                                            <option value="Bichon-Frisé">Bichon Frisé</option>
                                            <option value="Basset-Hound">Basset Hound</option>
                                            <option value="Bulmastife">Bulmastife</option>
                                            <option value="Boiadeiro-Bernês">Boiadeiro Bernês</option>
                                            <option value="Boiadeiro-Suíço">Boiadeiro Suíço</option>
                                            <option value="Braco-Alemão-de-pelo-longo">Braco alemão de pelo longo</option>
                                            <option value="Braco-Alemão-de-pelo-curto">Braco alemão de pelo curto</option>
                                            <option value="Bedlington-Terrier">Bedlington Terrier</option>
                                            <option value="Border-Terrie">Border Terrie</option>
                                            <!-- Letra C -->
                                            <option value="Cairn-Terrier">Cairn Terrier</option>
                                            <option value="Cattledog-Australiano">Cattledog Australiano</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="Chow-chow">Chow-chow</option>
                                            <option value="Clumber-Spaniel">Clumber Spaniel</option>
                                            <option value="Cockapoo">Cockapoo</option>
                                            <option value="Collie">Collie</option>
                                            <option value="Collie-Border">Collie Border</option>
                                            <option value="Coonhound">Coonhound</option>
                                            <option value="Corgi">Corgi</option>
                                            <option value="Corgi-Cardigan">Corgi Cardigan</option>
                                            <option value="Coton-de-Tulear">Coton de Tulear</option>
                                            <option value="Cão-de-Santo-Humberto">Cão de Santo Humberto</option>
                                            <option value="Coonhound-Inglês">Coonhound Inglês</option>
                                            <option value="Cão-de-Montanha-dos-Pirenéus">Cão de Montanha dos Pirenéus</option>
                                            <option value="Chesapeake-Bay-Retriever">Chesapeake Bay Retriever</option>
                                            <option value="Curly-Coated-Retriever">Curly Coated Retriever</option>
                                            <option value="Cão-d'água-Irlandês">Cão d'água Irlandês</option>
                                            <option value="Cocker-Spaniel-inglês">Cocker Spaniel inglês</option>
                                            <option value="Cavalier-King-Charles-Spaniel">Cavalier King Charles Spaniel</option>
                                            <!-- Letra D -->
                                            <option value="Dachshund">Dachshund</option>
                                            <option value="Dálmata">Dálmata</option>
                                            <option value="Dogue-Alemão">Dogue Alemão</option>
                                            <option value="Deerhound">Deerhound</option>
                                            <option value="Dhole">Dhole</option>
                                            <option value="Dingo">Dingo</option>
                                            <option value="Doberman">Doberman</option>
                                            <option value="Dandie-Dinmont-Derrier">Dandie Dinmont Derrier</option>
                                            <!-- Letra E -->
                                            <option value="Elkhound">Elkhound</option>
                                            <option value="Entlebucher">Entlebucher</option>
                                            <option value="Eskimo">Eskimo</option>
                                            <!-- Letra F -->
                                            <option value="Flat-Coated-Retriever">Flat-coated Retriever</option>
                                            <option value="Fox-Terrier-de-pelo-duro">Fox Terrier de pelo duro</option>
                                            <!-- Letra G -->
                                            <option value="Galgo-Espanhol">Galgo Espanhol</option>
                                            <option value="Galgo-Italiano">Galgo Italiano</option>
                                            <option value="Galgo-Afegão">Galgo Afegão</option>
                                            <option value="Golden-Retriever">Golden Retriever</option>
                                            <!-- Letra H -->
                                            <option value="Husky">Husky</option>
                                            <!-- Letra I -->
                                            <option value="Ibizan-Hound">Ibizan Hound</option>
                                            <!-- Letra J -->
                                            <option value="Jack-Russell-Terrier">Jack Russell Terrier</option>
                                             <!-- Letra K -->
                                            <option value="Keeshond">Keeshond</option>
                                            <option value="Kelpie">Kelpie</option>
                                            <option value="Komondor">Komondor</option>
                                            <option value="Kuvasz">Kuvasz</option>
                                            <option value="Kerry-Blue-Terrier">Kerry Blue Terrier</option>
                                             <!-- Letra L -->
                                            <option value="Labrador">Labrador</option>
                                            <option value="Leonberg">Leonberg</option>
                                            <option value="Lhasa-Apso">Lhasa Apso</option>
                                            <option value="Lakeland-Terrier">Lakeland Terrier</option>
                                             <!-- Letra M -->
                                            <option value="Malamute-do-Alasca">Malamute-do-Alasca</option>
                                            <option value="Maltês">Maltês</option>
                                            <option value="Mastiff-Tibetano">Mastiff Tibetano</option>
                                            <option value="Mexican-Hairless">Mexican Hairless</option>
                                            <option value="Manchester-Terrier">Manchester Terrier</option>
                                             <!-- Letra N -->
                                            <option value="Norfolk-Terrier">Norfolk Terrier</option>
                                            <option value="Norwich-Terrier">Norwich Terrier</option>
                                            <!-- Letra O -->
                                            <option value="Otterhound">Otterhound</option>
                                            <option value="Old-English-Sheepdog">Old English Sheepdog</option>
                                             <!-- Letra P -->
                                            <option value="Pastor-Alemão">Pastor Alemão</option>
                                            <option value="Pastor-Belga-Malinois">Pastor Belga Malinois</option>
                                            <option value="Pastor-Belga-Groenendael">Pastor Belga Groenendael</option>
                                            <option value="Pequinês">Pequinês</option>
                                            <option value="Pinscher">Pinscher</option>
                                            <option value="Pinscher-Miniatura">Pinscher Miniatura</option>
                                            <option value="Pointer-Inglês">Pointer Inglês</option>
                                            <option value="Poodle-Miniatura">Poodle Miniatura</option>
                                            <option value="Poodle-Padrão">Poodle Padrão</option>
                                            <option value="Poodle-Toy">Poodle Toy</option>
                                            <option value="Pug">Pug</option>
                                            <option value="Puggle">Puggle</option>
                                            <option value="Pastor-de-Shetland">Pastor de Shetland</option>
                                            <option value="Patterdale-Terrier">Patterdale Terrier</option>
                                             <!-- Letra R -->
                                            <option value="Redbone-Coonhound">Redbone Coonhound</option>
                                            <option value="Rhodesian-Ridgeback">Rhodesian Ridgeback</option>
                                            <option value="Rottweiler">Rottweiler</option>
                                             <!-- Letra S -->
                                            <option value="Spaniel-Anão-Continental">Spaniel Anão Continental</option>
                                            <option value="Saluki">Saluki</option>
                                            <option value="Samoieda">Samoieda</option>
                                            <option value="Schipperke">Schipperke</option>
                                            <option value="Schnauzer-Gigante">Schnauzer Gigante</option>
                                            <option value="Schnauzer-Miniatura">Schnauzer Miniatura</option>
                                            <option value="Setter-Inglês">Setter Inglês</option>
                                            <option value="Setter-Gordon">Setter Gordon</option>
                                            <option value="Setter-Irlandês">Setter Irlandês</option>
                                            <option value="Shiba-Inu">Shiba Inu</option>
                                            <option value="Shih-tzu">Shih-tzu</option>
                                            <option value="Springer-Spaniel-de-Gales">Springer Spaniel de Gales</option>
                                            <option value="Sussex-Spaniel">Sussex Spaniel</option>
                                            <option value="Spaniel-Japonês">Spaniel-Japonês</option>
                                            <option value="Springer-Spaniel-Galês">Springer Spaniel Galês</option>
                                            <option value="Springer-Spaniel-Inglês">Springer Spaniel Inglês</option>
                                            <option value="São-Bernardo">São Bernardo</option>
                                            <option value="Sealyham-Terrier">Sealyham Terrier</option>
                                            <option value="Soft-Coated-Wheaten-Terrier">Soft Coated Wheaten Terrier</option>
                                            <option value="Silky-Terrier">Silky Terrier</option>
                                             <!-- Letra T -->
                                            <option value="Treeing-Walker-Coonhound">Treeing Walker Coonhound</option>
                                            <option value="Terra-Nova">Terra-Nova</option>
                                            <option value="Terrier-Australiano">Terrier Australiano</option>
                                            <option value="Terrier-Irlandês">Terrier Irlandês</option>
                                            <option value="Terrier-Escocês">Terrier Escocês</option>
                                            <option value="Terrier-Tibetano">Terrier Tibetano</option>
                                             <!-- Letra V -->
                                            <option value="Vira-lata">Vira-lata</option>
                                            <option value="Vizsla">Vizsla</option>
                                            <!-- Letra W z -->
                                            <option value="Welsh-Corgi-Pembroke">Welsh Corgi Pembroke</option>
                                            <option value="West-Highland-White-Terrier">West Highland White Terrie</option>
                                            <option value="Weimaraner">Weimaraner</option>
                                            <option value="Whippet">Whippet</option>
                                            <option value="Wolfhound-Irlandês">Wolfhound Irlandês</option>
                                             <!-- Letra Y -->
                                            <option value="Yorkshire-Terrier">Yorkshire Terrier</option>
                                            <!-- Letra Z -->
                                            <option value="Zwergspitz">Zwergspitz</option>

                                        </select>
                                        <!--<input id="race" type="text" class="form-control{{ $errors->has('race') ? ' is-invalid' : '' }}" name="race" value="{{ old('race') }}" required> -->

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
