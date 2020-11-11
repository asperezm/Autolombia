@extends('layouts.master')
@section("title", 'Show')
@section('content')
</header>
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <h3 class="card-title"> {{  $data["auction"]->car->getBrand() . ' ' . $data["auction"]->car->getModel() }} </h3>
                    <i class="fas fa-tachometer-alt" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> 
                    <h4> {{  $data["auction"]->car->getMileage() . ' ' . __('app.miles') }} </h4>
                </div>
                <div class="col-lg-5">
                    <i class="fas fa-coins" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> 
                    @if(!empty($data["bid"]->toArray()))
                        <h4 class="card-title"> {{ __('app.highest_bid') }} </h4>
                        <h4 class="card-title"> {{'USD ' . $data["bid"]->getBidValue() }} </h4>
                    @else
                        <h4 class="card-title"> {{ __('app.reserve_price') }} </h4>
                        <h4 class="card-title"> {{'USD ' . $data["auction"]->getReservePrice() }} </h4>
                    @endif
                </div>
                <hr style="width:95%">
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <img src="{{ asset('./storage/' . $data['auction']->car->getImagePath()) }}" 
                    style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="col-lg-5">
                    <p class="card-body"> 
                        <b> {{ __('app.color') . ': ' }} </b> {{ $data["auction"]->car->getColor() }} <br/>
                        <b> {{ __('app.license_plate') . ': ' }} </b> {{ $data["auction"]->car->getLicensePlate() }} <br/>
                        <b> {{ __('app.description') . ': ' }} </b> {{  $data["auction"]->car->getDescription() }} 
                    </p>
                </div>
            </div>
            <hr style="width:95%">
            <div class="row mt-3">
                <div class="col-lg-7">
                    <i class="fas fa-calendar" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> 
                    <h4> {{ __('app.beginning') . ': ' . $data["auction"]->getBeginning() }} </h4>
                    <i class="fas fa-calendar" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> 
                    <h4> {{ __('app.ending') . ': ' . $data["auction"]->getEnding() }} </h4>
                    <i class="fas fa-exclamation-circle" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> 
                    @if($data["auction"]->getState())
                        <h4> {{ __('app.state') . ': ' . __('app.active') }} </h4>
                    @else
                        <h4> {{ __('app.state') . ': ' . __('app.inactive') }} </h4>
                    @endif
                </div>
            </div>
            <!-- Bids -->
            <div class="card auction-car-info">
                <div class="card-header">
                    @if(!empty($data["bid"]->toArray()))
                        <h5> {{ __('app.highest_bid') . ': USD ' . $data['bid']->getBidValue() }} </h5>
                        <h5> {{ __('app.user') . ': ' . $data['userwin']->getName() }} </h5>
                        <h5> {{ __('app.email') . ': ' . $data['userwin']->getEmail() }} </h5>
                    @else
                        <h4>{{ __('app.bid_msg') }}</h4>
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('auction.bid', $data['auction']->getId()) }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="{{ __('app.phbid') }}"
                                    name="bid_value" value="{{ old('bid_value') }}">
                                <input class="form-control" type="hidden" name="auction_id"
                                    value="{{ $data['auction']->getId() }}">
                                @guest
                                @else
                                <input class="form-control" type="hidden" name="user_id"
                                    value="{{ $data['user']->getId() }}">
                                @endguest
                            </div>
                            <div class="col-sm-2">
                                @guest
                                <a class="btn btn-info btn-xs float-right" href="{{ route('login') }}">
                                    {{ __('app.login') }}
                                </a>
                                @else
                                <input type="submit" class="btn btn-info" value="{{ __('app.bid') }}">
                                @endguest
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection