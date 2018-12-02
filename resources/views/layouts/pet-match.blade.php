<!-- Create modal -->
<div class="modal fade" id="{{'modal-match'}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar .modal-content1" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <img src="teste/img/pawprintvector.jpg" class="rounded-circle img-responsive" alt="Avatar photo">
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1" >

                <form method="POST" action="{{ route('pet.solicitation') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="requester_user_id" value="{{ Auth::user()->id }}" >
                    <input type="hidden" name="requested_user_id" value="{{ $pet->user->id }}" >
                    <input type="hidden" name="requesteds_pet_id" value="{{ $pet->id }}" >
                    <input type="hidden" name="status" value="pendente" >

                    <div class="row wow fadeIn">
                        <!--Grid column dinamic -->
                        @forelse ($pets as $pet)
                        <div class="col-lg-4 col-md-4 mb-4">

                            <div class="card card-cascade wider h-75">
                                
                                @include('layouts.pet-card-image', ['pet' => $pet])
                        
                                <!-- Card content -->
                                <div class="card-body card-body-cascade text-center" style="padding: 10px 0px 0px !important">
                        
                                    <!-- Title -->
                                    <h6 class="card-title" style="margin-bottom: 6px !important"><strong>{{ $pet->name }}</strong></h6>
                                    
                                    <input type="hidden" name="requesters_pet_id" value="{{ $pet->id }}" >

                                    @if(Auth::user()->id == $pet->user->id)
                                        <button type="submit" class="btn btn-primary btn-sm" >
                                            Ok
                                            <i class="fa fa-paw ml-1 animated rotateIn"></i>
                                        </button>
                                    @endif
                        
                                </div>
                            </div>
                        
                            
                        </div>
                        @empty
                        <div class="text-center mt-3">
                            <p>Cadastre um pet.</p>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-create">Cadastrar</button>
                        </div>
                        @endforelse
                        <!--Grid column dinamic-->
                    </div>
                </form>
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