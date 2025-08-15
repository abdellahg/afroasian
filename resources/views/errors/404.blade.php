@extends('site.layouts.app')
@section('title')
- 404
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
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <p class="text-hero">404</p>
                <h1>Page is not found</h1>
                <div class="gap"></div>
            </div>
        </div>
    </div>
                
        
@endsection
