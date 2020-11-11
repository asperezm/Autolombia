@extends('layouts.admin_master')
@section("title", 'Edit')
@section('content')
<div style="background-color:#6c757d; text-align: center; padding: 10px 0">
    <h3 style="color: white">{{ __('app.auction_edit_title') . ' ' . $data['auction']->getId() }}</h3>
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
                    <form method="POST" action="{{ route('admin.auction.update', $data['auction']->getId()) }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.reserve_price')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="reserve_price" value="{{ $data['auction']->getReservePrice() }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.beginning')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="beginning" value="{{ substr($data['auction']->getBeginning(), 0, 10) }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.ending')}}</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="ending" value="{{ substr($data['auction']->getEnding(), 0, 10) }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.state')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="state" value="{{ old('state') }}" >
                                    @if($data["auction"]->getState())
                                        <option value="1" selected>{{__('app.active')}}</option>
                                        <option value="0">{{__('app.inactive')}}</option>
                                    @else
                                        <option value="1">{{__('app.active')}}</option>
                                        <option value="0" selected>{{__('app.inactive')}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{__('app.car')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="car_id" value="{{ old('car_id') }}" >
                                    @foreach($data["cars"] as $car)
                                        @if($data["auction"]->car == $car)
                                            <option value="{{ $car->getId() }}" selected> 
                                                {{ $car->getId() . ". " . $car->getBrand() . " " . $car->getModel() }} 
                                            </option>
                                        @else
                                            <option value="{{ $car->getId() }}"> 
                                                {{ $car->getId() . ". " . $car->getBrand() . " " . $car->getModel() }} 
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-info" value="{{__('app.save')}}">
                            <a class="btn btn-danger btn-xs" href="{{ route('admin.auction.show', $data['auction']->getId()) }}" >{{__('app.cancel')}}</a>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection