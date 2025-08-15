<div class="col-md-9">
    @if(count($items)>0)
    <ul class="booking-list">
        @foreach($items as $item)
        <li>
            <a class="booking-item" href="{{url('/tour/'.getItemEnSlug($item->id))}}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="booking-item-img-wrap">
                            <img src="{{ url('/').'/public/assets/uploads/items/'.$item->primary_image }}" alt="{{$item->name}}" title="{{$item->name}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="booking-item-title">{{$item->name}}</h5>
                        <p>{{ substr($item->short_description, 0, 150) }}</p>
                        <p class="booking-item-address"><i class="fa fa-map-marker"></i> 
                            @php 
                             if(isset($item)){
                                $dests = explode(',',$item->destination_id);
                                $dests = array_map('trim', $dests);
                             }
                            $destNames = array();
                            @endphp
                            @foreach ($destinations as $destination)
                                @if( in_array($destination->id ,$dests) ) 
                                    @php  $destNames[] = $destination->name @endphp
                                @endif
                            @endforeach
                            {{ implode(' , ',$destNames) }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        @if($item->prices_type == 4)
                            <span class="book-btn">
                                <span class="btn btn-primary">{{ trans('site.tours.book-now') }}</span>
                                <br>
                                <p>{{$item->days}} {{ trans('site.tours.days') }}</p>
                            </span>
                        @else
                        <span class="booking-item-price-from">{{ trans('site.tours.from') }}</span>
                        <span class="booking-item-price">
                            @if($item->prices_type == 1)
                                @if($item->triple_price2 != '')
                                    ${{$item->triple_price2}}
                                @else
                                    ${{$item->triple_price}}
                                @endif
                            @elseif($item->prices_type == 2)
                                ${{$item->person7_10_price}}
                            @elseif($item->prices_type == 3)
                                ${{$item->triple_price}}
                            @endif
                            </span>
                        <span class="book-btn">
                            <span>/{{ trans('site.tours.person') }}</span><span class="btn btn-primary">{{ trans('site.tours.book-now') }}</span>
                            <br>
                            <p>{{$item->days}} {{ trans('site.tours.days') }}</p>
                        </span>
                        @endif
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
    <!--
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>

            </ul>
        </div>
    </div>
    -->
    @else
    <div class="booking-item text-center">
        <p>{{ trans('site.tours.there-is-no-tours') }}</p>
    </div>
    @endif
</div>