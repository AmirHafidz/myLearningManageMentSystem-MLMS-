<link rel="stylesheet" href="{{asset('css/style2.css')}}">

<div class="container py-5" style="min-height: 100vh">
    <div class="container col-lg-12 bg-light">
        @include('home.Course.breadcrumb')
    </div>
    <div class="col-lg-12">
        <div class="row">
            @foreach ($course as $course)
                <div class="col-lg-4 my-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="card text-bg-dark courseCard" this_card="{{$course->id}}">
                        <img src="{{asset('images/course/'.$course->photo)}}" class="card-img" alt="..." style="height: 200px">
                        <div class="card-img-overlay">
                          <h5 class="card-title">{{$course->name}}</h5>
                          {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small>Last updated 3 mins ago</small></p> --}}
                          <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item akordion" style="background: rgba(25, 25, 25, 0.42);
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(15.8px);
                            -webkit-backdrop-filter: blur(15.8px);">
                              <h2 class="accordion-header" id="flush-heading{{$course->id}}">
                                <button id="courseBtn{{$course->id}}" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$course->id}}" aria-expanded="false" aria-controls="flush-collapse{{$course->id}}" hidden>
                                  Accordion Item #1
                                </button>
                              </h2>
                              <div id="flush-collapse{{$course->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$course->id}}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body text-white">{{$course->description}}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    AOS.init();
</script>

<script>
    // $(document).ready(function () {
    //     $('.courseCard').hover(function () {
    //             var this_card = $(this).attr('this_card');
    //             // over
    //             $('#courseBtn'+this_card).trigger('click');
    //         }, function () {
    //             // out
    //             $('#courseBtn'+this_card).trigger('click');
    //         }
    //     );
    // });

    $(document).ready(function () {
        $('.courseCard').mouseenter(function () { 
            var this_card = $(this).attr('this_card');
            $('#courseBtn'+this_card).trigger('click');
            $(this).mouseleave(function () { 
                $('#courseBtn'+this_card).trigger('click');
            });
        });
    });
    
</script>