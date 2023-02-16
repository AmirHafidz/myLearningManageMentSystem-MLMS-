@extends('layout.app')

@include('user.admin.list_student.modal.add_student')

@include('user.admin.navbar')

@include('user.admin.list_student.hero')

@include('user.admin.footer')

{{-- JQUERY --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

{{-- SWEETALERT --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $(document).ready(function () {
        $('#table_list_student').DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            ajax: "{{route('admin.list_student_fetch')}}",
            columns: [
                {data:'id',name:'id'},
                {data:'username',name:'username'},
                {data:'email',name:'email'},
                {data:'class',name:'class'},
                {data:'actions',name:'actions',orderable:false,searchable:false},
            ],
        });
    });

    $('#store_student_form').submit(function (e) { 
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
            type: "post",
            url: "{{route('admin.store_student')}}",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.status == 200){
                    swal.fire('Success',response.message,'success');
                    $('#store_student_form')[0].reset();
                    $('#add_student_Modal').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                }
            }
        });
    });

</script>
