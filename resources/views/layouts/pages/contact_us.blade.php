@extends('layouts.front_layouts.front_layout')

@section('header_section')

@endsection

@section('slider')

@endsection

@section('block_feature')

@endsection

@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__title">
                    <h1>Contact Us</h1></div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="card mb-0 contact-us">
                    <div class="card-body">
                        <div class="contact-us__container">
                            <div class="row">
                                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                    <h4 class="contact-us__header card-title">Our Address</h4>
                                    <div class="contact-us__address">
                                        <p>Sirajgong
                                            <br>Email: admin@royalfood.com
                                            <br>Phone Number: 017xx xxx xxx</p>
                                        <p><strong>Opening Hours</strong>
                                            <br>Monday to Friday: 8am-8pm
                                            <br>Saturday: 8am-6pm
                                            <br>Sunday: 10am-4pm</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="contact-us__header card-title">Leave us a Message</h4>
                                    <form action="{{ route('contactus_process') }}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="form-name">Your Name</label>
                                                <input type="text" id="form-name" class="form-control" placeholder="Your Name" name="name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="form-email">Email</label>
                                                <input type="email" id="form-email" class="form-control" placeholder="Email Address" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-subject">Subject</label>
                                            <input type="text" id="form-subject" class="form-control" placeholder="Subject" name="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="form-message">Message</label>
                                            <textarea id="form-message" class="form-control" rows="4" name="message"></textarea>
                                        </div>
                                        <button type="submit" value="submit" class="btn btn-primary">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_section')
@endsection
