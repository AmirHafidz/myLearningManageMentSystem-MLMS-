@extends('layout.app')

@include('user.admin.navbar')

@include('user.admin.list_leave.modal.view_file')

@include('user.admin.list_leave.hero')

@include('user.admin.footer')

{{-- JQUERY --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

{{-- SWEETALERT --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
//DATATABLE FOR LIST LEAVE
$(document).ready(function () {
    $('#table_list_leave').DataTable({
        serverSide: true,
        processing: true,
        retrieve: true,
        ajax: '{{route("admin.list_leave_fetch")}}',
        columns: [
            {data:'id',name:'id'},
            {data:'fullname',name:'fullname'},
            {data:'title',name:'title'},
            {data:'date',name:'date'},
            {data:'detail',name:'detail',orderable:false,searchable:false},
        ],
    });
});

//FETCH DETAIL LEAVE
$(document).ready(function () {
    $(document).on('click','.btnViewLeaveDetail', function () {
        const user_id = $(this).val();
        const leave_id = $(this).attr('leave_id');
        $('#this_leave_id').val(leave_id);
        var route = 'http://mlms.test/admin/view-leave-detail/'+leave_id;
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                // console.log(response.support_file[1]);
                // console.log(response.support_file);
                $('#leave_detail_user').val(response.user.name);
                $('#leave_detail_description').val(response.description_one);
                $('#leave_detail_start_date').val(response.start_date);
                $('#leave_detail_end_date').val(response.end_date);
                if(response.support_file){
                    $('#tbody_table_view_support_file').html('');
                    for (const prop in response.support_file) {
                        // console.log(`obj.${prop} = ${response.support_file[prop]}`);
                        $('#tbody_table_view_support_file').append(
                            `
                            <tr>
                                <td>${prop}</td>
                                <td><a href="{{asset('leave_appliation_file/${response.support_file[prop]}')}}" download="${response.support_file[prop]}">${response.support_file[prop]}"</a></td>
                                <td>
                                    <button class="btn btn-success btn-sm">View</button>
                                </td>
                            </tr>
    
                            `
                        );
                    }
                }
            }
        });
    });
});

$('.btnResponseLeave').on('click', function () {
    var response_leave = $(this).attr('response_leave');
    var leave_id = $('#this_leave_id').val();
    $.ajax({
        type: "post",
        url: "{{route('admin.response_leave')}}",
        data: {
            leave_id: leave_id,
            response_leave: response_leave,
            _token: '{{csrf_token()}}'
        },
        success: function (response) {
            swal.fire('Success',response.message,'success');
            
            $('#view_leave_file_Modal').modal('hide');
        }
    });
});
</script>
