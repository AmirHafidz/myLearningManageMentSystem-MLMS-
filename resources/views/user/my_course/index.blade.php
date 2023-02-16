@extends('layout.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@include('user.navbar')

@include('user.my_course.modal.add_lecture')

@include('user.my_course.modal.add_task')

@include('user.my_course.hero')

@include('user.my_course.modal.add_course_forum')

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

    // FETCH LECTURE
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
                    console.log(element.photo);
                    // $('#lecture_tab').append(`      
                    // <div class="col-lg-12 my-3" id="content_lecture">
                    //     <div class="card rounded-0">
                    //         <div class="card-header">
                    //         Week 1
                    //         </div>
                    //         <div class="card-body">
                    //             <p class="fs-5" id="this_lecture_title_1">`+element.title+`</p>
                    //             <p class="fs-6">
                    //                 `+element.description_one+`
                    //             </p>
                    //             <p class="fs-6">
                    //                 `+element.description_two+`
                    //             </p>
                    //             <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">
                    //             <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">
                    //             <img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">
                    //         </div>
                    //     </div>
                    // </div>
                    // <hr class="hr">
                    // `);
                    $('#lecture_tab').append(`@include('user.my_course.content.lecture_section')`);
                    var iterator = 1;
                    if (element.photo > 0) {
                        iterator++;
                        $('#hehe').append('amirhafidz');
                        element.file.forEach(element => {
                            $($('[iterator_lecture_file=1]')).append(`<img src="{{asset('images/file/default.png')}}" alt="" class="img-thumbnail" style="width: 100px">`);
                        });
                        $($('[iterator_lecture_file=1]')).attr('iterator_lecture_file', iterator);
                    }

                });
            }
        });
    });

    // LECTURE
    $(document).ready(function () {
        var iterator_file_lecture = 1;
        $('#btnAddFile').on('click', function () {
            $('#table_add_file').append(`<tr>
                                            <td>`+iterator_file_lecture+`</td>
                                            <td><input type="file" name="file_lecture`+iterator_file_lecture+`"></td>
                                            <td><button class="btn btn-danger btn-sm">Remove</button></td>
                                        </tr>`);
            iterator_file_lecture++;
        });
    });

    $(document).ready(function () {
        var iterator = 1;
        $('.btnAddForumFile').on('click', function () {
            iterator++;
            $('#all_forum_file').append(`<input type="file" name="forum_file`+iterator+`" forum_file_iterator=1 />`);
            $($('[forum_file_iterator=1]')).trigger('click');
            $($('[forum_file_iterator=1]')).attr('forum_file_iterator', iterator);
        });
    });

    $(document).ready(function () {
        $('#add_course_forum_form').submit(function (e) { 
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                type: "post",
                url: "{{route('user.store_post_course')}}",
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    swal.fire('Success',response.message,'success');
                    $('#add_course_forum_form')[0].reset();
                    $('#add_course_forum_Modal').modal('hide');                    
                }
            });
        });
    });

    // FETCH POST COURSE (FORUM)
    $(document).ready(function () {
        var course_id = {{$my_course->id}};
        var class_id = {{$my_class->id}};
        var route = 'http://mlms.test/api/fetch-post-course/'+course_id+'/'+class_id;
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                if(response.all_course_post.length == 0){
                    $('#course_forum_tab').append(`
                    <div class="text-center my-5">
                        <div class="card-card-body">
                            <i>No Post from this course yet ...</i>
                        </div>
                    </div>
                    `);
                }else{
                    $('#course_forum_tab').append(`@include('user.my_course.content.course_posts')`);
                    var iterator = 1;
                    response.all_course_post.forEach(element => {
                        iterator++;
                        
                        $($('[this_forum_card_iterator=1]')).attr('this_forum_card_iterator',iterator);

                        $($('[this_forum_user_iterator=1]')).html(element.user_id);
                        $($('[this_forum_user_iterator=1]')).attr('this_forum_user_iterator',iterator);

                        $($('[this_forum_title_iterator=1]')).html(element.title);
                        $($('[this_forum_title_iterator=1]')).attr('this_forum_title_iterator',iterator);

                        $($('[this_forum_date_iterator=1]')).html(element.date_post);
                        $($('[this_forum_date_iterator=1]')).attr('this_forum_date_iterator',iterator);

                        $($('[this_forum_content_iterator=1]')).html(element.content);
                        $($('[this_forum_content_iterator=1]')).attr('this_forum_content_iterator',iterator);

                        if(element.image.length > 0){
                            element.image.forEach(element => {
                                $($('[this_forum_file_iterator=1]')).append(`<img src="{{asset('course_post_file/`+element+`')}}" alt="" style="width:100px;">`);
                            });
                        }
                        if(element.file.length > 0){
                            element.file.forEach(element => {
                            $($('[this_forum_file_iterator=1]')).append(`<a href="{{asset('course_post_file/`+element+`')}}" download="{{asset('course_post_file/`+element+`')}}"><img src="{{asset('task_file/default_file.png')}}" alt="" style="width:50px;"></a>`);
                            });
                        }
                        if(element.image.length > 0){
                            element.file.forEach(element => {
                                $($('[this_forum_file_iterator=1]')).append(`<a href=""><img src="{{asset('task_file/default_file.png')}}" alt="" style="width:50px;"></a>`);
                            });
                        }
                        if(element.image.length > 0){
                            element.file.forEach(element => {
                                $($('[this_forum_file_iterator=1]')).append(`<a href=""><img src="{{asset('task_file/default_file.png')}}" alt="" style="width:50px;"></a>`);
                            });
                        }






                    });
                }
            }
        });
    });

</script>