<section id="gtco-menu" class="section-padding">
    <div class="container">
        <div class="section-content">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="heading-section text-center">
                        <span class="subheading">
                            Specialties
                        </span>
                        <h2>
                            Our Menu
                        </h2>
                    </div>  
                </div>
            </div>
            <div class="row">
                @foreach ($menus as $key => $menu)
                <div class="col-lg-4 menu-wrap">
                    <div class="menus d-flex align-items-center">
                        <div class="menu-img rounded-circle">
                            <img class="img-fluid" src="{{ asset('storage/' . $menu->image_path)}}" alt="">
                        </div>
                        <div class="text-wrap">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h4>{{$menu->name}}</h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-muted menu-price">{{$menu->price}}K</h4>
                                </div>
                            </div>
                            <p>{{$menu->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>