@extends('layouts.admin_master')
@section("title", 'Create')
@section('content')
<div style="background-color:#6c757d; text-align: center; padding: 10px 0">
    <h3 style="color: white">{{ __('app.auction_create_title') }}</h3>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11 mt-3 mb-5">
        @include('util.message')
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.auction.save') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.reserve_price')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="{{__('app.phreserve_price')}}" 
                                 name="reserve_price" value="{{ old('reserve_price') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.beginning')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="beginning" value="{{ old('beginning') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.ending')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="ending" value="{{ old('ending') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.state')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="state" value="{{ old('state') }}" >
                                    <option value="1">{{__('app.active')}}</option>
                                    <option value="0">{{__('app.inactive')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.car')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="car_id" value="{{ old('car_id') }}" >
                                    @foreach($data["cars"] as $car)
                                        <option value="{{ $car->getId() }}"> 
                                            {{ $car->getId() . ". " . $car->getBrand() . " " . $car->getModel() }} 
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="{{__('app.create')}}">
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection