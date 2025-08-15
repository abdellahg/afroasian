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
                <h5>Reserve for {{ $item->days }} {{ trans('site.tours.days') }}</h5>
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
                        <p class="booking-item-payment-price-amount">${{ $person_price }}<small>/  {{ trans('site.tours.per-person') }} </small>
                        </p>
                    </li>
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

    <input type="hidden" name="person_price" value="{{$person_price}}" />

    <input type="hidden" name="total_amount" value="{{ $total_price  }}" />
</div>