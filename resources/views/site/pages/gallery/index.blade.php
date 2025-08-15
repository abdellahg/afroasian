@extends('site.layouts.app')
@section('title')
- {{$gallery->name }}
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
    <div id="popup-gallery">
        <div class="row row-col-gap">
            @foreach($photos as $photo)
            <div class="col-md-4">
                <a class="hover-img popup-gallery-image" href="{{ url('/').'/public/assets/uploads/galleries/'.$photo->photo_title }}" data-effect="mfp-zoom-out">
                    <img style="height: 250px;" src="{{ url('/').'/public/assets/uploads/galleries/'.$photo->photo_title }}" alt="{{ $photo->photo_title }}" title="{{ $photo->photo_title }}" /><i class="fa fa-plus round box-icon-small hover-icon i round"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="gap"></div>
@endsection