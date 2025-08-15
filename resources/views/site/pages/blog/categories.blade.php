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
            @foreach($categories as $key=>$category)
            @if ($key % 2 == 0 && $key != 0 )
               <div class="clearfix"></div>
               <br>
            @endif

            <div class="col-md-6 text-center">
                <div class="thumb">
                    <span class="hover-img " href="" data-effect="mfp-zoom-out">
                        <img src="{{ url('/').'/public/assets/uploads/bcategories/'.$category->photo }}" alt="{{$category->name}}" title="{{$category->name}}" />
                    </span>
                    <a href="{{url('/blogs/category/'.getBcategoryEnSlug($category->id))}}" >
                        <h3 style="font-weight:400;margin-top:10px;">{{$category->name}}</h3>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="gap"></div>
</div>

@endsection