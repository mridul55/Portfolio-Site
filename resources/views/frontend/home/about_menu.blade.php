@php
    $allmultiimage = App\Models\MultiImage::all();
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach ($allmultiimage as $item)
                    <li>
                        <img class="light" src="{{asset($item->multi_image)}}" alt="XD">
                        
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">I have transform your ideas into remarkable digital products</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('frontend/assets/img/icons/about_icon.png')  }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>20+ Years Experience In this game, Means <br> Product Designing</p>
                        </div>
                    </div>
                    <p class="desc">I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience. I have been working as a UX Designer</p>
                    <a href="{{ route('home.about') }}" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>