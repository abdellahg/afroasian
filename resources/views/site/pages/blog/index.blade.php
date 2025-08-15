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

<div class="container">
    <div class="gap"></div>
    <div id="popup-gallery">
        <div class="row row-col-gap">
            @foreach($blogs as $key=>$blog)
            @if ($key % 2 == 0 && $key != 0 )
               <div class="clearfix"></div>
               <br>
            @endif
            <div class="col-md-6 text-center">
                <div class="thumb">
                    <span class="hover-img " href="" data-effect="mfp-zoom-out">
                        <img src="{{ url('/').'/public/assets/uploads/blogs/'.$blog->photo }}" alt="{{$blog->title}}" title="{{$blog->title}}" />
                    </span>
                    <a href="{{url('/blog/'.getBlogEnSlug($blog->id))}}" >
                        <h3 style="font-weight:400;margin-top:10px;">{{$blog->title}}</h3>
                        <p style="color:#333;">{!! strip_tags(substr($blog->text , 0, 150)) !!}</p>
                    </a>
                    <a href="{{url('/blog/'.getBlogEnSlug($blog->id))}}" class="btn btn-primary">{{ trans('site.tours.more') }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="gap"></div>
</div>

@endsection