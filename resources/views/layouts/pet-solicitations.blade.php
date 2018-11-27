<!-- modal propostas direita -->
<div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Solicitações</p>

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
                            <div class="col-lg-6 col-md-12 mb-4">
                                <h6>De:</h6>
                                <li class="list-group-item justify-content-between">
                                    <p>Nome:</strong> {{ $solicitation->requesters_pet->name }}</p>
                                    <p>Raça:</strong> {{ $solicitation->requesters_pet->race }}</p>
                                    <a href="/pet/profile/{{$solicitation->requesters_pet->id}}">
                                        <i class="fa fa-eye animated rotateIn"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-check animated rotateIn"></i>
                                    </a>
                                </li>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <h6>Para:</h6>
                                <li class="list-group-item justify-content-between">
                                    <p>Nome:</strong> {{ $solicitation->requested_pet->name }}</p>
                                    <p>Raça:</strong> {{ $solicitation->requested_pet->race }}</p>
                                    <a href="/pet/profile/{{$solicitation->requested_pet->id}}">
                                        <i class="fa fa-eye animated rotateIn"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-check animated rotateIn"></i>
                                    </a>
                                </li>
                            </div>
                        </div> <!--row-->
                        @endif

                    @empty
                    <div class="text-center mt-3">
                        <p>Não há solicitações.</p>
                    </div>
                        
                    @endforelse
                    
                    <div class="text-center mt-3">
                        <p><strong>Aceitos</strong></p>
                    </div>

                    @forelse($solicitations as $solicitation)
                        @if($solicitation->status == 'aceito')
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <h6>De:</h6>
                                <li class="list-group-item justify-content-between">
                                    <p>Nome:</strong> {{ $solicitation->requesters_pet->name }}</p>
                                    <p>Raça:</strong> {{ $solicitation->requesters_pet->race }}</p>
                                    <a href="/pet/profile/{{$solicitation->requesters_pet->id}}">
                                        <i class="fa fa-eye animated rotateIn"></i>
                                    </a>
                                </li>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <h6>Para:</h6>
                                <li class="list-group-item justify-content-between">
                                    <p>Nome:</strong> {{ $solicitation->requested_pet->name }}</p>
                                    <p>Raça:</strong> {{ $solicitation->requested_pet->race }}</p>
                                    <a href="/pet/profile/{{$solicitation->requested_pet->id}}">
                                        <i class="fa fa-eye animated rotateIn"></i>
                                    </a>
                                </li>
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
                <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Visualizado</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- modal propostas direita -->