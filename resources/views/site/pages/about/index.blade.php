@extends('site.layouts.app')
@section('title')
- About us
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
         @foreach($pagessettings as $pagessetting)
            @if(getLang() == 1)
                @if($pagessetting->name_setting == 'about_title1_en')
                <h2>{{ $pagessetting->value }}</h2>
                @endif
            @elseif(getLang() == 2)
                @if($pagessetting->name_setting == 'about_title1_es')
                <h2>{{ $pagessetting->value }}</h2>
                @endif
            @elseif(getLang() == 3)
                @if($pagessetting->name_setting == 'about_title1_pt')
                <h2>{{ $pagessetting->value }}</h2>
                @endif
            @endif
         @endforeach 
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="text-bigger">
                        @foreach($pagessettings as $pagessetting)
                            @if(getLang() == 1)
                                @if($pagessetting->name_setting == 'about_text1_en')
                                {{ $pagessetting->value }}
                                @endif
                            @elseif(getLang() == 2)
                                @if($pagessetting->name_setting == 'about_text1_es')
                                {{ $pagessetting->value }}
                                @endif
                            @elseif(getLang() == 3)
                                @if($pagessetting->name_setting == 'about_text1_pt')
                                {{ $pagessetting->value }}
                                @endif
                            @endif
                         @endforeach
                    </p>
                </div>
            </div>
            <div class="gap"></div>
        </div>
        <div class="bg-holder">
            <div class="bg-parallax" style="background-image:url({{ url('assets/site/uploads/about/about-us.jpg') }});">
            </div>
            <div class="bg-mask"></div>
            <div class="bg-holder-content">
                <div class="container">
                    <div class="gap gap-big text-white">
                        <div class="row">
                            <div class="col-md-10">
                                @foreach($pagessettings as $pagessetting)
                                    @if(getLang() == 1)
                                        @if($pagessetting->name_setting == 'about_title2_en')
                                        <h2>{{ $pagessetting->value }}</h2>
                                        @endif
                                    @elseif(getLang() == 2)
                                        @if($pagessetting->name_setting == 'about_title2_es')
                                        <h2>{{ $pagessetting->value }}</h2>
                                        @endif
                                    @elseif(getLang() == 3)
                                        @if($pagessetting->name_setting == 'about_title2_pt')
                                        <h2>{{ $pagessetting->value }}</h2>
                                        @endif
                                    @endif
                                 @endforeach
                                <p class="text-bigger">
                                     @foreach($pagessettings as $pagessetting)
                                        @if(getLang() == 1)
                                            @if($pagessetting->name_setting == 'about_text2_en')
                                            {{ $pagessetting->value }}
                                            @endif
                                        @elseif(getLang() == 2)
                                            @if($pagessetting->name_setting == 'about_text2_es')
                                            {{ $pagessetting->value }}
                                            @endif
                                        @elseif(getLang() == 3)
                                            @if($pagessetting->name_setting == 'about_text2_pt')
                                            {{ $pagessetting->value }}
                                            @endif
                                        @endif
                                     @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="gap"></div>
            @foreach($pagessettings as $pagessetting)
                @if(getLang() == 1)
                    @if($pagessetting->name_setting == 'about_title3_en')
                    <h2>{{ $pagessetting->value }}</h2>
                    @endif
                @elseif(getLang() == 2)
                    @if($pagessetting->name_setting == 'about_title3_es')
                    <h2>{{ $pagessetting->value }}</h2>
                    @endif
                @elseif(getLang() == 3)
                    @if($pagessetting->name_setting == 'about_title3_pt')
                    <h2>{{ $pagessetting->value }}</h2>
                    @endif
                @endif
             @endforeach
            <div class="row">
                <div class="col-md-8">
                    <p class="text-bigger">
                        @foreach($pagessettings as $pagessetting)
                            @if(getLang() == 1)
                                @if($pagessetting->name_setting == 'about_text3_en')
                                {{ $pagessetting->value }}
                                @endif
                            @elseif(getLang() == 2)
                                @if($pagessetting->name_setting == 'about_text3_es')
                                {{ $pagessetting->value }}
                                @endif
                            @elseif(getLang() == 3)
                                @if($pagessetting->name_setting == 'about_text3_pt')
                                {{ $pagessetting->value }}
                                @endif
                            @endif
                         @endforeach
                    </p>
                </div>
            </div>
        </div>
    <div class="gap"></div>
@endsection