<div class="col-lg-12 my-3" id="content_lecture">
    <div class="card">
        <div class="card-header my-first-web-color">
            <div class="d-flex justify-content-between">
                <span class="text-white my-web-font-1 fw-bold">The title</span>
                <div class="d-flex justify-content-center align-items-center hstack gap-3">
                    <p class="fs-6 m-0 text-white" this_forum_date_iterator=1>10/09/2022</p>
                    <div class="vr text-white"></div>
                    <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="fs-5 my-web-font-1 fw-bold" id="this_lecture_title_1" iterator_lecture_title=1>`+element.title+`</p>
            <p class="fs-6 my-web-font-3" iterator_lecture_description_one=1>
                `+element.description_one+`
            </p>
            <p class="fs-6 my-web-font-3 fw-regular" iterator_lecture_description_one=2>
                `+element.description_two+`
            </p>
            <hr class="hr">
            <div iterator_lecture_file=1 id="hehe">
                hehe
            </div>
            {{-- <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">
            <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">
            <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px"> --}}
        </div>
    </div>
</div>
<hr class="hr my-first-web-color">
