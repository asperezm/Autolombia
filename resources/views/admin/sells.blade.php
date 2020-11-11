@extends('layouts.admin_master')
@section("title", 'Show all')
@section('content')
<div style="background-color:#6c757d; text-align: center; padding: 10px 0">
    <h3 style="color: white">Listado de órdenes</h3>

</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if(empty($data["cars"]->toArray()))
                {{ __('app.dbempty') }}
            @endif
            @foreach($data["cars"] as $car)
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="col-lg-4 mb-5 mb-lg-0" style="float:right">
                            <img src="{{ asset('storage/' . $car->getImagePath()) }}" 
                            style="height: 100%; width: 100%; object-fit: contain;">
                        </div>
                        <div class="col-lg-3 mb-5 mb-lg-0" style="float:right">
                            <h5>{{ __('app.brand') . ': ' .  $car->getBrand() }}</h5>  
                            <h5>{{ __('app.model') . ': ' .  $car->getModel() }}</h5> 
                            <h5>{{ __('app.color') . ': ' .  $car->getColor() }}</h5> 
                            <h5>{{ __('app.price') . ': ' .  $car->getPrice() }}</h5> 
                            <h5>{{ __('app.mileage') . ': ' .  $car->getMileage() }}</h5>
                            <h5>{{ __('app.license_plate') . ': ' .  $car->getLicensePlate() }}</h5>
                        </div>
                        <div class="col-lg-2 mb-5 mb-lg-0 float-right" style="float:right">
                            <a class="btn btn-danger btn-xs" href="{{ route('admin.sells.delete', $car->getId()) }}"> 
                                <h4 class="d-inline">{{__('app.delete')}}</h4>
                            </a>
                        </div>
                        <div class="col-lg-3 mb-5 mb-lg-0 float-right" style="float:right">
                            <h5>{{  __('app.user') . ' ID: ' . $car->getId() }}</h5>
                            @foreach ($data['orders'] as $order)
                                @if ($order->getId() == $car->getId())
                                    <h6>{{ __('app.user') . ' ID: ' . $order->getUserId() }}</h5>  

                                    @foreach ($data['users'] as $user)
                                        @if ($order->getUserId() == $user->getId())
                                        <p style="margin-left: 0em;padding: 0 0em 3em   "><h6>{{  __('app.client_name') . ' ' }}</h5>  </p>
                                            {{ $user->getName() }} 
                                   
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
