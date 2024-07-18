@extends('frontend.layout')

@section('content')

<div class="destination_banner_wrap overlay" style="background-image: url({{ Storage::url($destination->image) }});">
    <div class="destination_text text-center">
      <h3>{{$destination->city}}</h3>
      <p>{{$destination->province}}</p>
    </div>
  </div>

  <div class="destination_details_info">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9">
          <div class="destination_info">
            <h3>Description</h3>
            <p class="text-justify">{{$destination->description}}</p>
          </div>
          <div class="bordered_1px"></div>
          <div class="contact_join">
            <h3 class="text-center">Booking</h3>
            <form action="#">
              <div class="row">
                <div class="col-lg-12">
                  <div class="submit_btn">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone={{$destination->number}}&text=Saya%20tertarik%20dengan%20project%20portofolio%20anda" class="boxed-btn4 d-block"
                      ><i class="fa fa-whatsapp"></i> Whatsapp</a
                    >
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
