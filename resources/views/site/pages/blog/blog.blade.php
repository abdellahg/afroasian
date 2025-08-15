@extends('site.layouts.app')
@section('title')
- Blogs
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
        <h2 style="font-weight:400;">{{$blog->title}}</h2>
    </div>
    <div class="container">
        <!-- START BLOG POST -->
        <div class="article post">
            <header class="post-header">
                <span class="hover-img" style="max-height: 500px;">
                    <img src="{{ url('/').'/public/assets/uploads/blogs/'.$blog->photo }}" alt="{{$blog->title}}" title="{{$blog->title}}" />
                </span>
            </header>
            <div class="post-inner">
                <p class="post-desciption" style="color:#333;">{!! $blog->text !!}</p>
            </div>
        </div>
    </div>

@endsection