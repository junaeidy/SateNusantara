<section id="gtco-special-dishes" class="bg-grey section-padding">
    <div class="container">
        <div class="section-content">
            <div class="heading-section text-center">
                <span class="subheading">
                    Specialties
                </span>
                <h2>
                    Special Dishes
                </h2>
            </div>
            @foreach ($special as $key => $menu)                
            <div class="row mt-5">
                @if ($key % 2 == 0) {{-- Jika index genap --}}
                    <div class="col-lg-5 col-md-6 align-self-center py-5">
                        <h2 class="special-number">{{ sprintf('%02d.', $key + 1) }}</h2>
                        <div class="dishes-text">
                            <h3>{{ $menu->name }}</h3>
                            <p class="pt-3">{{ $menu->description }}</p>
                            <h3 class="special-dishes-price">{{ $menu->price}}K</h3>
                            <a href="{{ route('reservation') }}" class="btn-primary mt-3">book a table <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                        <img src="{{asset('storage/' . $menu->image_path)}}" alt="{{ $menu->name }}" class="img-fluid shadow w-100">
                    </div>
                @else {{-- Jika index ganjil --}}
                    <div class="col-lg-5 col-md-6 align-self-center order-2 order-md-1 mt-4 mt-md-0">
                        <img src="{{asset('storage/' . $menu->image_path)}}" alt="{{ $menu->name }}" class="img-fluid shadow w-100">
                    </div>
                    <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center order-1 order-md-2 py-5">
                        <h2 class="special-number">{{ sprintf('%02d.', $key + 1) }}</h2>
                        <div class="dishes-text">
                            <h3>{{ $menu->name }}</h3>
                            <p class="pt-3">{{ $menu->description }}</p>
                            <h3 class="special-dishes-price">{{$menu->price }}K</h3>
                            <a href="{{ route('reservation') }}" class="btn-primary mt-3">book a table <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                @endif
            </div>
            @endforeach

        </div>
    </div>
</section>