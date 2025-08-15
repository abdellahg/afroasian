@extends('site.layouts.app')
@section('title')
- {{ trans('site.survey.survey') }}
@endsection
@section('seo')
    @if(getLang() == 1)
<meta name="description" content=" {{getSetting('site_description_en')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_en')}}">
    @elseif(getLang() == 2)
<meta name="description" content=" {{getSetting('site_description_es')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_es')}}">
    @elseif(getLang() == 3)
<meta name="description" content=" {{getSetting('site_description_pt')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_pt')}}">
    @endif
@endsection

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
@endsection

@section('content')
        <div class="gap"></div>
        <div class="container text-center">
         <h2> {{ trans('site.survey.survey') }} </h2> 
         <p>
             {{ trans('site.survey.servey-info') }}
         </p>
        </div>
        <form action="{{url('/new-survey')}}" method="POST">
            
            {{ csrf_field() }}
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.full-name') }}</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. John Doe"  required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.email') }}</label>
                            <input type="email" name="email" class="form-control" placeholder="e.g. johndoe@gmail.com" required  />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="" >
                            <div class="input-daterange" data-date-format="mm/dd/yyyy">
                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon"></i>
                                    <label>{{ trans('site.tours.arrival-date') }}</label>
                                    <input  class="form-control" name="start" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Select Visited Places</label>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <select id="multiple-checkboxes" multiple="multiple">
                            @foreach( $destinations as $destination)
                            <option value="{{$destination->id}}">{{$destination->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label>{{ trans('site.survey.survey-question') }}</label>
                    </div>
                    <div class="col-md-2">
                        01={{ trans('site.survey.poor') }} <img src="{{ asset('assets/site/img/survey/poor.png') }}"  style="width:25px;"/>      
                    </div>
                    <div class="col-md-2">
                        02={{ trans('site.survey.average') }}  <img src="{{ asset('assets/site/img/survey/average.png') }}"  style="width:25px;"/>             
                    </div>
                    <div class="col-md-2">
                        03={{ trans('site.survey.very-good') }}   <img src="{{ asset('assets/site/img/survey/good.png') }}"  style="width:25px;"/>                 
                    </div>
                    <div class="col-md-2">
                        04={{ trans('site.survey.excellent') }}   <img src="{{ asset('assets/site/img/survey/excellent.png') }}"  style="width:25px;"/>      
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>{{ trans('site.survey.hotels') }}</th>
                                    <th>{{ trans('site.survey.cars') }}</th>
                                    <th>{{ trans('site.survey.driver') }}</th>
                                    <th>{{ trans('site.survey.tour-leader') }}</th>
                                    <th>{{ trans('site.survey.tour-guide') }}</th>
                                  </tr>
                                </thead>
                                <tbody id="tabody">
                                  <!-- destionations here-->
                                  <tr>
                                      <td colspan="6" class="text-center"> Select Visited Places </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="visible-xs">
                                <small style="color:red;">Swap table to see all </small>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">
                              <label for="comment">{{ trans('site.survey.feedback') }}:</label>
                              <textarea class="form-control" name="feedback" rows="3" id="comment" required="required" ></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit"> {{ trans('site.survey.submit') }}
                              </button>
                          </div>
                    </div>
                    <div class="gap"></div>
            </div>
        </form>
        
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script type="text/javascript">
    
    jQuery(document).ready(function() {
        jQuery('#multiple-checkboxes').multiselect();
        
        var token = jQuery('meta[name="csrf-token"]').attr('content');
        jQuery('#multiple-checkboxes').change(function(e){
           e.preventDefault();
           jQuery.ajax({
              url: "{{ url('/getdestinations') }}",
              headers: {'X-CSRF-TOKEN': token},
              method: 'post',
              data: {
                 ids: jQuery('#multiple-checkboxes').val(),
              },
              success: function(result){
                  if(result['status'] == 1){
                      jQuery("#tabody").html(result['msg']);
                  }
                  if(result['status'] == 0){
                      jQuery("#tabody").html('An error occured');
                  }
                 
            }});
       });

    });
 
</script>
@endsection