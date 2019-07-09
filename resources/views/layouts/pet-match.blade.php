<div class="modal row" id="{{'modal-match'}}" tabindex="-1" role="dialog" aria-hidden="true">
    <<div class="modal-dialog-centered pl-5 pr-5" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="mt-3">Selecione o seu pet</h1>
            </div>
            <div class="modal-body text-center mb-1">
                <form method="POST" action="{{ route('pet.solicitation') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="requester_user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="requested_user_id" value="{{ $pet->user->id }}">
                    <input type="hidden" name="requesteds_pet_id" value="{{ $pet->id }}">
                    <input type="hidden" name="status" value="pendente">

                    <div class="row fadeIn">
                        @forelse (Auth::user()->pet as $pet)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                            <div class="card card-cascade wider">
                                <div class="text-center mt-4">
                                    @include('layouts.pet-card-image', ['pet' => $pet])
                                </div>
                                <div class="card-body card-body-cascade p-4 text-center">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="{{ $pet->id }}" name="requesters_pet_id" value="{{ $pet->id }}">
                                        <label class="custom-control-label" for="{{ $pet->id }}">{{ $pet->name }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty

                        <div class="text-center mt-3">
                            <p>Novo pet.</p>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-create">Cadastrar</button>
                        </div>
                        @endforelse
                    </div>

                    @if(count(Auth::user()->pet) > 0)
                    <div class="text-center">
                        <button type="submit" class="btn btn-info">
                            Solicitar <i class="fa fa-paw ml-1"></i>
                        </button>
                    </div>
                    @endif

                </form>
            </div>
        </div>
</div>
</div>

@include('layouts.pet-form', ['pet' => null])
