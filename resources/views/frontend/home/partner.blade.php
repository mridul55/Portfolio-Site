@php
    $allmultiimage = App\Models\partnermultiimage::all();
    $partner = App\Models\Partner::find(1);
@endphp

<section class="partner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="partner__logo__wrap">
                    @foreach ($allmultiimage as $item)
                        
                    <li>
                        <img class="light" src="{{asset($item->multi_image)  }}" alt="">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">05 - partners</span>
                        <h2 class="title">{{ $partner->title }} </h2>
                    </div>
                    <p>{{ $partner->description }} </p>
                    <a href="{{ route('contact.me') }}" class="btn">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section>