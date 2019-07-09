<div class="modal fade" id="{{ $pet ? 'modal-edit-' . $pet->id : 'modal-create'}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="mt-3">{{$pet ? 'Editar' : 'Novo'}} Pet</h1>
                <p><i class="fa-4x fa-bone fas deep-orange-text animated rotateIn"></i></p>
            </div>
            <div class="modal-body mb-1">
                <form class="row" method="POST" action="{{ $pet ? route('pet.update',  ['pet' => $pet->id]) : route('pet.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="col-sm-12 mb-3">
                        <label for="name" class="font-weight-bold">{{ __('Nome') }}</label>
                        <input id="{{ $pet ? 'name-' . $pet->id : 'name'}}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $pet ? $pet->name : old('name') }}" {{ $pet ? '' : 'required' }} autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="race" class="font-weight-bold">{{ __('Raça') }}</label>
                        <select name="race" id="{{ $pet ? 'race-' . $pet->id : 'race'}}" class="form-control {{ $errors->has('race') ? ' is-invalid' : '' }}" value="{{ $pet ? $pet->race : old('race') }}" {{ $pet ? '' : 'required' }} " required>
                            <option value=" {{ $pet ? $pet->race : '' }}" disabled selected>{{ $pet ? $pet->race : 'Selecione' }}</option>
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
                        @if ($errors->has('race'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('race') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="size" class="font-weight-bold">{{ __('Tamanho') }}</label>
                        <select name="size" id="{{ $pet ? 'size-' . $pet->id : 'size'}}" class="form-control {{ $errors->has('size') ? ' is-invalid' : '' }}" value="{{ $pet ? $pet->size : old('size') }}" {{ $pet ? '' : 'required' }}>
                            <option value="{{$pet ? $pet->size : ''}}" disabled selected>{{ $pet ? $pet->size : 'Selecione' }}</option>
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

                    <div class="col-sm-6 mb-3">
                        <label for="gender" class="font-weight-bold">{{ __('Gênero') }}</label>
                        <select name="gender" id="{{ $pet? 'gender-' . $pet->id : 'gender'}}" class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" value="{{ $pet ? $pet->gender : old('gender') }}" {{ $pet ? '' : 'required' }}>
                            <option value="{{$pet ? $pet->gender : ''}}" disabled selected>{{ $pet ? $pet->gender : 'Selecione' }}</option>
                            <option value="Macho">Macho</option>
                            <option value="Fêmea">Fêmea</option>
                        </select>
                        @if ($errors->has('gender'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="color" class="font-weight-bold">{{ __('Cor') }}</label>
                        <input id="{{ $pet? 'color-' . $pet->id : 'color'}}" type="text" class="form-control {{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ $pet ? $pet->color : old('color') }}">
                        @if ($errors->has('color'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('color') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="pedigree" class="font-weight-bold">{{ __('Pedigree') }}</label>
                        <select name="pedigree" id="{{ $pet? 'pedigree-' . $pet->id : 'pedigree'}}" class="form-control {{ $errors->has('pedigree') ? ' is-invalid' : '' }}" value="{{ old('pedigree') }}" {{ $pet ? '' : 'required' }}>
                            <option value="{{ $pet ? $pet->pedigree : '' }}" disabled selected>{{ $pet ? $pet->pedigree ? 'Sim' : 'Não' : 'Selecione' }}</option>
                            <option value="true">Sim</option>
                            <option value="false">Não</option>
                        </select>
                        @if ($errors->has('pedigree'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pedigree') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label for="description" class="font-weight-bold">{{ __('Descrição') }}</label>
                        <textarea name="description" id="{{ $pet? 'description-' . $pet->id : 'description'}}" cols="30" rows="3" style="resize: vertical" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ $pet ? $pet->description : old('description') }}">{{ $pet ? $pet->description : '' }}</textarea>
                        @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>

                    @if($pet == null)
                    <div class="col-sm-12 mb-3">
                        <label for="images" class="font-weight-bold">{{ __('Imagens') }}</label>
                        <input type="file" name="images[]" id="{{ $pet? 'images-' . $pet->id : 'images'}}" accept="image/*" multiple class="form-control{{ $errors->has('images') ? ' is-invalid' : '' }}" value="{{ old('images') }}">
                        @if ($errors->has('images'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('images') }}</strong>
                        </span>
                        @endif
                    </div>
                    @endif

                    <div class="col-sm-3 col-lg-4"></div>
                    <button type="submit" class="btn btn-info col-sm-6 col-lg-4 mt-3">
                        {{ $pet ? 'Editar ' : 'Cadastrar ' }}
                        @if($pet == null)
                        <i class="fas fa-plus"></i>
                        @else
                        <i class="fas fa-edit"></i>
                        @endif
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
