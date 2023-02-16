<div class="col-lg-12 my-3" id="content_lecture">
    <div class="card">
        <div class="card-header text-white my-first-web-color" task_content_iterator=1>
            <div class="d-flex justify-content-between">
                <span>Week 1</span>
                <div class="d-flex justify-content-end">
                    <div class="hstack gap-1 me-4">
                        <span class="fs-6 text-white" id="cc" task_date_start_iterator=1>10/09/2022</span>
                        <div class="vr"></div>
                        <span class="fs-6 text-white" id="cc" task_date_start_iterator=1>10/09/2022</span>
                    </div>
                    <div class="hstack gap-1">
                        <span class="fs-6" id="cc" task_date_start_iterator=1>10:00 am</span>
                        <div class="vr"></div>
                        <span class="fs-6" id="cc" task_date_start_iterator=1>10:00 am</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="fs-5 mb-0 fw-bold" id="ecewec" task_title_iterator=1>Lecture Title</p>
            <p class="fs-6" task_description_one_iterator=1>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, laborum. Temporibus placeat sit eaque nobis? Eaque corrupti dolore accusantium at sint sit, delectus autem doloribus! A at perferendis inventore eum?
            </p>
            <p class="fs-6" task_description_two_iterator=1>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, laborum. Temporibus placeat sit eaque nobis? Eaque corrupti dolore accusantium at sint sit, delectus autem doloribus! A at perferendis inventore eum?
            </p>
            <hr class="hr">
            <div task_file_iterator=1 class="d-flex justify-content-first align-items-top">
            </div>
            <hr class="hr">
        </div>
        @can('attempt_task')
        <div class="card-footer">
                <div task_button_attempt=1>
                    <button class="btn btn-success btnAttemptTask" data-bs-toggle="modal" data-bs-target="#attempt_task_Modal" task_attempt_iterator=1>Attempt</button>
                </div> 
            </div>
        @endcan
    </div>
</div>
<hr class="hr">