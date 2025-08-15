@if(count($relateditems)>0)
    <ul class="booking-list">
 
    @foreach($relateditems as $relateditem)
    <li>
        <a  href="{{url('/tour/'.getItemEnSlug($relateditem->id))}}">
        <div class="booking-item booking-item-small">
            <div class="row">
                <div class="col-xs-4">
                    <img src="{{ url('/').'/public/assets/uploads/items/'.$relateditem->primary_image }}" alt="{{$relateditem->name}}" title="{{$relateditem->name}}" />
                </div>
                <div class="col-xs-5">
                    <h5 class="booking-item-title">{{$relateditem->name}}</h5>
                    <br>
                    <p class="booking-item-address"><i class="fa fa-map-marker"></i> 
                        @php 
                             if(isset($relateditem)){
                                $dests = explode(',',$relateditem->destination_id);
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
                <div class="col-xs-3">
                    @if($relateditem->prices_type != 4)
                    <span class="booking-item-price-from">{{ trans('site.tours.from') }}</span><span class="booking-item-price">@if($relateditem->prices_type == 1)
                                @if($relateditem->triple_price2 != '')
                                    ${{$relateditem->triple_price2}}
                                @else
                                    ${{$relateditem->triple_price}}
                                @endif
                            @elseif($relateditem->prices_type == 2)
                                ${{$relateditem->person7_10_price}}
                            @elseif($relateditem->prices_type == 3)
                                ${{$relateditem->triple_price}}
                            @endif</span>
                    @endif
                </div>
            </div>
        </div>
        </a>
    </li>
    @endforeach
    
</ul>
@endif