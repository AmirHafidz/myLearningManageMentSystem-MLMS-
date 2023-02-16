@include('user.my_course.task.hero')
@include('user.my_course.modal.attempt_task')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

{{-- SWEETALERT --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
    var file_num = 0;
    var attempt_file = 0;

    $('#btnAddFileTask').on('click', function () {
        file_num++;
        var naming_id_file = 'file_num'+file_num;
        $('#table_file_task').append(`@include('user.trainer.enter_course.modal.add_file')`);
        $($('[this_iterate=1]')).attr('name', 'file_task_'+file_num);
        $($('[this_iterate=1]')).attr('this_iterate',file_num+1);
        $($('[row_iterator=1]')).html(file_num)
        $($('[row_iterator=1]')).attr('row_iterator',file_num+1)
    });

    // AJAX STORE TASK
    $('#add_task_form').submit(function (e) { 
        e.preventDefault();
        const fd = new FormData(this);
        var route = 'http://mlms.test/api/store-task';
        // var myfile = [];
        // $('.fileTask').each(function() { myfile.push($(this).val()); });
        // $('.fileTask')[0].forEach(element => {
        //     myfile.push(element);
        // });
        // console.log(myfile);

        $.ajax({
            type: "post",
            url: route,
            data: fd,
            contentType:false,
            cache:false,
            processData:false,
            success: function (response) {
                if(response.status == 200){
                    swal.fire('Success',response.message,'success');
                }

                $('#add_task_form')[0].reset();
                $('#add_task_Modal').modal('hide');

            }
        });
    });

    $(document).ready(function () {
        const trainer_id = {{$my_course->id}};
        // console.log('AMIR');
        const class_id = {{$my_class->id}};
        var route = 'http://mlms.test/api/fetch-task/'+trainer_id+'/'+class_id;
        $.ajax({
            type: "get",
            url: route,
            success: function (response) {
                var iterator = 1;
                response.tasks.forEach(element => {

                    // console.log(element);

                    // console.log(element.task_detail.image);
                    
                    // console.log(element.task_detail.description_one);
                    iterator++;

                    $('#task_tab').append(`@include('user.my_course.content.task_content')`);
                    
                    // $($('[task_content_iterator=1]')).html('hai');
                    
                    $($('[task_title_iterator=1]')).html(element.title);
                    $($('[task_title_iterator=1]')).attr('task_title_iterator', iterator);

                    $($('[task_description_one_iterator=1]')).html(element.task_detail.description_one);
                    $($('[task_description_one_iterator=1]')).attr('task_description_two_iterator', iterator);

                    $($('[task_description_two_iterator=1]')).html(element.task_detail.description_two);
                    $($('[task_description_two_iterator=1]')).attr('task_description_two_iterator', iterator);

                    $($('[task_attempt_iterator=1]')).val(element.id);
                    $($('[task_attempt_iterator=1]')).attr('task_attempt_iterator', iterator);

                    element.task_detail.file.forEach(task_p => {
                        var path = `{{asset("task_file/default_file.png")}}`;
                        var file_downloaded = task_p;                        

                        $($('[task_file_iterator=1]')).append(`
                            <a href="{{asset('task_file/`+task_p+`')}}" download="`+task_p+`" id="task_image_tag" task_image_tag_iterator=1>
                                <figure class="figure p-3" style="width:100px;overflow:hidden">
                                    <img src="`+path+`" class="figure-img img-fluid rounded" alt="..." style="width:100px">
                                    <figcaption class="figure-caption" style="overflow:hidden">`+task_p+`</figcaption>
                                </figure>
                            </a>
                        `);
                    });
                    element.task_detail.image.forEach(task_p => {
                        var path = `{{asset("task_file/`+task_p+`")}}`;
                        var file_downloaded = task_p;
                        
                        $($('[task_file_iterator=1]')).append('\
                        <a href="'+path+'" download="'+file_downloaded+'" id="task_image_tag" task_image_tag_iterator=1>\
                            <figure class="figure p-3" style="width:100px;overflow:hidden">\
                                <img src="'+path+'" class="figure-img img-fluid rounded" alt="..." style="width:100px">\
                                <figcaption class="figure-caption" style="overflow:hidden">'+file_downloaded+'</figcaption>\
                            </figure>\
                        </a>\
                        ');
                    });
                    element.task_detail.video.forEach(task_p => {
                        var path = `{{asset("task_file/`+task_p+`")}}`;
                        var file_downloaded = task_p;                        

                        $($('[task_file_iterator=1]')).append('\
                        <video height="200px" controls> \
                            <source src="'+path+'" type="video/mp4"> \
                        </video> \
                        ');

                        // $($('[task_file_iterator=1]')).append('<iframe src="'+path+'" title="Vimeo video" allowfullscreen></iframe>');
                    });
                    element.task_detail.other.forEach(task_p => {
                        var path = `{{asset("task_file/`+task_p+`")}}`;
                        var file_downloaded = task_p;
                        
                        $($('[task_file_iterator=1]')).append('\
                        <a href="'+path+'" download="'+file_downloaded+'" id="task_image_tag" task_image_tag_iterator=1>\
                            <figure class="figure p-3" style="width:100px;overflow:hidden">\
                                <img src="'+path+'" class="figure-img img-fluid rounded" alt="..." style="width:100px">\
                                <figcaption class="figure-caption" style="overflow:hidden">'+file_downloaded+'</figcaption>\
                            </figure>\
                        </a>\
                        ');
                    });
                    
                    $($('[task_file_iterator=1]')).attr('task_file_iterator', iterator);
                });
            }
        });
    });

    // ADD FILE TASK TO BE UPLOADED
    $(document).ready(function () {

        // var filename = $('input[type=file]').val().replace("/C:\\fakepath\\/i, ''");
        // console.log(filename);

        var my_file_iterate = 1;
        $('#btnAddRowFileTask').on('click', function () {

            $('#table_add_file_task').append(`@include('user.trainer.enter_course.content.row_add_file')`);
            
            $($('[task_iterate=1]')).html(my_file_iterate);
            $($('[task_iterate=1]')).attr('task_iterate',my_file_iterate+1);

            $($('[task_file_iterate=1]')).attr('name','task_file_'+my_file_iterate);
            $($('[task_file_iterate=1]')).attr('task_file_iterate',my_file_iterate+1);
            var k = my_file_iterate+1;
            // console.log($($('[task_file_iterate='+k+']')).get(0).files.length)

            my_file_iterate++;
        });
    });

    //SET VALUE FOR TASK IN ATTEMPT TASK FORM
    $(document).on('click','.btnAttemptTask', function () {
        const task_id = $(this).val();
        $('#attempt_task_id').val(task_id);
        $('#attempt_task_user').val({{$user->id}});
    });
    
    // ADD ROW FILE ATTEMPT TO BE UPLOADED
    $(document).ready(function () {
        // var filename = $('input[type=file]').val().replace("/C:\\fakepath\\/i, ''");
        // console.log(filename);
        var my_attempt_file_iterate = 1;
        $('#btnAddRowAttemptFile').on('click', function () {

            $('#table_add_attempt_files').append(`@include('user.my_course.content.row_add_attempt_file')`);
            
            $($('[task_iterate=1]')).html(my_attempt_file_iterate);
            $($('[task_iterate=1]')).attr('task_iterate',my_attempt_file_iterate+1);

            $($('[task_file_attempt_iterate=1]')).attr('name','task_file_attempt'+my_attempt_file_iterate);
            $($('[task_file_attempt_iterate=1]')).attr('task_file_attempt_iterate',my_attempt_file_iterate+1);
            var k = my_attempt_file_iterate+1;

            my_attempt_file_iterate++;
        });
    });

    $('#attempt_task_form').submit(function (e) { 
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                const fd = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{route('task.store_attempt')}}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.status == 200){
                            Swal.fire(
                            'Congratulation!',
                            response.message,
                            'success'
                            )
                        }
                    }
                });
            }
        })
    });

</script>