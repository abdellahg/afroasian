@extends('site.layouts.app')
@section('title')
- {{ $item->name}}
@endsection
@section('seo')
<meta name="description" content=" {{$item->meta_description}}">
    <meta name="keywords" content=" {{$item->meta_keywords}}">
@endsection
@section('content')
    <div class="container">
        <br>
        @include('site.pages.item.breadcrumb')
        <br>
        <div class="booking-item-details">
            <header class="booking-item-header">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="lh1em">{{ $item->name}}</h2>
                        <p class="lh1em text-small"><i class="fa fa-map-marker"></i>  
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
                        <p class="booking-item-header-price">
                        @if($item->prices_type != 4)
                            <span class="text-md">{{ trans('site.tours.price-from') }}</span>  <span class="text-lg">
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
                        </span>/{{ trans('site.tours.person') }}</p>
                        @endif
                        <p class="booking-item-header-price">{{$item->days}} {{ trans('site.tours.days') }}</p>
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-8">
                    <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                        @if($item->primary_image != '')
                        <img src="{{ url('/').'/public/assets/uploads/items/'.$item->primary_image }}" alt="{{$item->primary_image }}" title="{{ $item->name}}" />
                        @endif
                        @if(count($images)>0)
                            @foreach($images as $image)
                                <img src="{{ url('/').'/public/assets/uploads/items/'.$image->img_name }}" alt="{{$image->img_name }}" title="{{ $item->name}}" />
                            @endforeach
                        
                        @endif
                        
                    </div>
                    <br>
                    <div class="tabbable booking-details-tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-list"></i>{{ trans('site.tours.detials') }}</a>
                            </li>
                            <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-tasks"></i>{{ trans('site.tours.itineraries') }}</a>
                            </li>
                            <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-check"></i>{{ trans('site.tours.includes') }}</a>
                            </li>
                            <li><a href="#tab-4" data-toggle="tab"><i class="fa fa-times"></i>{{ trans('site.tours.excludes') }}</a>
                            </li>
                            @if($item->prices_type != 4)
                            <li><a href="#tab-5" data-toggle="tab"><i class="fa fa-money"></i>{{ trans('site.tours.prices') }}</a>
                            </li>
                            @endif
                            <li><a href="#tab-6" data-toggle="tab"><i class="fa fa-info-circle"></i>{{ trans('site.tours.notes') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <br>
                                <p>{{ $item->short_description}}</p>
                            </div>
                            <div class="tab-pane fade" id="tab-2">
                                <br>
                                @if(count($itineraries)>0)
                                <div class="panel-group" id="accordion">
                                @php $i=0; @endphp
                                @foreach($itineraries as $itinerary)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $itinerary->id}}" >{{ $itinerary->iti_title}}</a></h4>
                                    </div>
                                    <div class="panel-collapse collapse @if($i == 0) in @endif " id="collapse-{{ $itinerary->id}}">
                                        <div class="panel-body">
                                            {!! $itinerary->iti_text !!}
                                        </div>
                                    </div>
                                </div>
                                @php $i++; @endphp
                                @endforeach
                                </div>
                            @endif
                            </div>
                            <div class="tab-pane fade" id="tab-3">
                                <br>
                                @if(count($includes)>0)
                                    @foreach($includes as $include)
                                        <p><i class="fa fa-check green"></i> {{ $include->text}}</p>
                                    @endforeach
                                @endif
                                
                            </div>
                            <div class="tab-pane fade" id="tab-4">
                                <br>
                                @if(count($excludes)>0)
                                    @foreach($excludes as $exclude)
                                        <p><i class="fa fa-times red"></i> {{ $exclude->text}}</p>
                                    @endforeach
                                @endif
                            </div>
                        @if($item->prices_type != 4)
                            <div class="tab-pane fade" id="tab-5">
                                <br>
                                @if($item->prices_type == 1)
                                    <p><b>{{ trans('site.tours.category-a') }}</b></p>
                                    <div class="text-center table-responsive">
                                        <table class="table table-bordered ">
                                            <thead>
                                              <tr>
                                                 @if($item->single_price != '')
                                                    <th>{{ trans('site.tours.single') }}</th>
                                                 @endif
                                                 @if($item->double_price != '')
                                                    <th>{{ trans('site.tours.double') }}</th>
                                                 @endif
                                                 @if($item->triple_price != '')
                                                    <th>{{ trans('site.tours.triple') }}</th>
                                                 @endif
                                                   
                                                 @if($item->child_price1 != '')
                                                    <th>{{ trans('site.tours.child-2-6') }}</th>
                                                 @endif
                                                 @if($item->child_price2 != '')
                                                    <th>{{ trans('site.tours.child-6-12') }}</th>
                                                 @endif
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                @if($item->single_price != '')
                                                    <td>${{$item->single_price}}</td>
                                                 @endif
                                                 @if($item->double_price != '')
                                                    <td>${{$item->double_price}}</td>
                                                 @endif
                                                 @if($item->triple_price != '')
                                                    <td>${{$item->triple_price}}</td>
                                                 @endif
                                                  
                                                 @if($item->child_price1 != '')
                                                    <td>%{{$item->child_price1}}</td>
                                                 @endif
                                                 @if($item->child_price2 != '')
                                                    <td>%{{$item->child_price2}}</td>
                                                 @endif
                                              </tr>
                                              <tr>
                                                @if($item->single_price != '')
                                                    <td>{{ trans('site.tours.person-price') }}</td>
                                                 @endif
                                                 @if($item->double_price != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif
                                                 @if($item->triple_price != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif

                                                 @if($item->child_price1 != '')
                                                    <td>{{ trans('site.tours.per-child') }}</td>
                                                 @endif
                                                 @if($item->child_price2 != '')
                                                    <td>{{ trans('site.tours.per-child') }}</td>
                                                 @endif
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="visible-xs">
                                        <small style="color:red;">{{ trans('site.tours.swap-table-to-see-all-prices') }} </small>
                                    </div>
                                    <br>
                                    @if($item->single_price2 != '' || $item->double_price2 != '' || $item->triple_price2 != '')
                                    <hr>
                                    <br>
                                    <p><b>{{ trans('site.tours.category-b') }}</b></p>
                                    <div class="text-center table-responsive">
                                        <table class="table table-bordered ">
                                            <thead>
                                              <tr>
                                                 @if($item->single_price2 != '')
                                                    <th>{{ trans('site.tours.single') }}</th>
                                                 @endif
                                                 @if($item->double_price2 != '')
                                                    <th>{{ trans('site.tours.double') }}</th>
                                                 @endif
                                                 @if($item->triple_price2 != '')
                                                    <th>{{ trans('site.tours.triple') }}</th>
                                                 @endif
                                                 
                                                 @if($item->child_price12 != '')
                                                    <th>{{ trans('site.tours.child-2-6') }}</th>
                                                 @endif
                                                 @if($item->child_price22 != '')
                                                    <th>{{ trans('site.tours.child-6-12') }}</th>
                                                 @endif
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                @if($item->single_price2 != '')
                                                    <td>${{$item->single_price2}}</td>
                                                 @endif
                                                 @if($item->double_price2 != '')
                                                    <td>${{$item->double_price2}}</td>
                                                 @endif
                                                 @if($item->triple_price2 != '')
                                                    <td>${{$item->triple_price2}}</td>
                                                 @endif

                                                 @if($item->child_price12 != '')
                                                    <td>%{{$item->child_price12}}</td>
                                                 @endif
                                                 @if($item->child_price22 != '')
                                                    <td>%{{$item->child_price22}}</td>
                                                 @endif
                                              </tr>
                                              <tr>
                                                @if($item->single_price2 != '')
                                                    <td>{{ trans('site.tours.person-price') }}</td>
                                                 @endif
                                                 @if($item->double_price2 != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif
                                                 @if($item->triple_price2 != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif

                                                 @if($item->child_price12 != '')
                                                    <td>{{ trans('site.tours.per-child') }}</td>
                                                 @endif
                                                 @if($item->child_price22 != '')
                                                    <td>{{ trans('site.tours.per-child') }}</td>
                                                 @endif
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="visible-xs">
                                        <small style="color:red;">{{ trans('site.tours.swap-table-to-see-all-prices') }} </small>
                                    </div>
                                    @endif
                                @elseif($item->prices_type == 3)
                                   
                                    <div class="text-center table-responsive">
                                        <table class="table table-bordered ">
                                            <thead>
                                              <tr>
                                                 @if($item->single_price != '')
                                                    <th>{{ trans('site.tours.single') }}</th>
                                                 @endif
                                                 @if($item->double_price != '')
                                                    <th>{{ trans('site.tours.double') }}</th>
                                                 @endif
                                                 @if($item->triple_price != '')
                                                    <th>{{ trans('site.tours.triple') }}</th>
                                                 @endif
                                                   
                                                 @if($item->child_price1 != '')
                                                    <th>{{ trans('site.tours.child-2-6') }}</th>
                                                 @endif
                                                 @if($item->child_price2 != '')
                                                    <th>{{ trans('site.tours.child-6-12') }}</th>
                                                 @endif
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                @if($item->single_price != '')
                                                    <td>${{$item->single_price}}</td>
                                                 @endif
                                                 @if($item->double_price != '')
                                                    <td>${{$item->double_price}}</td>
                                                 @endif
                                                 @if($item->triple_price != '')
                                                    <td>${{$item->triple_price}}</td>
                                                 @endif
                                                  
                                                 @if($item->child_price1 != '')
                                                    <td>%{{$item->child_price1}}</td>
                                                 @endif
                                                 @if($item->child_price2 != '')
                                                    <td>%{{$item->child_price2}}</td>
                                                 @endif
                                              </tr>
                                              <tr>
                                                @if($item->single_price != '')
                                                    <td>{{ trans('site.tours.person-price') }}</td>
                                                 @endif
                                                 @if($item->double_price != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif
                                                 @if($item->triple_price != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif

                                                 @if($item->child_price1 != '')
                                                    <td>{{ trans('site.tours.per-child') }}</td>
                                                 @endif
                                                 @if($item->child_price2 != '')
                                                    <td>{{ trans('site.tours.per-child') }}</td>
                                                 @endif
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="visible-xs">
                                        <small style="color:red;">{{ trans('site.tours.swap-table-to-see-all-prices') }} </small>
                                    </div>
                                    <br>
                                    
                                @elseif($item->prices_type == 2)
                                    <div class="text-center table-responsive">
                                        <table class="table table-bordered ">
                                            <thead>
                                              <tr>
                                                 @if($item->person1_price != '')
                                                    <th>{{ trans('site.tours.single') }}</th>
                                                 @endif
                                                 @if($item->person2_3_price != '')
                                                    <th>2-3 {{ trans('site.tours.person') }}</th>
                                                 @endif
                                                 @if($item->person4_6_price != '')
                                                    <th>4-6 {{ trans('site.tours.person') }}</th>
                                                 @endif
                                                  @if($item->person7_10_price != '')
                                                    <th>7-10 person</th>
                                                 @endif
                                                    <th>11 & {{ trans('site.tours.more') }}</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                @if($item->person1_price != '')
                                                    <td>${{$item->person1_price}}</td>
                                                 @endif
                                                 @if($item->person2_3_price != '')
                                                    <td>${{$item->person2_3_price}}</td>
                                                 @endif
                                                 @if($item->person4_6_price != '')
                                                    <td>${{$item->person4_6_price}}</td>
                                                 @endif
                                                 @if($item->person7_10_price != '')
                                                    <td>${{$item->person7_10_price}}</td>
                                                 @endif
                                                  <td>For Group</td>
                                              </tr>
                                              <tr>
                                                @if($item->person1_price != '')
                                                    <td>{{ trans('site.tours.person-price') }}</td>
                                                 @endif
                                                 @if($item->person2_3_price != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif
                                                 @if($item->person4_6_price != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif
                                                 @if($item->person7_10_price != '')
                                                    <td>{{ trans('site.tours.per-person') }}</td>
                                                 @endif
                                                  <td><a href="{{url('/contact-us')}}" target="_blank">{{ trans('site.global.header.contact-us') }}</a></td>
                                                 
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="visible-xs">
                                        <small style="color:red;">{{ trans('site.tours.swap-table-to-see-all-prices') }}</small>
                                    </div>
                                @endif
                            
                                <br>
                                <span><strong>{{ trans('site.tours.prices-policy') }}:</strong></span>
                                <hr>
                                {!! $item->price_policy !!}
                                
                            
                            </div>
                        @endif
                            <div class="tab-pane fade" id="tab-6">
                                <br>
                                {!! $item->notes !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                     <div class="gap gap-small"></div>            
                     @include('site.pages.item.book-now')
                     <!--@include('site.pages.item.rating')-->
                     @if($item->longitude!= '' && $item->latitude != '')
                     <div class="gap gap-small"></div> 
                     <div id="map"  class="img-thumbnail well" style="height: 300px; width: 100%; "></div>
                     @endif
                </div>
            </div>
            <div class="gap"></div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <h4>{{ trans('site.tours.reviews') }}</h4>
                    <div class="gap gap-small"></div>
                    @include('site.pages.item.reviews')
                    <div class="gap gap-small"></div>
                </div>
                <div class="col-md-4">
                    <h4>{{ trans('site.tours.related-tours') }}</h4>
                    <div class="gap gap-small"></div>
                    @include('site.pages.item.related-items')
                </div>
            </div>
            
        </div>
    </div>

@endsection
@section('script')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR5PFyvraK8Cqbu-vQu7UAR-NkcABHNuw&callback=initMap">
</script>
<script>
    var bu_latitude = {!! $item->latitude !!};
    var bu_longitude = {!! $item->longitude !!};

    function initMap() {
        var myLatLng = {lat: bu_latitude , lng: bu_longitude };

        // Create a map object and specify the DOM element
        // for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 8
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'map'
        });
    }
</script>
<script type="text/javascript">
     jQuery(document).ready(function(){
         
        
        jQuery('#contact-form').click(function(e){
             var token = jQuery('meta[name="csrf-token"]').attr('content');
            jQuery("#alert").css("display","none");
            jQuery("#contact-form").css("display","none");
           e.preventDefault();
           jQuery.ajax({
              url: "{{ url('/contactform') }}",
              headers: {'X-CSRF-TOKEN': token},
              method: 'post',
              data: {
                 item: jQuery('#item_id').val(),
                 name: jQuery('#name').val(),
                 email: jQuery('#email').val(),
                 text: jQuery('#request-text').val(),
              },
              success: function(result){
                  jQuery("#contact-form").css("display","block");
                  if(result['status'] == 1){
                      jQuery('#name').val('');
                      jQuery('#email').val('');
                      jQuery('#request-text').val('');
                      jQuery("#alert-success1").css("display","block");
                      jQuery("#alert-success1").html(result['msg']);
                  }
                  if(result['status'] == 0){
                      jQuery("#alert-fail1").css("display","block");
                      jQuery("#alert-fail1").html(result['msg']);
                  }
                 
            }});
       });
        
        jQuery('#submit-form').click(function(e){
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            jQuery("#alert").css("display","none");
            jQuery("#submit-form").css("display","none");
           e.preventDefault();
           jQuery.ajax({
              url: "{{ url('/reviewform') }}",
              headers: {'X-CSRF-TOKEN': token},
              method: 'post',
              data: {
                 name: jQuery('#name1').val(),
                 email: jQuery('#email1').val(),
                 text: jQuery('#request-text1').val(),
                 item: jQuery('#reviewitem1').val(),
              },
              success: function(result){
                  jQuery("#submit-form").css("display","block");
                  if(result['status'] == 1){
                      jQuery('#name1').val('');
                      jQuery('#email1').val('');
                      jQuery('#request-text1').val('');
                      jQuery("#alert-success").css("display","block");
                      jQuery("#alert-success").html(result['msg']);
                  }
                  if(result['status'] == 0){
                      jQuery("#alert-fail").css("display","block");
                      jQuery("#alert-fail").html(result['msg']);
                  }
            }});
       });
    });
</script>
@endsection