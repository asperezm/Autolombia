@extends('layouts.master')
@section("title", 'Show all')
@section('content')
</header>
<div class="container" style="float:center">
    <div class="row justify-content-center">
        <div class="col-lg-12">
                @if(empty($data["auctions"]->toArray()))
                {{ __('app.dbempty') }}
                @endif
                @foreach($data["auctions"] as $auction)
                <a href="{{ route('auction.show', $auction->getId()) }}">
                    <div class="row" >
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="col-lg-4" style="float:left">
                                    <img src="{{ asset('storage/' . $auction->car->getImagePath()) }}"
                                        style="height: 100%; width: 100%; object-fit: contain;">
                                </div>

                                <div class="col-lg-8" style="float:left">
                                    <h3 class="card-title"> {{ $auction->car->getBrand() . ' ' . $auction->car->getModel() }} </h3>
                                    <h5> {{ $auction->car->getColor() }} </h5>
                                    @if($auction->bids->max('bid_value') == NULL)
                                        <h4>{{ __('app.reserve_price') . ' $' . $auction->getReservePrice()}} </h4>
                                    @else
                                        <h4>{{ __('app.highest_bid') . ' $' . $auction->bids->max('bid_value') }} </h4>
                                    @endif
                                    <p class="card-text"> {{ __( $auction->getBeginning() . ' ' . __('app.to') . ' ' . $auction->getEnding()) }} </p>
                                    <i class="fas fa-tachometer-alt"
                                        style="font-size:25px; float:left; margin: 0 10px 0 0"></i> {{
                                    $auction->car->getMileage() . ' ' . __('app.miles')}}
                                </div>

                                <div class="col-lg-8" style="float:right">

                                    @if($auction->getState())
                                    <h5 class="card-text" style="float:left; margin: 5px 0 0 0">{{__('app.active')}} </h5>
                                    @else
                                    <h5 class="card-text" style="float:left; margin: 5px 0 0 0"> {{__('app.inactive')}}</h5>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
        </div>
    </div>
</div>
@endsection