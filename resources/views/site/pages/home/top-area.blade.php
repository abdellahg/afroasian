<!-- TOP AREA -->
    <div class="top-area show-onload">
        <div class="owl-carousel owl-slider owl-carousel-area" id="owl-carousel-slider">
            @foreach($slideritems as $slideritem)
            <div class="bg-holder full text-center text-white">
                <div class="bg-mask"></div>
                <div class="bg-img" style="background-image:url({{ url('/').'/public/assets/uploads/items/'.$slideritem->primary_image }});"></div>
                <div class="bg-front full-center">
                    <div class="owl-cap">
                        <h1 class="owl-cap-title fittext">{{$slideritem->name}}</h1>
                        <a class="btn btn-white btn-ghost" href="{{url('/tour/'.getItemEnSlug($slideritem->id))}}"><i class="fa fa-angle-right"></i> Explore</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- END TOP AREA  -->