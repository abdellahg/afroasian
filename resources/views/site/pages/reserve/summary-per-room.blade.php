<div class="col-md-4">
    <div class="booking-item-payment">
        <header class="clearfix">
            <a class="booking-item-payment-img" href="#">
                <img src="{{ url('/').'/public/assets/uploads/items/'.$item->primary_image }}" alt="{{ $item->name }}" title="{{ $item->name }}" />
            </a>
            <h5 class="booking-item-payment-title"><a href="#">{{ $item->name }}</a></h5>
            
        </header>
        <ul class="booking-item-payment-details">
            <li>
                <h5>{{ trans('site.tours.reserve-for') }} {{ $item->days }} {{ trans('site.tours.days') }}</h5>
                <div class="booking-item-payment-date">
                    <p class="booking-item-payment-date-day"><b>{{ trans('site.tours.from') }}</b>: {{date('l, jS F Y',strtotime($startdate))}}</p>
                </div>
                <br>
                <div class="booking-item-payment-date">
                    <p class="booking-item-payment-date-day"><b>{{ trans('site.tours.to') }}</b>: {{date('l, jS F Y',strtotime($enddate))}}</p> 
                </div>
            </li>
            <li>
                <ul class="booking-item-payment-price">
                    <li>
                        <p class="booking-item-payment-price-title">{{$persons}} {{ trans('site.tours.person') }}</p>
                        <p class="booking-item-payment-price-amount">{{ $children }} {{ trans('site.tours.child') }}</p>
                    </li>
                    @if($single != 0)
                        <li>
                            <p class="booking-item-payment-price-title">{{$single}} Single @if($single == 1)Room @else Rooms @endif</p>
                            <p class="booking-item-payment-price-amount">${{ $single_price }}<small>/  {{ trans('site.tours.person-per-room') }} </small>
                            </p>
                        </li>
                    @endif
                    @if($double != 0)
                        <li>
                            <p class="booking-item-payment-price-title">{{$double}} Double @if($double == 1)Room @else Rooms @endif</p>
                            <p class="booking-item-payment-price-amount">${{ $double_price }}<small>/  {{ trans('site.tours.person-per-room') }}</small>
                            </p>
                        </li>
                    @endif
                    @if($triple != 0)
                        <li>
                            <p class="booking-item-payment-price-title">{{$triple}} Triple @if($triple == 1)Room @else Rooms @endif</p>
                            <p class="booking-item-payment-price-amount">${{ $triple_price }}<small>/  {{ trans('site.tours.person-per-room') }} </small>
                            </p>
                        </li>
                    @endif
                    @if($childs1 != 0)
                        <li>
                            <p class="booking-item-payment-price-title">{{$childs1}} {{ trans('site.tours.child-2-6') }}</p>
                            <p class="booking-item-payment-price-amount">${{ $child_price1 }}<small>/ {{ trans('site.tours.per-child') }}</small>
                            </p>
                        </li>
                    @endif
                    @if($childs2 != 0)
                        <li>
                            <p class="booking-item-payment-price-title">{{$childs2}} {{ trans('site.tours.child-6-12') }}</p>
                            <p class="booking-item-payment-price-amount">${{ $child_price2 }}<small>/ {{ trans('site.tours.per-child') }} </small>
                            </p>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
        <p class="booking-item-payment-total">{{ trans('site.tours.total-price') }}: <span>$ {{ $total_price }}</span>
        </p>
    </div>
    <input type="hidden" name="item_id" value="{{ $item->id }}" />
    <input type="hidden" name="prices_type" value="{{ $item->prices_type }}" />
    <input type="hidden" name="arrivaldate" value="{{$startdate}}" />
    <input type="hidden" name="depaturedate" value="{{$enddate}}" />
    <input type="hidden" name="persons" value="{{$persons}}" />
    <input type="hidden" name="single" value="{{$single}}" />
    <input type="hidden" name="single_price" value="{{$single_price}}" />
    <input type="hidden" name="double" value="{{$double}}" />
    <input type="hidden" name="double_price" value="{{$double_price}}" />
    <input type="hidden" name="triple" value="{{$triple}}" />
    <input type="hidden" name="triple_price" value="{{$triple_price}}" />
    <input type="hidden" name="childs1" value="{{$childs1}}" />
    <input type="hidden" name="childs2" value="{{$childs2}}" />
    <input type="hidden" name="children" value="{{$children}}" />
    <input type="hidden" name="child1_price" value="{{$child_price1}}" />
    <input type="hidden" name="child2_price" value="{{$child_price2}}" />
    <input type="hidden" name="total_amount" value="{{ $total_price  }}" />
    <input type="hidden" name="price_category" value="{{ $price_category  }}" />
</div>