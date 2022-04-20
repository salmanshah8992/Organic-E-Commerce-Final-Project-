@extends('layouts.frontend_master')

@section('main_content')

<div class="container">
    <div class="contact-page">
        <div class="contact-info">
            <div class="row" style="margin-top: 100px;">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item d-flex">
                        <div class="item-left">
                            <div class="icon"><i class="zmdi zmdi-email"></i></div>
                        </div>
                        <div class="item-right d-flex">
                            <div class="title">Email:</div>
                            <div class="content">
                                <a href="mailto:support@domain.com">support@domain.com</a><br>
                                <a href="mailto:contact@domain.com">contact@domain.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item d-flex justify-content-center">
                        <div class="item-left">
                            <div class="icon"><i class="zmdi zmdi-home"></i></div>
                        </div>
                        <div class="item-right d-flex">
                            <div class="title">Address:</div>
                            <div class="content">
                                Ekramul Mansion (9th floor),Mogbazar ,
                                New Eskaton ,Romna Dhaka-1217
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item d-flex justify-content-end">
                        <div class="item-left">
                            <div class="icon"><i class="zmdi zmdi-phone"></i></div>
                        </div>
                        <div class="item-right d-flex">
                            <div class="title">Holine:</div>
                            <div class="content">
                                0123-456-78910<br>
                                0987-654-32100
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br>

            <div class="text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9791421055015!2d90.40057411536264!3d23.748123194779453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8eed0f9b3b9%3A0x790d8925c92d4242!2sAlhaz%20Shamsuddin%20Mansion!5e0!3m2!1sen!2sbd!4v1649478287359!5m2!1sen!2sbd" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        {{-- <div class="contact-map">
            <div id="map"></div>
            <div class="hidden-lg hidden-md hidden-sm hidden-xs contact-address">815 Sunset Boulevard Ca 70079</div>
        </div>

        <div class="contact-intro">
            <p>“Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vultate cursus a sit amet mauris. Proin gravida nibh vel velit auctor”</p>
            <img src="{{ asset('frontend') }}/img/contact-icon.png" alt="Contact Comment">
        </div>

        <div class="contact-form form">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="text" name="name" placeholder="YOUR NAME">
                    </div>

                    <div class="col-md-6">
                        <input type="email" name="email" placeholder="YOUR EMAIL">
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" name="subject" placeholder="SUBJECT">
                </div>

                <div class="form-group">
                    <textarea rows="10" name="content" placeholder="MESSAGE"></textarea>
                </div>

                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Send Message">
                </div>
            </form>
        </div> --}}
    </div>
</div>

@endsection
