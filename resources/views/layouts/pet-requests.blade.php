<!-- Create modal -->
<div class="modal fade" id="{{'modal-requests'}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar .modal-content1" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <img src="teste/img/pawprintvector.jpg" class="rounded-circle img-responsive" alt="Avatar photo">
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1" >

                <!-- Title -->
                <h6 class="card-title"><strong>Solicitações</strong></h6>

                <div class="row wow fadeIn">

                    <!--Grid column dinamic -->
                    @foreach ($requesters as $requester)
                    
                        @foreach($pets as $pet)
                        
                            @if($requester->requesters_pet_id == $pet->id)
                                <div class="col-lg-4 col-md-4 mb-4">

                                    <div class="card card-cascade wider h-75">
                                            @include('layouts.pet-card-image', ['pet' => $requester->requesters_pet])
                                        <!-- Card content -->
                                        <div class="card-body card-body-cascade text-center" style="padding: 10px 0px 0px !important">
                                
                                            <!-- Title -->
                                            <h5 class="card-title" style="margin-bottom: 6px !important"><strong>{{ $pet->name }}</strong></h5>
                                            
                                            @if($requester->status == 'aceito')
                                                <div class="row">
                                                    <div class="col-md-12 text-center"> 
                                                    
                                                        <button type="button" class="btn btn-primary btn-sm" disabled>
                                                            Aceito
                                                            <i class="fa fa-check animated rotateIn"></i>
                                                        </button>
                                                    
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="col-md-12 text-center"> 
                                                    <button type="button" class="btn btn-primary btn-sm" disabled >
                                                        Pendente
                                                        <i class="fa fa-hourglass-half animated rotateIn"></i>
                                                    </button>
                                                    </div>
                                                </div>
                                            @endif
                                
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        
                        @foreach($pets2 as $pet)    
                            @if($requester->requesteds_pet_id == $pet->id)
                                <div class="col-lg-4 col-md-4 mb-4">
                                    
                                    <div class="card card-cascade wider h-75">
                                            @include('layouts.pet-card-image', ['pet' => $requester->requested_pet])
                                        <!-- Card content -->
                                        <div class="card-body card-body-cascade text-center" style="padding: 10px 0px 0px !important">

                                            <!-- Title -->
                                            <h5 class="card-title" style="margin-bottom: 6px !important"><strong>{{ $pet->name }}</strong></h5>

                                            @if($requester->status == 'aceito')
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn btn-primary btn-sm" disabled>
                                                            Aceito
                                                            <i class="fa fa-check ml- 1 animated rotateIn"></i>
                                                        </button>
                                                    
                                                    </div>
                                                </div>
                                            @else
                                            <form method="POST" action="{{ route('solicitation.update', ['solicitation' => $requester]) }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="status" value="aceito" >
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    Aceitar
                                                    <i class="fa fa-check ml-1 animated rotateIn"></i>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('solicitation.update', ['solicitation' => $requester]) }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="status" value="recusado" >
                                                <button type="submit" class="btn btn-danger btn-sm">
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
                    <!--Grid column dinamic-->
                </div>
            </div>
            <section>
                <!-- Create modal -->
                @include('layouts.pet-form', ['pet' => null])
                <!-- Create modal -->
            </section>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Create modal -->