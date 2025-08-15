<div class="container">
            <div class="gap"></div>
            <h2 class="text-center mb20">{{ trans('site.tours.most-popular-tours') }}</h2>
            <div class="row row-wrap">
                @foreach($popularitems as $key=>$popularitem)
                @if ($key % 3 == 0 && $key != 0 )
                   <div class="clearfix"></div>
                   <br>
                @endif
                <div class="col-md-4">
                    <div class="thumb">
                        <header class="thumb-header">
                            <a class="hover-img" href="{{url('/tour/'.getItemEnSlug($popularitem->id))}}">
                                <img src="{{ url('/').'/public/assets/uploads/items/'.$popularitem->primary_image }}" alt="{{$popularitem->name}}" title="{{$popularitem->name}}" style="min-height: 240px;" />
                                <h5 class="hover-title-center">{{ trans('site.tours.book-now') }}</h5>
                            </a>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title"><a class="text-darken" href="{{url('/tour/'.getItemEnSlug($popularitem->id))}}">{{$popularitem->name}}</a></h5>
                            <p class="mb0">
                                <small><i class="fa fa-map-marker"></i>
                                    @php 
                                     if(isset($popularitem)){
                                        $dests = explode(',',$popularitem->destination_id);
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
                                </small>
                            </p>
                            <p class="mb0 text-darken"><span class="text-lg lh1em text-color">
                                @if($popularitem->prices_type != 4)
                                <span style="color:#000;" >{{ trans('site.tours.from') }}</span>
                                @if($popularitem->prices_type == 1)
                                    @if($popularitem->triple_price2 != '')
                                        ${{$popularitem->triple_price2}}
                                    @else
                                        ${{$popularitem->triple_price}}
                                    @endif
                                @elseif($popularitem->prices_type == 2)
                                    ${{$popularitem->person7_10_price}}
                                @elseif($popularitem->prices_type == 3)
                                     ${{$popularitem->triple_price}}
                                @endif
                                </span><small> /{{ trans('site.tours.person') }}</small>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="gap gap-small"></div>
        </div>