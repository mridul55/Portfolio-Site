@extends('frontend.main_master')

@section('main')

            <!-- banner-area -->
           @include('frontend.home.home_slide')
            <!-- banner-area-end -->

            <!-- about-area -->
            @include('frontend.home.about_menu')
            <!-- about-area-end -->

            <!-- services-area -->
            @include('frontend.home.services_menu')
            <!-- services-area-end -->

            <!-- work-process-area -->
            @include('frontend.home.work__process')
            <!-- work-process-area-end -->

            <!-- portfolio-area -->
            @include('frontend.home.portfolio')
            <!-- portfolio-area-end -->

            <!-- partner-area -->
            @include('frontend.home.partner')
            <!-- partner-area-end -->
{{-- 
            <!-- testimonial-area -->
            @include('frontend.home.testimonial')
            <!-- testimonial-area-end --> --}}

            <!-- blog-area -->
            @include('frontend.home.blog_menu')
            <!-- blog-area-end -->

            <!-- contact-area -->
            @include('frontend.home.contact_menu')
            <!-- contact-area-end -->
@endsection