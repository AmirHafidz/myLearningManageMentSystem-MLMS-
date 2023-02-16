@extends('layout.app')

@include('home.navbar')

<div id="custom-target">
    
</div>

@if (\Session::has('notifications'))
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        console.log('masuk');
        Swal.fire({
            text: '{{$notifications->created_at}}'+'{{$notifications->task}}',
            target: '#custom-target',
            customClass: {
                container: 'position-absolute'
            },
            toast: true,
            position: 'bottom-right'
            })

    </script>
@endif

@include('dashboard.hero')

@include('dashboard.footer')

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

{{-- <script src="/path/to/plugin/jquery.MultiFile.min.js"></script> --}}

{{-- <script src="//github.com/fyneworks/multifile/blob/master/jquery.MultiFile.min.js" type="text/javascript" language="javascript"></script> --}}

<script>

    $(document).ready(function () {
        var iterator = 1;
        $('.btnAddPostFile').on('click', function () {
            iterator++;
            $('#all_file_container').append(`<input type="file" name="dashboard_file`+iterator+`" dashboard_file_iterator=1 />`);
            $($('[dashboard_file_iterator=1]')).trigger('click');
            $($('[dashboard_file_iterator=1]')).attr('dashboard_file_iterator', iterator);
        });
    });

    $('#add_dashboard_post_form').submit(function (e) { 
        e.preventDefault();
        const fd = new FormData(this);
        var admin_id = {{$user->id}};
        var route = 'http://mlms.test/api/store-dashboard-post/'+admin_id;
        $.ajax({
            type: "post",
            url: route,
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                swal.fire('Success',response.message,'success');
                $('#add_dashboard_post_form')[0].reset();
                $('#all_file_container').html('');
            }
        });
        
    });

    $(document).ready(function () {
        $.ajax({
            type: "get",
            url: "{{route('admin.fetch_dashboard_post')}}",
            data:{
                _token: '{{csrf_token()}}'
            },
            success: function (response) {
                // console.log(response.dashboard_post);
                var iterator = 1;
                response.dashboard_post.forEach(element => {
                    iterator++;
                    $('#dashboard_post_container').append(`@include('dashboard.content.dashboard_post')`);

                    $($('[iterator_dashboard_title=1]')).html(element.title);
                    $($('[iterator_dashboard_title=1]')).attr('iterator_dashboard_title', iterator);

                    $($('[iterator_dashboard_sub_title=1]')).html(element.sub_title);
                    $($('[iterator_dashboard_sub_title=1]')).attr('iterator_dashboard_sub_title', iterator);
                    
                    $($('[iterator_dashboard_body=1]')).html(element.post);
                    $($('[iterator_dashboard_body=1]')).attr('iterator_dashboard_body', iterator);
                    
                    $($('[iterator_dashboard_start_date=1]')).html(element.date_post);
                    $($('[iterator_dashboard_start_date=1]')).attr('iterator_dashboard_start_date', iterator);
                    
                    $($('[iterator_dashboard_end_date=1]')).html(element.time_post);
                    $($('[iterator_dashboard_end_date=1]')).attr('iterator_dashboard_end_date', iterator);
                });
            }
        });
    });

</script>
