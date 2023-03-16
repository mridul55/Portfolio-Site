<section class="work__process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">03 - Working Process</span>
                    <h2 class="title">A clear product design process is the basis of success</h2>
                </div>
            </div>
        </div>
        <div class="row work__process__wrap">
            {{-- @foreach ($collection as $item) --}}
                
           
            <div class="col">
                <div class="work__process__item">
                    <span class="work__process_step">Step - 01</span>
                    <div class="work__process__icon">
                        <img class="light" src="{{asset('frontend/assets/img/icons/wp_light_icon01.png')  }}" alt="">
                        
                    </div>
                    <div class="work__process__content">
                        <h4 class="title">Discover</h4>
                        <p>Initial ideas or inspiration & Establishment of user needs.</p>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        
        </div>
    </div>
</section>