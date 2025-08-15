<div class="bg-holder">
    <div class="bg-mask"></div>
    <div class="bg-blur" style="background-image:url('assets/site/uploads/home/reviews.jpg');"></div>
    <div class="bg-content">
        <div class="container">
            <div class="gap"></div>
            <h1 class="text-center text-white mb20">{{ trans('site.tours.recent-reviews') }}</h1>
            <div class="row row-wrap">
                @foreach($featuredreviews as $featuredreview)
                <div class="col-md-4">
                    <!-- START TESTIMONIAL -->
                    <div class="testimonial text-white">
                        <div class="testimonial-inner">
                            <blockquote>
                                <p>{{$featuredreview->text}}</p>
                            </blockquote>
                        </div>
                        <div class="testimonial-author">
                            <!--<img src="{{ asset('assets/site/img/default-avatar.jpg') }}" alt="Image Alternative text" title="Sevenly Shirts - June 2012  2" />-->
                            <p class="testimonial-author-name">{{$featuredreview->name}}</p>
                        </div>
                    </div>
                    <!-- END TESTIMONIAL -->
                </div>
                @endforeach
                
            </div>
            <div class="gap-small gap"></div>
        </div>
    </div>
</div>