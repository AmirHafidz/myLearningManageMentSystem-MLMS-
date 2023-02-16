<div class="container py-3 px-0" style="min-height: 100vh">
    <div class="col-lg-12">
        <div class="row">

            {{-- SIDEBAR --}}
            @include('dashboard.sidebar')
            {{-- CONTENT --}}
            <div class="col-lg-9">
                <div class="card card-body">
                    @include('user.admin.breadcrumb')
                    <hr class="hr">
                    <h4 class="fs-4 my-0">List Students</h4>
                    <hr class="hr">
 
                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="">All Students</option>
                                <option value="">Alpha Class</option>
                                <option value="">Beta Class</option>
                                <option value="">Gamma Class</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btnAddStudent" data-bs-toggle="modal" data-bs-target="#add_student_Modal">Add Student</button>
                        </div>
                    </div>

                    <div class="card card-body">
                        <table class="table table-bordered table-hover" id="table_list_student">
                            <thead class="my-first-web-color text-white">
                                <th class="text-center" width="5%">#</th>
                                <th class="text-center" width=30%>Username</th>
                                <th class="text-center" width=30%>Email</th>
                                <th class="text-center">Class</th>
                                <th class="text-center">Actions</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Amir Hafidz</td>
                                    <td>amir@gmail.com</td>
                                    <td>Alpha</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">View</button>
                                        <button class="btn btn-warning btn-sm">Notify</button>
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>