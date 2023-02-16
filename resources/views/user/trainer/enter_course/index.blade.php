@extends('layout.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@include('user.navbar')

@include('user.trainer.enter_course.modal.add_lecture')

@include('user.trainer.enter_course.modal.add_task')

@include('user.trainer.enter_course.hero')

@include('user.footer')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

{{-- SWEETALERT --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
    $('#add_lecture_form').submit(function (e) { 
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
        type: "post",
        url: "{{route('lecture.store')}}",
        data: fd,
        processData:false,
        cache:false,
        contentType:false,
        success: function (response) {
            swal.fire(
                'Success',
                response.message,
                'success',
            );

            $('#add_lecture_form')[0].reset();
            $('#add_lecture_Modal').modal('hide');
        }
    });
    });

    $('#icon_upload_pic').mouseenter(function () { 
        $(this).html(`
        <span class="text-center">UPLOAD</span>
        `);
        $(this).on('click', function () {
            $('#myfile').trigger('click');
        });
    });

    $('#icon_upload_pic').mouseleave(function () { 
        $(this).html('');
    });

    $(document).ready(function () {
        const trainer_id = {{$user->id}};
        const class_id = {{$my_class->id}};
        var route = 'http://mlms.test/api/fetch-lecture/'+trainer_id+'/'+class_id;
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                response.lecture.forEach(element => {
                    $('#lecture_tab').append(`      
                    <div class="col-lg-12 my-3" id="content_lecture">
                        <div class="card rounded-0">
                            <div class="card-header">
                                Week 1
                            </div>
                            <div class="card-body">
                                <p class="fs-5" id="this_lecture_title_1">`+element.title+`</p>
                                <p class="fs-6">
                                    `+element.description_one+`
                                </p>
                                <p class="fs-6">
                                    `+element.description_two+`
                                </p>
                                <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">
                                <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">
                                <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">
                            </div>
                        </div>
                    </div>
                    <hr class="hr">    
                    `);
                });
            }
        });
    });

    $('#btnAddFile').on('click', function () {
        $('#table_add_file').append(`                                <tr>
                                    <td><input type="file"></td>
                                </tr>`);
    });

</script>