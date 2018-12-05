<!-- modal propostas direita -->
<div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h6 class="heading lead"><strong>Solicitações</strong></h6>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                    <p><strong>Pendentes</strong></p>
                </div>
                <ul class="list-group z-depth-0">
                    @forelse($solicitations as $solicitation)
                        @if($solicitation->status == 'pendente')
                        
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <h6><strong>De:</strong></h6>
                                    <a href="/pet/profile/{{$solicitation->requesters_pet->id}}">
                                        <li class="list-group-item list-group-item-action waves-effect justify-content">
                                            <h6><strong>Pet:</strong> {{ $solicitation->requesters_pet->name }}</h6>
                                            <h6><strong>Raça:</strong> {{ $solicitation->requesters_pet->race }}</h6>
                                        </li>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <h6><strong>Para:</strong></h6>
                                    <a href="/pet/profile/{{$solicitation->requested_pet->id}}">
                                        <li class="list-group-item list-group-item-action waves-effect justify-content-between">
                                            <h6><strong>Pet:</strong> {{ $solicitation->requested_pet->name }}</h6>
                                            <h6><strong>Raça:</strong> {{ $solicitation->requested_pet->race }}</h6>
                                        </li>
                                    </a>
                                </div>
                            </div> <!--row-->
                            @if(Auth::User()->id == $solicitation->requested->id)
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="text-center">
                                        <form method="POST" action="{{ route('solicitation.update', ['solicitation' => $solicitation]) }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="status" value="aceito" >
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                Aceitar
                                                <i class="fa fa-check ml-1 animated rotateIn"></i>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('solicitation.update', ['solicitation' => $solicitation]) }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="status" value="recusado" >
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Recusar
                                                <i class="fa fa-times ml-1 animated rotateIn"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @empty
                    <div class="text-center mt-3">
                        <p>Não há solicitações.</p>
                    </div>
                        
                    @endforelse

                    <hr style="box-sizing:border-box;">

                    <div class="text-center mt-3">
                        <p><strong>Aceitos</strong></p>
                    </div>

                    @forelse($solicitations as $solicitation)
                        @if($solicitation->status == 'aceito')
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <h6>De:</h6>
                                <a href="/pet/profile/{{$solicitation->requesters_pet->id}}">
                                    <li class="list-group-item list-group-item-action waves-effect justify-content-between">
                                        <h6>Nome:</strong> {{ $solicitation->requesters_pet->name }}</h6>
                                        <h6>Raça:</strong> {{ $solicitation->requesters_pet->race }}</h6>
                                    </li>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <h6>Para:</h6>
                                <a href="/pet/profile/{{$solicitation->requested_pet->id}}">
                                    <li class="list-group-item list-group-item-action waves-effect justify-content-between">
                                        <h6>Nome:</strong> {{ $solicitation->requested_pet->name }}</h6>
                                        <h6>Raça:</strong> {{ $solicitation->requested_pet->race }}</h6>
                                    </li>
                                </a>
                            </div>
                        </div>
                        @endif

                    @empty
                    <div class="text-center mt-3">
                        <p>Não há solicitações.</p>
                    </div>
                    
                    @endforelse
                </ul>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <!-- <a role="button" class="btn btn-success">Get it now
                            <i class="fa fa-diamond ml-1"></i>
                        </a>-->
                <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Fechar</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- modal propostas direita -->