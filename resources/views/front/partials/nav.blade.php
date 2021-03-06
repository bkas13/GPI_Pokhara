<style>
    .mobile-nav .mobile-nav-wrapper {
        display: none;
    }

    .mobile-nav.active .mobile-nav-wrapper {
        display: block;
    }

    .mobile-nav .mobile-nav-dropdown {
        font-size: 24px;
        border: none;
        text-decoration: none;
        background: none;
        color: white;
    }

    .mobile-nav .mobile-nav-dropdown:focus {
        outline: none;
    }

    .nested-list-wrap {
        display: block;
        position: relative;

    }

    .nested-list-wrap .nested-title {
        font-size: 18px;
        font-weight: bold;
        width: 100%;
        padding: 20px;
        align-items: center;
        display: flex;
        justify-content: space-between;
    }

    .nested-list-wrap .nested-title i {
        text-align: right;
    }

    .nested-list-wrap .nested-list {
        position: absolute;
        left: 172px;
        top: 15px;
        overflow: hidden;
        padding: 0;
        min-width: 180px;
        display: none;
    }

    .nested-list-wrap:hover .nested-list {
        display: inline-block
    }

</style>
<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div class="overlay-content">
        <a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a>

        <div class="mobile-nav" id="myDIV1">
            <button class="mobile-nav-dropdown" onclick=myFunction1()>
                {{ getFrontLanguage('school-overview') }} <i class="fa fa-caret-down"></i>
            </button>
            <div class="mobile-nav-wrapper">
                <a href="{{ route('front.about') }}">{{ getFrontLanguage('about-us') }}</a>
                {{-- <a href="{{ route('front.mission-vision') }}">Vision & Mission</a> --}}
                <a href="{{ route('front.principal-note') }}">{{ getFrontLanguage('administration-note') }}</a>
                <a href="{{ route('front.gallery') }}">{{ getFrontLanguage('gallery') }}</a>
                <a href="{{ route('front.boardofdirectors') }}"> कार्यसमिती </a>

            </div>
        </div>

        {{-- <div class="dropdown"> --}}
        {{-- <button class="dropbtn"> --}}
        {{-- {{ getFrontLanguage('facilities')}} <i class="fa fa-caret-down"></i> --}}
        {{-- </button> --}}
        {{-- <div class="dropdown-content"> --}}
        {{-- @foreach (get_asset_categories(1) as $category) --}}
        {{-- <a href="{{ route('front.asset_category', [$category->id,getNepaliDate($category->created_at)]) }}">{{$category->title}}</a> --}}
        {{-- @endforeach --}}
        {{-- </div> --}}
        {{-- </div> --}}
        <div class="mobile-nav" id="myDIV2">
            <button class="mobile-nav-dropdown" onclick=myFunction2()>
                {{ getFrontLanguage('members-enrolled') }} <i class="fa fa-caret-down"></i>
            </button>
            <div class="mobile-nav-wrapper">
                @foreach (get_staff_types(1) as $type)
                    <a href="{{ route('front.staffs', $type->slug) }}">{{ $type->title }}</a>
                @endforeach

            </div>
        </div>
        <a href="{{ route('front.students') }}">{{ getFrontLanguage('student-detail') }}</a>
        <div class="mobile-nav" id="myDIV3">
            <button class="mobile-nav-dropdown" onclick=myFunction3()>
                {{ getFrontLanguage('information') }} <i class="fa fa-caret-down"></i>
            </button>
            <div class="mobile-nav-wrapper">
                <a href="{{ route('front.notice') }}">{{ getFrontLanguage('notice-1') }}</a>
                <a href="{{ route('front.news') }}">{{ getFrontLanguage('news-1') }}</a>
                <a href="{{ route('front.events') }}">{{ getFrontLanguage('event') }}</a>
                <a href="{{ route('front.tender') }}">{{ getFrontLanguage('tender-1') }}</a>
                <a href="{{ route('front.download') }}">{{ getFrontLanguage('download') }}</a>
            </div>
        </div>
        <a href="{{ route('front.calendar') }}">{{ getFrontLanguage('calendar') }}</a>
        <div class="mobile-nav" id="myDIV4">
            <button class="mobile-nav-dropdown" onclick=myFunction4()>
                {{ getFrontLanguage('result-1') }} <i class="fa fa-caret-down"></i>
            </button>
            <div class="mobile-nav-wrapper">
                @foreach (get_result_years() as $result_year)
                    <a href="{{ route('front.result', $result_year) }}">{{ $result_year }}</a>
                @endforeach
            </div>
        </div>

        <a href="{{ route('front.contact') }}">{{ getFrontLanguage('contact-us') }}</a>

    </div>
</div>
<div class="navbar">
    <div class="navbar-container container">
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset('admin/pokhara_ngpk.png') }}" class="img-fluid" alt="" />
        </a>
        <div class="company-container">
            <div class="province">
                प्रदेश सरकार
            </div>
            <div class="company-name pt-2 pb-2">
                {{ isset($settings['name']) ? $settings['name'] : 'High School' }}
            </div>
            <div class="province_name">
                {{ isset($settings['address']) ? $settings['address'] : '' }}
            </div>
        </div>
        <div class="flag-container">
            <img src="{{ asset(isset($settings['logo']) ? $settings['logo'] : 'front/assets/images/logo.png') }}"
                class="img-fluid" alt="" />
        </div>
    </div>
</div>
<div class="container"></div>
<div class="secondary-navbar collapses">
    <div class="container">

        <ul class="d-none d-lg-flex">
            <li>
                <a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a>

            </li>
            <li class=" nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                    id="navbar-dropdown-menu-link-239" aria-haspopup="true" aria-expanded="false">
                    {{ getFrontLanguage('school-overview') }}</a>

                <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
                    <a href="{{ route('front.about') }}">{{ getFrontLanguage('about-us') }}</a>
                    {{-- <a href="{{ route('front.mission-vision') }}">Vision & Mission</a> --}}
                    <a
                        href="{{ route('front.principal-note') }}">{{ getFrontLanguage('administration-note') }}</a>
                    <a href="{{ route('front.boardofdirectors') }}"> कार्यसमिती </a>
                    <a href="{{ route('front.gallery') }}">{{ getFrontLanguage('gallery') }}</a>
                    <a href="{{ route('front.faqs') }}">FAQs</a>
                </div>
            </li>
            <li class=" nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbar-dropdown-menu-link-239">
                    कर्मचारीहरु </a>

                <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
                    @foreach (get_staff_types(1) as $type)
                        <a href="{{ route('front.staffs', $type->slug) }}">{{ $type->title }}</a>
                    @endforeach
                </div>
            </li>
            <li>
                <a href="{{ route('front.students') }}">{{ getFrontLanguage('student-detail') }}</a>
            </li>
            <li class=" nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                    id="navbar-dropdown-menu-link-239" aria-haspopup="true" aria-expanded="false">
                    {{ getFrontLanguage('information') }}</a>

                <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
                    <a href="{{ route('front.notice') }}">{{ getFrontLanguage('notice-1') }}</a>
                    <a href="{{ route('front.news') }}">{{ getFrontLanguage('news-1') }}</a>
                    <a href="{{ route('front.events') }}">{{ getFrontLanguage('event') }}</a>
                    <a href="{{ route('front.tender') }}">{{ getFrontLanguage('tender-1') }}</a>
                    {{-- <a href="{{ route('front.career') }}">{{ getFrontLanguage('career') }}</a> --}}
                    <a href="{{ route('front.career') }}">क्यारियर </a>
                    <a href="{{ route('front.download') }}">{{ getFrontLanguage('download') }}</a>
                </div>
            </li>
            <li>
                <a href="{{ route('front.calendar') }}">{{ getFrontLanguage('calendar') }}</a>
            </li>
            <li class=" nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                    id="navbar-dropdown-menu-link-239" aria-haspopup="true" aria-expanded="false">
                    {{ getFrontLanguage('result-1') }}</a>

                <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
                    @foreach (get_result_years() as $result_year)
                        <a href="{{ route('front.result', $result_year) }}">{{ $result_year }}</a>
                    @endforeach
                </div>
            </li>

            {{-- <li>
         <a href="{{ route('front.contact') }}">{{ getFrontLanguage('contact-us')}}</a>
     </li> --}}
            <li class=" nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                    id="navbar-dropdown-menu-link-239" aria-haspopup="true" aria-expanded="false">
                    TVET कार्यक्रमहरु</a>

                <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
                    {{-- @foreach (get_courses() as $course)
            <a href="{{ route('front.courses',$course->slug) }}">{{$course->title}}</a>
            @endforeach --}}

                    @foreach (get_categories() as $categories)
                        @if ($categories->courses->count() > 0)
                            <div class="nested-list-wrap">
                                <div class="nested-title"><span> {{ $categories->title }} </span> <i
                                        class="fa fa-caret-right"></i></div>

                                <ul class="nested-list">
                                    @foreach ($categories->courses as $course)
                                        <li><a
                                                href="{{ route('front.courses', $course->slug) }}">{{ $course->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
            </li>


        </ul>
    </div>
    <div class="sidetoggle d-block d-lg-none">
        <span onclick="openNav()"><i class="fa fa-bars"></i></span>
    </div>
</div>
<div class="marquee-container">
    <div class="marquee_notice container">
        <div class="notice_title">
            ताजा जानकारी
        </div>
        <div class="notice_content">
            <marquee loop="true" behavior="scroll">

                @foreach (get_notices() as $notice)

                    <a href="{{ route('front.singleNotice', [$notice->id, $notice->created_at->format('Y-m-d')]) }}">
                        {{ $notice->title }}
                    </a>
                @endforeach


            </marquee>
        </div>
    </div>
</div>

<script>
    function myFunction1() {
        var element = document.getElementById("myDIV1");
        element.classList.toggle("active");
    }

    function myFunction2() {
        var element = document.getElementById("myDIV2");
        element.classList.toggle("active");
    }

    function myFunction3() {
        var element = document.getElementById("myDIV3");
        element.classList.toggle("active");
    }

    function myFunction4() {
        var element = document.getElementById("myDIV4");
        element.classList.toggle("active");
    }
</script>
