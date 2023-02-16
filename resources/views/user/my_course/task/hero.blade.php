

<div class="col-lg-12" id="task_tab">
    @can('create_task')
        {{-- <button class="btn btn-success btn-sm shadow" id="btnAddTask" data-bs-toggle="modal" data-bs-target="#add_task_Modal" style="background-color: #F34C19">
            Add Task
        </button> --}}
        <div class="d-flex justify-content-between">
            <h3 class="fs-3" style="color:#5c658d">
                Tasks
            </h3>
            <button class="btn my-third-web-color rounded-0 hstack gap-2 btn-light text-light border-0" id="btnAddTask" data-bs-toggle="modal" data-bs-target="#add_task_Modal" type="button">
                <i class="fa-solid fa-paper-plane"></i>
                <div class="vr"></div>
                <span>Add Task</span>
            </button>
        </div>
        <hr class="hr mt-3" style="color: #5c658d">
    @endcan
</div>
