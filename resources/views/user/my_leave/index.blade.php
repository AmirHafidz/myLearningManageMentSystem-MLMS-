@extends('layout.app')

@include('dashboard.navbar')

@include('user.my_leave.hero')

@include('dashboard.footer')

{{-- JQUERY --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

{{-- SWEETALERT --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    
    $(document).ready(function () {
        var iterator = 1;
        $('#add_row_support_file').on('click', function () {
            $('#table_add_support_file').append(`
                <tr class="py-2">
                    <td>`+iterator+`</td>
                    <td><input type="file" name="leave_file_support`+iterator+`" class="form-control" /></td>
                    <td><button class="btn btn-sm">Danger</button></td>
                </tr>
            `);
            iterator++;
        });
    });

    $('#apply_leave_form').submit(function (e) {
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
            type: "post",
            url: '{{route("user.apply_leave")}}',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire('Success',response.message,'success');
                $('#apply_leave_form')[0].reset();
                $('#leave_back').trigger('click');
                $('##table_add_support_file').html('');
            }
        });
    });

    $('.dropify').dropify();

</script>
