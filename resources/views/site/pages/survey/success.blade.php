@extends('site.layouts.app')
@section('title')
- Success
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
        <div class="container text-center">
         <h2> {{ trans('site.survey.success') }} </h2> 
         <p><strong>{{ trans('site.survey.quality-control') }}</strong></p>
         <p>
             {{ trans('site.survey.success-msg') }}
         </p>
        </div>
        
        
@endsection
