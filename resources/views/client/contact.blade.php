@extends('client.layout.app')
@section('title')
    {{__('UB Work')}} | Liên hệ
@endsection
@section('content')
    <section class="map-section" style="margin-top: 80px;">
      <div class="map-outer">
        <div class="map-canvas" >
          <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639810443356!2d105.74459841485445!3d21.038127785993236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1sen!2s!4v1669817951321!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
    <!-- End Map Section -->


    <!-- Contact Section -->
    <section class="contact-section">
      <div class="auto-container">
        <div class="upper-box">
          <div class="row">
            <div class="contact-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box">
                <span class="icon"><img src="{{ asset('/assets/client-bower/images/icons/placeholder.svg')}}" alt=""></span>
                <h4>Địa chỉ</h4>
                <p>Trịnh Văn Bô Hà Nội.</p>
              </div>
            </div>
            <div class="contact-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box">
                <span class="icon"><img src="{{ asset('/assets/client-bower/images/icons/smartphone.svg')}}" alt=""></span>
                <h4>Số điện thoại</h4>
                <p><a href="#" class="phone">036868686868</a></p>
              </div>
            </div>
            <div class="contact-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box">
                <span class="icon"><img src="{{ asset('/assets/client-bower/images/icons/letter.svg')}}" alt=""></span>
                <h4>Email</h4>
                <p><a href="#">ubwork@gmail.com</a></p>
              </div>
            </div>
          </div>
        </div>


        <!-- Contact Form -->
        <div class="contact-form default-form">
          <h3>Để lại lời nhắn cho chúng tôi</h3>
          <!--Contact Form-->
          <form method="post" action="{{route('post_contact')}}" id="email-form">
            @csrf
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <label>Họ tên</label>
                <input type="text" name="name" class="username" placeholder="Họ tên *" required>
              </div>

              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <label>Email</label>
                <input type="email" name="email" class="email" placeholder="Email *" required>
              </div>

              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <label>Số điện thoại</label>
                <input type="number" name="phone" class="username" placeholder="Số điện thoại " required>
              </div>

              <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="email" placeholder="Địa chỉ *" required>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Tiêu đề</label>
                <input type="text" name="title" class="subject" placeholder="Tiêu đề *" required>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <label>Nội dung</label>
                <textarea name="content" placeholder="Nội dung..." required=""></textarea>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-one" type="submit" id="submit" name="submit-form">Gửi</button>
              </div>
            </div>
          </form>
        </div>
        <!--End Contact Form -->
      </div>
    </section>
    <!-- Contact Section -->

    <!-- Call To Action -->
    <section class="call-to-action style-two">
      <div class="auto-container">
        <div class="outer-box">
          <div class="content-column">
            <div class="sec-title">
              <h2>Recruiting?</h2>
              <div class="text">Advertise your jobs to millions of monthly users and search 15.8 million<br> CVs in our database.</div>
              <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Start Recruiting Now</span></a>
            </div>
          </div>

          <div class="image-column" style="background-image: url(images/resource/image-1.png);">
            <figure class="image"><img src="images/resource/image-1.png" alt=""></figure>
          </div>
        </div>
      </div>
    </section>
@endsection

