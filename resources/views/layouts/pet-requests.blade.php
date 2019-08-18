<div class="modal row" id="{{'modal-requests'}}" tabindex="-1" role="dialog" aria-hidden="true">
    @csrf
    <div class="modal-dialog modal-lg modal-dialog-centered pl-5" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="mt-3">Solicitações enviadas por você</h2>
            </div>

            <div class="modal-body mb-1">
                <div class="row wow fadeIn">
                    @foreach ($solicitations as $solicitation)
                        @foreach(Auth::User()->pet as $pet)
                        @if($solicitation->requesters_pet_id == $pet->id)
                        <div class="col-md-4 mb-4">
                            <div class="card card-cascade wider h-75">
                                @include('layouts.pet-card-image', ['pet' => $solicitation->requesters_pet])
                                <div class="card-body card-body-cascade text-center" style="padding: 10px 0px 0px !important">
                                    <h5 class="card-title" style="margin-bottom: 6px !important"><strong>{{ $pet->name }}</strong></h5>
                                    @if($solicitation->status == 'aceito')
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-success" disabled>
                                                Aceito <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-light" disabled>
                                                Pendente <i class="fa fa-hourglass-half"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        @foreach($pets as $pet)
                        @if($solicitation->requesteds_pet_id == $pet->id)
                        <div class="col-md-4 mb-4">
                            <div class="card card-cascade wider h-75">
                                @include('layouts.pet-card-image', ['pet' => $solicitation->requested_pet])
                                <div class="card-body card-body-cascade text-center" style="padding: 10px 0px 0px !important">
                                    <h5 class="card-title" style="margin-bottom: 6px !important"><strong>{{ $pet->name }}</strong></h5>
                                    @if($solicitation->status == 'aceito')
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success" disabled>
                                                Aceito <i class="fas fa-check"></i>
                                            </button>

                                        </div>
                                    </div>
                                    @else
                                    <form method="POST" action="{{ route('solicitation.update', ['solicitation' => $solicitation]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="status" value="aceito">
                                        <button type="submit" class="btn btn-sucess">
                                            Aceitar
                                            <i class="fa fa-check ml-1 animated rotateIn"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('solicitation.update', ['solicitation' => $solicitation]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="status" value="recusado">
                                        <button type="submit" class="btn btn-danger">
                                            Recusar
                                            <i class="fa fa-times ml-1 animated rotateIn"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
            <section>
                @include('layouts.pet-form', ['pet' => null])
            </section>
        </div>
    </div>
</div>
