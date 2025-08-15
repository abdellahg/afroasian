<div class="container">
            <div class="gap"></div>
            <h2 class="text-center">{{ trans('site.tours.other-destinations') }}</h2>
            <div class="gap">
                <div class="row row-wrap">
                    @foreach($topdestinationitems as $topdestinationitem)
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="{{url('/destination/'.getDestEnSlug($topdestinationitem->id))}}">
                                    <img src="{{ url('/').'/public/assets/uploads/destinations/'.$topdestinationitem->photo }}" alt="{{$topdestinationitem->name}}" title="{{$topdestinationitem->name}}" style="min-height: 215px;" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">{{$topdestinationitem->name}}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                   
                </div>
            </div>


        </div>