@extends('layouts.admin_master')
@section("title", 'Show')
@section('content')
<div style="background-color:#6c757d; text-align: center; padding: 10px 0">
    <h3 style="color: white">{{ __('app.show_auction') . ' ' . $data['auction']->getId() }}</h3>
    <a class="btn btn-info btn-xs" href="{{ route('admin.auction.edit', $data['auction']->getId()) }}"> 
        <h4 class="d-inline"> {{ __('app.edit') }} </h4>
        <i class="fas fa-edit" style="font-size:20px; margin:auto"></i>
    </a>
</div>
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <h3 class="card-title"> {{  'ID: ' . ' ' . $data['auction']->getId() }} </h3>
                    <h3 class="card-title"> {{  $data['auction']->car->getBrand() . ' ' . $data['auction']->car->getModel() }} </h3>
                </div>
                <div class="col-lg-5">
                    <div class="col">
                        <form method="POST" action="{{ route('admin.auction.delete', $data['auction']->getId()) }}">
                            <input type="submit" class="btn btn-danger float-right" value="{{ __('app.delete') }}">
                            @method('delete')
                            @csrf
                        </form>
                    </div> 
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
                        @if($data["auction"]->getState())
                            <b> {{ __('app.state') . ': ' . __('app.active')}} </b> <br/>
                        @else
                            <b> {{ __('app.state') . ': ' . __('app.inactive')}} </b> <br/>
                        @endif
                        <b> {{ __('app.reserve_price') . ': ' }} </b> {{ $data["auction"]->getReservePrice() }} <br/>
                        <b> {{ __('app.beginning') . ': ' }} </b> {{ $data["auction"]->getBeginning() }} <br/>
                        <b> {{ __('app.ending') . ': ' }} </b> {{ $data["auction"]->getEnding() }} <br/>
                        <b> {{ __('app.car') . ': ' }} </b> {{ 'ID ' .  $data["auction"]->car->getId() }} <br/>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection