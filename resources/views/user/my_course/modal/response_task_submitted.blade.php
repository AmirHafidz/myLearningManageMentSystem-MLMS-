
  
  <!-- Modal -->
<div class="modal fade" id="response_submitted_Modal" tabindex="-1" aria-labelledby="response_submitted_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="fs-4">Response Task</h3>
                <hr class="hr">
                <form action="" id="response_submitted_form">
                    @csrf
                    <input type="text" name="task_id" id="response_task_id" hidden>
                    <input type="text" name="student_id" id="response_student_id" hidden>
                    <input type="text" name="result_id" id="response_result_id" hidden>
                    <div class="card card-body">
                        <div class="form-group my-2">
                            <label for="customRange1" class="form-label">Marks (Give Marks to encourage student) <i class='bx bx-smile bx-spin fs-5' ></i></label>
                            <input type="range" class="form-range" id="customRange1" max="100" step="1" name="response_task_mark">
                            <span id="view_submitted_mark">0%</span>
                        </div>
                        <div class="form-group my-2">
                            <label for="" class="form-label">Comment</label>
                            <textarea name="response_task_comment" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-light text-dark me-2">Cancel</button>
                        <button class="btn btn-sm btn-dark text-light" type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>