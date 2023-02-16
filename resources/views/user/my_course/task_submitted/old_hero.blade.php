<h3 class="fs-3">List Task</h3>
<hr class="hr">


<div class="accordion accordion-flush border" id="accordionAllTask">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne" accordion_task_header_iterator=1>
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" accordion_task_button_iterator=1>
            Task from Class Owen
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionAllTask" accordion_task_body_iterator=1>
          <div class="accordion-body" accordion_task_content_iterator=1>
            <div class="d-flex justify-content-between mb-0">
              <div>
                <p class="fs-6 fw-bold mb-0">Number of students : 4</p>
                <p class="fs-6 fw-bold mt-0">Students sent      : 4</p>
              </div>
              <div>
                <p class="fs-6 fw-bold mb-0">Due Date : 19/03/2023</p>
                <p class="fs-6 fw-bold mt-0">Due Time : 10:00 am</p>
              </div>
            </div>
            <hr class="hr mt-0">
              <div class="table-responsive">
                <table class="table" style="overflow-x:auto;">
                    <thead class="w-100">
                      <th>#</th>
                      <th style="width:1000px" class="w-100">Fullname</th>
                      <th style="width:200px">File Submitted</th>
                      <th style="width:200px" class="text-nowrap">Date Submitted</th>
                      <th style="width:200px">Actions</th>
                      <th style="width:1000px" class="w-100">Mark</th>
                    </thead>
                    <tbody style="overflow-x:auto;">
                      <tr class="w-auto">
                        <td>1</td>
                        <td style="width:1000px" class="text-nowrap">Amir Hafidz</td>
                        <td><a href="">File_Submitted_by_this_student.pdf</a></td>
                        <td>1</td>
                        <td class="">
                          <div class="d-flex justify-content-center">
                            <button class="btn btn-success me-1" type="button"><i class="fa-sharp fa-solid fa-circle-check"></i></button>
                            <button class="btn btn-danger me-1" type="button"><i class="fa-solid fa-circle-xmark"></i></button>
                            <button class="btn btn-danger" type="button"><i class="fa-solid fa-circle-xmark"></i></button>
                          </div>
                        </td>
                        <td class="w-100" style="width:1000px">
                          <input type="text" class="form-control w-100" style="width:1000px">
                        </td>
                      </tr>
                    </tbody>
                </table>
              </div>
          </div>
        </div>
    </div>
</div>

{{-- // iterator++;

// $('#accordionAllTask').append(`@include('user.my_course.content.all_task_submitted_accordion')`);

// $($('[accordion_task_header_iterator=1]')).attr('id', 'accordion_task'+element.id);
// $($('[accordion_task_header_iterator=1]')).attr('accordion_task_header_iterator',iterator);

// $($('[accordion_task_button_iterator=1]')).attr('data-bs-target','#accordion_task_body'+element.id);
// $($('[accordion_task_button_iterator=1]')).attr('aria-controls','accordion_task_body'+element.id);
// $($('[accordion_task_button_iterator=1]')).attr('accordion_task_button_iterator',iterator);

// $($('[accordion_task_body_iterator=1]')).attr('id','accordion_task_body'+element.id);
// $($('[accordion_task_body_iterator=1]')).attr('aria-labelledby','flush-accordion_task_body'+element.id);
// $($('[accordion_task_body_iterator=1]')).attr('accordion_task_body_iterator',iterator);

// $($('[accordion_task_content_iterator=1]')).attr('id','accordion_task_content'+element.id);
// $($('[accordion_task_content_iterator=1]')).attr('aria-labelledby','flush-accordion_task_content'+element.id);
// $($('[accordion_task_content_iterator=1]')).attr('accordion_task_content_iterator',iterator); --}}
