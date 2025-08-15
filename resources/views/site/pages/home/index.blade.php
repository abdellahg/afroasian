@extends('site.layouts.app')
@section('title')
 
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

   @include('site.pages.home.top-area')
   @include('site.pages.home.services')
   @include('site.pages.home.last-minutes')
   @include('site.pages.home.last-deals')
   @include('site.pages.home.last-reviews')
   @include('site.pages.home.top-destinations')
  
@endsection