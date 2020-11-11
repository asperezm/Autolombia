@extends('layouts.master')
@section("title", 'Show')
@section('content')
</header>
<div class="container">
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <i class="fas fa-clipboard-list" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> 
                    <h3 class="card-title">{{__('app.order_details')}}</h3>
                    
                   
                </div>
                <div class="col-lg-5">
                    <i class="fas fa-car" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> 
                    <h3 class="card-title"> {{  $data['car']->getBrand() . ' ' . $data['car']->getModel() }} </h3>
                    <i class="fas fa-tachometer-alt" style="font-size:25px; float:left; margin: 0 10px 0 0"></i> 
                    <h4> {{  $data['car']->getMileage() . ' ' . __('app.miles') }} </h4>

                </div>
                <hr style="width:95%">
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <img src="{{ asset('./storage/' . $data['car']->getImagePath()) }}" 
                    style="height: 100%; width: 100%; object-fit: contain;">
                </div>
                <div class="col-lg-5">
                    <p class="card-body"> 
                        <b> {{ __('app.color') . ': ' }} </b> {{ trans($data['car']->getColor()) }} <br/>
                        <b> {{ __('app.license_plate') . ': ' }} </b> {{ trans($data['car']->getLicensePlate()) }} <br/>
                        <b> {{ __('app.description') . ': ' }} </b> {{  $data['car']->getDescription() }} 
                        
                        <div class="row">
                            
                            <div class="col-lg-4"><b>{{__('app.payment') . ':' }}</b></div>
                            <div class="col"><b> {{ $data['car']->getPrice() }} $</b></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4"><b>{{__('app.your_credit') . ':' }}</b></div>
                             @if($data['user']->getCredit()-$data['car']->getPrice() >= 0)
                                <div class="col color:green"><p style="color:green"<b> {{ $data['user']->getCredit() }} $</p></div>
                                <div class="row">
                                    
                                </div>
                             @else
                                <div class="col color:red"><p style="color:red"<b> ({{ __('app.not_enough') . ' ' . $data['user']->getCredit() }} $)</p></div>
                             @endif
                             
                        </div>
                        <div class="row">
                            
                            @if($data['user']->getCredit()-$data['car']->getPrice() >= 0)
                                <div class="col-lg-4"><b>{{__('app.balance') . ':' }}</b></div>
                                <div class="col color:green"><p style="color:green"<b> {{$data['user']->getCredit()-$data['car']->getPrice() }} $</p></div>

                            @else

                            @endif
                            
                        </div>
                        
                    </p>
                    
                    <form class="link_mimic" form method="POST" action="{{ route('order.save', $data['car']->getId()) }}">
                        @csrf
                        <input type="hidden" name="id" value=" {{ $data['car']->getId() }}">
                        <input type="hidden" name="user_id" value=" {{ $data['user']->getId() }}">
                        <input type="hidden" name="total_price" value=" {{ $data['car']->getPrice() }}">
                        <input type="submit" class="btn btn-success float-right" value="{{__('app.confirm')}}">
                    </form>
                    <div class="col-lg-10">
                    <a class="btn btn-danger float-right" href="{{ route('order.cancel') }}">{{__('app.cancel')}}</a>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection