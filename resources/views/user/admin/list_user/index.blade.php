@extends('layout.app')

@include('user.admin.navbar')

@include('user.admin.list_user.hero')

@include('user.admin.footer')

{{-- JQUERY --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

{{-- SWEETALERT --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('#table_list_user').DataTable({
            serverSide: true,
            processing: true,
            retrieve: true,
            ajax: '{{route("admin.list_user_fetch")}}',
            columns:[
                {data:'id',name:'id'},
                {data:'name',name:'name'},
                {data:'email',name:'email'},
                {data:'role',name:'role'},
                {data:'actions',name:'actions',orderable:false,searchable:false},
            ],
        });
    });
</script>
