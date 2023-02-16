<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_lecture_Modal">
    Launch demo modal
</button> --}}
  
  <!-- Modal -->
<div class="modal modal-xl modal-dialog-scrollable" id="add_lecture_Modal" tabindex="-1" aria-labelledby="add_lecture_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="fs-3">Add Lecture</h3>
                <hr class="hr">
                <form action="" id="add_lecture_form" enctype="multipart/form-data">
                    @csrf

                    <label for="">Trainer ID</label>
                    <input type="text" value="{{$user->id}}" name="trainer_id">

                    <label for="">Class ID</label>
                    <input type="text" value="{{$my_class->id}}" name="class_id">

                    <div>
                        <div class="form-group">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control rounded-0" name="lecture_title">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lecture_description_one" class="form-label">Description One</label>
                                        <textarea name="lecture_description_one" id="lecture_description_one" cols="30" rows="6" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lecture_description_two" class="form-label">Description Two</label>
                                        <textarea name="lecture_description_two" id="lecture_description_two" cols="30" rows="6" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr">
                        {{-- <div class="form-group">
                            <label for="" class="form-label">Add File</label>
                            <select name="" id="">
                                <option value="">File</option>
                                <option value="">Photo</option>
                                <option value="">Video</option>
                                <option value="">Others</option>
                            </select>
                            <input type="file" name="" id="myfile" hidden>
                            <div class="text-center align-middle" style="width:100px;height:100px;background:url('{{asset("images/file/default.png")}}');background-size:contain;border:1px solid black" id="icon_upload_pic">
                            </div>
                        </div> --}}
                        <table class="table table-bordered" id="table_add_file">
                            <thead>
                                <th><button class="btn btn-dark text-white btn-sm" id="btnAddFile">Add File</button></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="file"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-light btn-sm text-dark" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-dark btn-sm text-white" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>