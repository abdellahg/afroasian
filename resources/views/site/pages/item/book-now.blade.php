@if($item->prices_type == 4)
<form method="POST" action="#">
<div class="booking-item-dates-change" style="background-color:#f7f7f7;">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" name="item_id" id="item_id" value="{{ $item->id}}" />
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ trans('site.tours.name') }}</label>
                <input class="form-control" type="text" name="name" id="name" required="required"  />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ trans('site.tours.email') }}</label>
                <input class="form-control" type="email" name="email" id="email" required="required"  />
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>{{ trans('site.tours.message') }}</label>
        <textarea class="form-control" name="request-text" id="request-text" required="required"  ></textarea>
    </div>
    <input class="btn btn-primary" id="contact-form" type="submit" value="{{ trans('site.tours.send-message') }}" />
    <br><br>
    <div style="display:none;" id="alert-success1" class="alert alert-success text-center">
	</div>
	<div style="display:none;" id="alert-fail1" class="alert alert-danger text-center">
	</div>
</div>
</form>

@else
<form action="{{url('/reserve/tour')}}" method="get" >
    <input type="hidden" name="item_id" value="{{ $item->id}}" />
    <div class="booking-item-dates-change" style="background-color:#f7f7f7;">
        <div class="input-daterange" data-date-format="mm/dd/yyyy">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon"></i>
                        <label>{{ trans('site.tours.arrival-date') }}</label>
                        <input  class="form-control" name="start" type="text" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon"></i>
                        <label>{{ trans('site.tours.departure-date') }}</label>
                        <input  class="form-control" name="end" type="text" />
                    </div>
                </div>
            </div>
        </div>
        @if($item->prices_type == 1)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ trans('site.tours.adults') }}</label>
                    <select class="form-control" name="persons">
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                        <option value="11" >11</option>
                        <option value="12" >12</option>
                        <option value="13" >13</option>
                        <option value="14" >14</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ trans('site.tours.price-category') }}</label>
                    <select class="form-control" name="price_category">
                        <option value="A" >{{ trans('site.tours.category-a') }}</option>
                        <option value="B" >{{ trans('site.tours.category-b') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ trans('site.tours.child-2-6') }}</label>
                    <select class="form-control" name="childs1">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                        <option value="11" >11</option>
                        <option value="12" >12</option>
                        <option value="13" >13</option>
                        <option value="14" >14</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ trans('site.tours.child-6-12') }}</label>
                    <select class="form-control" name="childs2">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                        <option value="11" >11</option>
                        <option value="12" >12</option>
                        <option value="13" >13</option>
                        <option value="14" >14</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                {{ trans('site.tours.number-of-rooms') }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ trans('site.tours.single') }}</label>
                    <select class="form-control" name="single">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ trans('site.tours.double') }}</label>
                    <select class="form-control" name="double">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ trans('site.tours.triple') }}</label>
                    <select class="form-control" name="triple">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>
            </div>
            
        </div>
        @elseif($item->prices_type == 3)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ trans('site.tours.adults') }}</label>
                    <select class="form-control" name="persons">
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                        <option value="11" >11</option>
                        <option value="12" >12</option>
                        <option value="13" >13</option>
                        <option value="14" >14</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ trans('site.tours.child-2-6') }}</label>
                    <select class="form-control" name="childs1">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                        <option value="11" >11</option>
                        <option value="12" >12</option>
                        <option value="13" >13</option>
                        <option value="14" >14</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ trans('site.tours.child-6-12') }}</label>
                    <select class="form-control" name="childs2">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                        <option value="11" >11</option>
                        <option value="12" >12</option>
                        <option value="13" >13</option>
                        <option value="14" >14</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                {{ trans('site.tours.number-of-rooms') }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ trans('site.tours.single') }}</label>
                    <select class="form-control" name="single">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ trans('site.tours.double') }}</label>
                    <select class="form-control" name="double">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ trans('site.tours.triple') }}</label>
                    <select class="form-control" name="triple">
                        <option value="0" >0</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>
            </div>
            
        </div>
        @elseif($item->prices_type == 2)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ trans('site.tours.person') }}</label>
                    <select class="form-control" name="persons">
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                    </select>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="gap gap-small"></div>	
    <input type="submit" class="btn btn-primary btn-lg book-now-btn" value="{{ trans('site.tours.book-now') }}"  />  
</form>

@endif