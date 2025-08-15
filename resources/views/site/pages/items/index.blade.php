@extends('site.layouts.app')
@section('title')
- {{$category->name}}
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
        <br>
        @include('site.pages.items.breadcrumb')
        <br><br>
        <div class="row">
            @include('site.pages.items.left-side')
            @include('site.pages.items.list-items')
        </div>
         <div class="gap"></div>
    </div>

@endsection