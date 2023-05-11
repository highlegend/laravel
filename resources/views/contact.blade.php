@extends('master')
@section('content')

<!--Page Title-->
<section class="page-title text-center" style="background-image:url(images/background/3.jpg);">
    <div class="container">
        <div class="title-text">
            <h1>Contact</h1>
            <ul class="title-menu clearfix">
                <li>
                    <a href="index.html">home &nbsp;/</a>
                </li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<section class="section contact">
  <!-- container start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-5 ">
        <!-- address start -->
        <div class="address-block">
          <!-- Location -->
          <div class="media">
            <i class="far fa-map"></i>
            <div class="media-body">
              <h3>Location</h3>
              <p>PO Box 16122 Collins Street West <br>Victoria 8007 Canada</p>
            </div>
          </div>
          <!-- Phone -->
          <div class="media">
            <i class="fas fa-phone"></i>
            <div class="media-body">
              <h3>Phone</h3>
              <p>
                (+48) 564-334-21-22-34
                <br>(+48) 564-334-21-22-38
              </p>
            </div>
          </div>
          <!-- Email -->
          <div class="media">
            <i class="far fa-envelope"></i>
            <div class="media-body">
              <h3>Email</h3>
              <p>
                info@templatepath.com
                <br>info@cleanxer.com
              </p>
            </div>
          </div>
        </div>
        <!-- address end -->
      </div>
      <div class="col-lg-8 col-md-7">
        <div class="contact-form">
          <!-- contact form start -->
            @isset($info)
                <h2>Bienvenue dans votre espace membre</h2>
                <h3>Vous etes: {{$info->name}}</h3>
                <h3>Votre email est: {{$info->email}}</h3>
                <h3>Votre message est: {{$info->message}}</h3>
            @else
          <form method="post" class="row"> 
            @csrf
            <!-- name -->
            <div class="col-lg-6">
              <input type="text" name="name" class="form-control main" placeholder="Name" required>
            </div>
            <!-- email -->
            <div class="col-lg-6">
              <input type="email" name="email" class="form-control main" placeholder="Email" required>
            </div>
            <!-- phone -->
            <div class="col-lg-12">
              <input type="text" name="phone" class="form-control main" placeholder="Phone" required>
            </div>
            <!-- message -->
            <div class="col-lg-12">
              <textarea name="message" rows="10" class="form-control main" placeholder="Your message"></textarea>
            </div>
            <!-- submit button -->
            <div class="col-md-12 text-right">
              <button class="btn btn-style-one" type="submit">Send Message</button>
            </div>
          </form>
          @endisset
          <!-- contact form end -->
        </div>
      </div>
    </div>
  </div>
  <!-- container end -->
</section>
<!--====  End of Contact Form  ====-->

<section class="map">
  <!-- Google Map -->
  <div id="map"></div>
</section>
<!--====  End of Google Map  ====-->

@endsection