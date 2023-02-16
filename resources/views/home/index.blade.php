@extends('layout.app')

@include('home.navbar')
@if (\Session::has('login_failed'))
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
        })

                Toast.fire({
                icon: 'error',
                title: 'You entered wrong credential!'
                })
    </script>
@endif
@include('home.hero')

@include('home.footer')

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>

    $(document).ready(function () {
        var route: 'http://mlms.test/api/fetch-trainer/';
        $.ajax({
            type: "get",
            url: route,
            data: {
                _token: '{{csrf_token()}}',
            },
            success: function (response) {
                
            }
        });
    });

    $(document).ready(function () {
        var route: 'http://mlms.test/api/fetch-course/';
        $.ajax({
            type: "method",
            url: "url",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                
            }
        });
    });
</script>