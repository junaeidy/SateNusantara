<section id="gtco-welcome" class="bg-white section-padding">
    @foreach ($abouts as $about)
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-sm-5 img-bg d-flex shadow align-items-center justify-content-center justify-content-md-end img-2">
                    @if ($about->image_path)
                        <img src="{{ asset('storage/' .$about->image_path) }}" alt="{{ $about->title }}" class="img-fluid">
                    @endif
                    
                </div>
                <div class="col-sm-7 py-5 pl-md-0 pl-4">
                    <div class="heading-section pl-lg-5 ml-md-5">
                        <span class="subheading">
                            About
                        </span>
                        <h2>
                            {{$about->title}}
                        </h2>
                    </div>
                    <div class="pl-lg-5 ml-md-5">
                        <p>{{$about->content}}</p>
                        <h3 class="mt-5">Special Recipe</h3>
                        <div class="row">
                            <div class="col-4">
                                <a href="#" class="thumb-menu">
                                    <img class="img-fluid img-cover" src="{{ asset('assets/img/hero-1.jpg')}}" />
                                    <h6>Australian Organic Beef</h6>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#" class="thumb-menu">
                                    <img class="img-fluid img-cover" src="{{ asset('assets/img/hero-1.jpg')}}" />
                                    <h6>Australian Organic Beef</h6>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="#" class="thumb-menu">
                                    <img class="img-fluid img-cover" src="{{ asset('assets/img/hero-1.jpg')}}" />
                                    <h6>Australian Organic Beef</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</section>