@extends('layouts.admin_master')
@section("title", 'Show all')
@section('content')
<div style="background-color:#6c757d; text-align: center; padding: 10px 0">
    <h3 style="color: white">{{__('app.show_all_cars')}}</h3>
    <a class="btn btn-info btn-xs" href="{{ route('admin.car.create') }}"> 
        <i class="fas fa-plus" style="font-size:20px; margin:0 5px 0 0"></i>
        <h4 class="d-inline"> {{ __('app.create') }} </h4>
    </a>
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
                            <a class="btn btn-info btn-xs" href="{{ route('admin.car.show', $car->getId()) }}"> 
                                <h4 class="d-inline"> {{ __('app.edit') }} </h4>
                                <i class="fas fa-edit" style="font-size:20px; margin:auto"></i>
                            </a>
                        </div>
                        <div class="col-lg-3 mb-5 mb-lg-0 float-right" style="float:right">
                            <h5>{{ 'ID: ' . $car->getId() }}</h5>
                            @if($car->getAvailability())
                                <h5>{{ __('app.available') }}</h5>
                            @else
                                <h5>{{ __('app.not_available') }}</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
