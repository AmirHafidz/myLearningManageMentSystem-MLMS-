@include('user.my_course.task_submitted.hero')
@include('user.my_course.modal.view_submitted_modal')
@include('user.my_course.modal.response_task_submitted')



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

{{-- SWEETALERT --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
    // function old(){
    //     //FETCH ALL TASK FOR THIS CLASS BY THIS TRAINER
    //     // $(document).ready(function () {
            
    //     //     const trainer_id = {{$my_course->trainer_id}};
    //     //     const class_id = {{$my_class->id}};;
    //     //     var route = 'http://mlms.test/api/fetch-all-task/'+trainer_id+'/'+class_id+'';
    //     //     $.ajax({
    //     //         type: "get",
    //     //         url: route,
    //     //         data: {
    //     //             _token: '{{csrf_token()}}'
    //     //         },
    //     //         success: function (response) {
                    
    //     //             var iterator = 1;
    //     //             response.all_task.forEach(element => {
    //     //                 $('#list_button_task').append('<button class="btnGetStudentTask btn btn-success me-2" value="'+element.id+'">'+element.title+'</button>');
    //     //             });
    //     //         }
    //     //     });
    
    //     // });
    
    //     // //DESTROY AND INITIATE DATATABLE
    //     // $(document).on('click','.btnGetStudentTask', function () {
    //     //     $('#table_list_student_task').DataTable().clear().destroy();
    //     //     GenerateTable($(this).val());
    //     // });
    
    //     // //GENERATE DATATABLE BASED ON TASK
    //     // function GenerateTable(this_task_id){
    //     //     $('#table_list_student_task').attr('hidden', false);
    //     //         const task_id = this_task_id;
    //     //         var route = 'http://mlms.test/api/fetch-student-this-task/'+task_id;
    //     //         $('#table_list_student_task').DataTable({
    //     //             serverSide : true,
    //     //             processing : true,
    //     //             retrieve : true,
    //     //             ajax : route,
    //     //             columns : [
    //     //                 {data:'full_name',name:'full_name'},
    //     //                 {data:'file_submit',name:'file_submit'},
    //     //                 {data:'date_submit',name:'date_submit'},
    //     //                 {data:'actions',name:'actions', orderable:false,searchable:false},
    //     //             ],
    //     //         });
    //     // }
    // }

    // VIEW SUBMITTED FILE
    $(document).on('click','.ViewSubmittedFile', function () {

        const submitted_student_id = $(this).attr('submitted_student_id');
        const submitted_task_id = $(this).attr('submitted_task_id');
        var route = 'http://mlms.test/api/fetch-attempt/'+submitted_student_id+'/'+submitted_task_id;

        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                // console.log(response.task_attempt.file_submitted[0]);
                if(response.task_attempt.is_finish == 0){
                    $('#view_submitted_form')[0].reset();
                    // console.log('belum hantar');
                    // $('#view_submitted_Modal').modal('hide');
                    Swal.fire('Oops...',response.student.student_fullname+' not send yet...','error');
                    // location.reload();
                    setTimeout(() => {
                        $('#close_viewAttemptModal').trigger('click');
                    }, 1000);
                }else{
                    $('#view_submitted_form')[0].reset();
                    // console.log('hai');
                    $('#submitted_student_name').val(response.student.student_fullname);
                    $('#submitted_task_name').val(response.task_attempt.master_task.title);

                    $('#submitted_student_title').val(response.task_attempt.text_attempt == null ? '' : response.task_attempt.text_attempt['title']);
                    $('#submitted_student_description').val(response.task_attempt.text_attempt == null ? '': response.task_attempt.text_attempt['description']);

                    // response.task_attempt.file_submitted.forEach(element => {
                    //     $('#table_file_submitted').append(`
                        
                    //     <tr>
                    //         <td>1</td>
                    //         <td><a href="" download="">`+element+`</a></td>
                    //         <td><button class="btn btn-success btn-sm">View</button></td>
                    //     </tr>
                        
                        
                    //     `);
                    // });
                }



            }
        });
    });

    //INPUT RANGE FOR MARKS
    $('#customRange1').change(function (e) { 
        e.preventDefault();
        $('#view_submitted_mark').html($(this).val()+'%');
    });

    //RESPONSE TASK
    $(document).on('click','.btnResponseTask', function () {
        var task_id = $(this).attr('this_task_id');
        var student_id = $(this).attr('this_student_id');
        var result_id = $(this).val();
        $('#response_task_id').val(task_id);
        $('#response_student_id').val(student_id);
        $('#response_result_id').val(result_id);
        $('#response_submitted_form').submit(function (e) { 
            e.preventDefault();
            const fd = new FormData(this);
            $.ajax({
                type: "post",
                url: "{{route('user.response_submit_task')}}",
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    Swal.fire('Success',response.message,'success');
                    $('#response_submitted_form')[0].reset();
                    $('#response_submitted_Modal').modal('hide');
                }
            });
        });
    });

    //FETCH ALL TASK FOR THIS CLASS BY THIS TRAINER
    $(document).ready(function () {  
        const trainer_id = {{$my_course->trainer_id}};
        const class_id = {{$my_class->id}};;
        var route = 'http://mlms.test/api/fetch-all-task/'+trainer_id+'/'+class_id+'';
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                
                var iterator = 1;
                response.all_task.forEach(element => {
                    $('#tukar').append('<option value="'+element.id+'">'+element.title+'</option>');
                });
            }
        });

    });

    //CHOOSE WHICH TASK TO SHOW
    $(document).on('change','#tukar', function () {
        $('#table_list_student_task').DataTable().clear().destroy();
        GenerateTable($(this).val());
    });

    //FUNCTION MAKE TABLE
    function GenerateTable(this_task_id){
        $('#list_student_task').attr('hidden', false);
            const task_id = this_task_id;
            var route = 'http://mlms.test/api/fetch-student-this-task/'+task_id;
            $('#table_list_student_task').DataTable({
                serverSide : true,
                processing : true,
                retrieve : true,
                ajax : route,
                columns : [
                    {data:'full_name',name:'full_name'},
                    {data:'file_submit',name:'file_submit'},
                    {data:'date_submit',name:'date_submit'},
                    {data:'actions',name:'actions', orderable:false,searchable:false},
                ],
            });
    }
    




</script>