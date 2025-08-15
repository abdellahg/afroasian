<ul class="booking-item-reviews list">
    @foreach($reviews as $review)
        <li>
            <div class="row">
                <div class="col-md-2">
                    <div class="booking-item-review-person">
                        <a class="booking-item-review-person-avatar round" href="#">
                            <img src="{{url('assets/site/img/default-avatar.jpg')}}" alt="Image Alternative text" title="Good job" />
                        </a>
                        <p class="booking-item-review-person-name"><a href="#">{{$review->name}}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="booking-item-review-content">
                        <ul class="icon-group booking-item-rating-stars">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>
                            {{substr($review->text , 0, 250)}}
                        </p>
                        

                    </div>
                </div>
            </div>
        </li>
    @endforeach

</ul>
<div class="gap gap-small"></div>
<div class="box bg-gray">
    <h3>{{ trans('site.tours.write-a-Review') }}</h3>
    <form action="#" method="post">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" name="reviewitem" id="reviewitem1" value="{{ $item->id}}" />
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>{{ trans('site.tours.name') }}*</label>
                        <input class="form-control" name="name" id="name1" type="text" required="required" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label>{{ trans('site.tours.email') }}*  <span><small>{{ trans('site.tours.your-email-not-appear') }}</small></span></label> 
                        <input class="form-control" name="email" id="email1" type="email" required="required" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>{{ trans('site.tours.review-text') }}*</label>
                        <textarea class="form-control" name="request-text" id="request-text1" rows="4" required="required" ></textarea>
                    </div>
                </div>
                
                
            </div>
            <div class="col-md-4">
                <br>
                <div class="col-md-12">
                   <ul class="icon-group booking-item-rating-stars">
                   <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                    <li><i class="fa fa-star"></i>
                    </li>
                </ul>
                <br>
                <input class="btn btn-primary" type="submit" id="submit-form" value="{{ trans('site.tours.leave-review') }}" /> 
                </div>
                
                <div class="col-md-12" style="margin-top:20px;">
                    <div style="display:none;" id="alert-success" class="alert alert-success text-center">
					</div>
					<div style="display:none;" id="alert-fail" class="alert alert-danger text-center">
					</div>
                </div>
            </div>
        </div>
    </form>
</div>
