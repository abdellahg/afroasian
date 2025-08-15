<div class="bg-holder">
    <div class="bg-mask"></div>
    <div class="bg-blur" style="background-image:url('assets/site/uploads/home/best-offers.jpg');"></div>
    <div class="bg-content">
        <div class="container">
            <div class="gap gap-big text-center text-white">
                <h2 class="text-uc mb20">{{ trans('site.tours.best-offers') }}</h2>
                
                <div class="row row-wrap">
                @foreach($bestoffersitems as $bestoffersitem)
                <div class="col-md-4" >
                    <div class="thumb" style="border: 1px solid #ffffff;padding: 20px; background: transparent;">
                        <header class="thumb-header">
                            <a class="hover-img" href="{{url('/tour/'.getItemEnSlug($bestoffersitem->id))}}">
                                <img src="{{ url('/').'/public/assets/uploads/items/'.$bestoffersitem->primary_image }}" alt="{{$bestoffersitem->name}}" title="{{$bestoffersitem->name}}" style="min-height: 240px;" />
                                <h5 class="hover-title-center">{{ trans('site.tours.book-now') }}</h5>
                            </a>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title"><a class="" href="{{url('/tour/'.getItemEnSlug($bestoffersitem->id))}}">{{$bestoffersitem->name}}</a></h5>
                            <p class="mb0">
                                <small><i class="fa fa-map-marker"></i>
                                    @php 
                                     if(isset($bestoffersitem)){
                                        $dests = explode(',',$bestoffersitem->destination_id);
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
                                @if($bestoffersitem->prices_type != 4)
                                 <span style="color:#fff;" >{{ trans('site.tours.from') }} <span>
                                @if($bestoffersitem->prices_type == 1)
                                    @if($bestoffersitem->triple_price2 != '')
                                        ${{$bestoffersitem->triple_price2}}
                                    @else
                                        ${{$bestoffersitem->triple_price}}
                                    @endif
                                @elseif($bestoffersitem->prices_type == 2)
                                    ${{$bestoffersitem->person7_10_price}}
                                @elseif($bestoffersitem->prices_type == 3)
                                    ${{$bestoffersitem->triple_price}}
                                @endif
                            </span><small> /{{ trans('site.tours.person') }}</small>
                            @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            </div>
        </div>
    </div>
</div>