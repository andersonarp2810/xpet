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
                    <p>Pendentes</p>
                </div>
                <ul class="list-group z-depth-0">
                    @foreach($solicitations as $solicitation)
                        @if($solicitation->status == 'pendente')
                        <li class="list-group-item justify-content-between">
                            <p>Nome:</strong> {{ $solicitation->requested_pet->name }}</p>
                            <p>Raça:</strong> {{ $solicitation->requested_pet->race }}</p>
                            <a href="/pet/profile/{{$solicitation->requested_pet->id}}">
                            <i class="fa fa-eye animated rotateIn"></i>
                            </a>
                        </li>
                        @endif
                    @endforeach
                    
                    <div class="text-center mt-3">
                        <p>Aceitos</p>
                    </div>

                    @foreach($solicitations as $solicitation)
                        @if($solicitation->status == 'aceito')
                        <li class="list-group-item justify-content-between">
                            <p>Nome:</strong> {{ $solicitation->requested_pet->name }}</p>
                            <p>Raça:</strong> {{ $solicitation->requested_pet->race }}</p>
                            <a href="/pet/profile/{{$solicitation->requested_pet->id}}">
                            <i class="fa fa-eye animated rotateIn"></i>
                            </a>
                        </li>
                        @endif
                    @endforeach
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