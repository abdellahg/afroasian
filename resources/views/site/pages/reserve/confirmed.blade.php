@extends('site.layouts.app')
@section('title')
- Confirmed
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
@section('content')
   <div class="gap"></div>
    <div class="container">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <i class="fa fa-check round box-icon-large box-icon-center box-icon-success mb30"></i>	
                    <h2 class="text-center">{{$name}}, {{ trans('site.tours.your-reservation-was-successful') }}</h2>
                    <h5 class="text-center mb30">{{ trans('site.tours.reservation-details-send') }} {{$email}}</h5>
                    
                    
                </div>
            </div>
    <div class="gap"></div>
    </div>
@endsection