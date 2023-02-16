<div class="container py-5" style="min-height: 100vh">
    <div class="container col-lg-12 bg-light">
        @include('home.trainer.breadcrumb')
    </div>
    <div class="col-lg-12">
        <div class="row">
            @foreach ($trainer as $trainer)
                <div class="col-lg-3 my-2">
                    <div class="card" data-aos="zoom-in">
                        <div class="card-header my-first-web-color">
                            <h6 class="fs-6 my-web-font-1 fw-bold text-white">{{$trainer->master_course->name}}</h6>
                        </div>
                        <div class="card-body my-second-web-color">
                            <img src="{{asset('images/user_photo/'.$trainer->user->personal_detail->photo.'')}}" class="img text-center border-0" alt="" style="height:200px;border:none;width:100%;">
                            <hr class="hr" style="">
                            {{-- <p class="fs-6 m-0 my-web-font-1 fw-bold">Name : {{$trainer->user->name}}</p>
                            <p class="fs-6 m-0 my-web-font-1 fw-bold">Profession :  </p>
                            <p class="fs-6 m-0 my-web-font-1 fw-bold">Phone : 34028 </p>
                            <p class="fs-6 m-0 my-web-font-1 fw-bold">Email : {{$trainer->user->email}} </p> --}}
                            <div class="card bg-transparent border-white">
                                <table class="table table-borderless">
                                    <tr>
                                        
                                        <td class="my-web-font-2 text-dark">{{$trainer->user->name}}</td>
                                    </tr>
                                    <tr>
                                     
                                        <td class="my-web-font-2 text-dark ">Amir Hafidz</td>
                                    </tr>
                                    <tr>
                                     
                                        <td class="my-web-font-2 text-dark ">872039</td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="my-web-font-2 text-dark ">{{$trainer->user->email}}</td>
                                    </tr>
                                </table>
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