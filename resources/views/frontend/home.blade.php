@extends('frontend.layout')

@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            @foreach ($sliders as $slider)
                <div style="background-image: url( {{ Storage::url($slider->image) }});";
                    class="single_slider d-flex align-items-center overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="slider_text text-center">
                                    <h3>{{ $slider->title }}</h3>
                                    <p>{{ $slider->subtitle }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- slider_area_end -->

        <!-- destination -->
        <div class="popular_places_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb_70">
                            <h3>Popular Destination</h3>
                            <p>
                                Suffered alteration in some form, by injected humour or good day
                                randomised booth anim 8-bit hella wolf moon beard words.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($destinations as $destination)
                        <div class="col-lg-4 col-md-6">
                            <div class="single_place">
                                <div class="thumb">
                                    <img src="{{ Storage::url($destination->image) }}" alt="" />
                                    <a href="{{route('destination.show', $destination->city)}}" class="prise">{{$destination->price}}</a>
                                </div>
                                <div class="place_info">
                                    <a href="{{route('destination.show', $destination->city)}}">
                                        <h3>{{$destination->city}}</h3>
                                    </a>
                                    <p>{{$destination->province}}</p>
                                    <div class="rating_days d-flex justify-content-between">
                                        <div class="days">
                                            <i class="fa fa-clock-o"></i>
                                            <a href="{{route('destination.show', $destination->city)}}">{{$destination->duration}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end -->

        <div class="travel_variation_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_travel text-center">
                            <div class="icon">
                                <img src="template/img/svg_icon/1.svg" alt="" />
                            </div>
                            <h3>Comfortable Journey</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_travel text-center">
                            <div class="icon">
                                <img src="template/img/svg_icon/2.svg" alt="" />
                            </div>
                            <h3>Luxuries Hotel</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_travel text-center">
                            <div class="icon">
                                <img src="template/img/svg_icon/3.svg" alt="" />
                            </div>
                            <h3>Travel Guide</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- testimonial_area  -->
        <div class="testimonial_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                        <div class="testmonial_active owl-carousel">
                            @foreach ($testimonials as $testimonial)
                            <div class="single_carousel">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="single_testmonial text-center">
                                            <div class="author_thumb">
                                                <img src="{{ Storage::url($testimonial->photo) }}" alt="" class="rounded-circle"/>
                                            </div>
                                            <p>
                                                {{$testimonial->title}}
                                            </p>
                                            <div class="testmonial_author">
                                                <h3>- {{$testimonial->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- /testimonial_area  -->
    @endsection
