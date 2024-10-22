<div class="section pt-lg-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if ($about)
                    <h1 class="section-title">{{ $about->title }}</h1>
                    <div class="clearfix">
                        <img src="{{ asset($about->image) }} " class="col-md-6 float-md-end mb-3 ms-md-3"
                            alt="...">


                        <p> {!! $about->description !!}</p>
                    @else
                        <p>No data available.</p>
                @endif
            </div>
        </div>
    </div>
</div>