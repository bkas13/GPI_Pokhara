@extends('front.master')

@push('style')
<link  rel ="stylesheet" href="{{ asset('front/assets/css/about.css') }}"/>
<style>
    .faq {
        padding: 20px 0;
    }
    .faq .faq-list {
    padding: 0;
    list-style: none;
    }
    .faq .faq-list li {
        background-color: #2c81cc;
        margin-bottom: 10px;
        border-radius: 10px;
        padding: 10px 40px;
    }
    .faq .faq-list a {
        display: block;
        position: relative;
        font-size: 16px;
        font-weight: 600;
        color: #ffffff;
        text-decoration: none;
    }
    .faq .faq-list p {
        color: #ffffff;
    }

    .faq .faq-list i {
    font-size: 16px;
    position: absolute;
    left: -25px;
    top: 6px;
    transition: 1s;
    }
    .faq-title {
        text-align: center;
        font-size: 17px;
        border-bottom: 2px dashed #ffffff;
        margin-bottom: 30px;
        padding-bottom: 10px;
        color: #ffffff;
    }

    .faq .faq-list p {
    padding-top: 5px;
    margin-bottom: 20px;
    font-size: 15px;
    }

    .collapsed i.fas.fa-arrow-up {

    }
    .collapsed i.fas.fa-arrow-up {
        transform: rotate(180deg);
    }
</style>
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset( isset($settings['bannerImage']) ? $settings['bannerImage']: "") }}" alt="" />
            <div class="overlay">
                <div class="title">
                    Frequently asked questions
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                FAQ
            </li>
        </ol>
    </nav>
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-title">
                        Faqs
                    </div>
                    <div class="about-detail faq">
                        <ul class="faq-list">
                            <li data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                              <a data-toggle="collapse" class="collapsed" href="#faq1" aria-expanded="false">Non consectetur a erat nam at lectus urna duis? <i class="fas fa-arrow-up"></i></a>
                              <div id="faq1" class="collapse" data-parent=".faq-list" style="">
                                <p>
                                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                                </p>
                              </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
                              <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="fas fa-arrow-up"></i></a>
                              <div id="faq2" class="collapse" data-parent=".faq-list">
                                <p>
                                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                </p>
                              </div>
                            </li>

                          </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
