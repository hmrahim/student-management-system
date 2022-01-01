<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@frontend')->name('frontend');
Route::get('/admin', 'HomeController@index')->name('home');
Route::prefix("setup")->group(function(){

    //===================student class routs ==============================
    Route::get("/class/add-class","backend\studentClassController@add_class")->name("add_class");
    Route::post("/class/insert-data","backend\studentClassController@insert_data")->name("insert_class_data");
    Route::get("/class/view-class","backend\studentClassController@view_class")->name("view_class");
    Route::get("/class/delete/{id}","backend\studentClassController@delete_class_data")->name("delete_class_data");
    Route::get("/class/edit-data/{id}","backend\studentClassController@edit_class_data")->name("edit_class_data");
    Route::post("/class/update-data/{id}","backend\studentClassController@update_class_data")->name("update_class_data");


    // //=====================year routs ===============================
    Route::get("/year/add-year","backend\YearController@add_year")->name("add_year");
    Route::post("/year/insert-data","backend\YearController@insert_data")->name("insert_year_data");
    Route::get("/year/view-year","backend\YearController@view_year")->name("view_year");
    Route::get("/year/delete/{id}","backend\YearController@delete_data")->name("delete_year_data");
    Route::get("/year/edit-data/{id}","backend\YearController@edit_data")->name("edit_year_data");
    Route::post("/year/update-data/{id}","backend\YearController@update_data")->name("update_year_data");
    // //=====================Group routs ===============================
    Route::get("/group/view-group","backend\groupController@view_group")->name("view_group");
    Route::get("/group/add-group","backend\groupController@add_group")->name("add_group");
    Route::post("/group/insert-data","backend\groupController@insert_data")->name("insert_group_data");
    Route::get("/group/delete/{id}","backend\groupController@delete_data")->name("delete_group_data");
    Route::get("/group/edit-data/{id}","backend\groupController@edit_data")->name("edit_group_data");
    Route::post("/group/update-data/{id}","backend\groupController@update_data")->name("update_group_data");
    // //=====================shift routs ===============================
    Route::get("/shift/view-shift","backend\ShiftController@view_shift")->name("view_shift");
    Route::get("/shift/add-shift","backend\ShiftController@add_shift")->name("add_shift");
    Route::post("/shift/insert-data","backend\ShiftController@insert_data")->name("insert_shift_data");
    Route::get("/shift/delete/{id}","backend\ShiftController@delete_data")->name("delete_shift_data");
    Route::get("/shift/edit-data/{id}","backend\ShiftController@edit_data")->name("edit_shift_data");
    Route::post("/shift/update-data/{id}","backend\ShiftController@update_data")->name("update_shift_data");
    //=====================student fee routs ===============================
    Route::get("/fee/view-fee","backend\FeeController@view_fee")->name("view_fee");
    Route::get("/fee/add-fee","backend\FeeController@add_fee")->name("add_fee");
    Route::post("/fee/insert-data","backend\FeeController@insert_fee_data")->name("insert_fees_data");
    Route::get("/fee/delete/{id}","backend\FeeController@delete_data")->name("delete_fee_data");
    Route::get("/fee/edit-data/{id}","backend\FeeController@edit_data")->name("edit_fee_data");
    Route::post("/fee/update-data/{id}","backend\FeeController@update_data")->name("update_fee_data");
    //=====================student fee amount routs ===============================
    Route::get("/amount/view-fees-amount","backend\FeeAmountController@view_fees_amount")->name("view_fees_amount");
    Route::get("/amount/add-fees-amount","backend\FeeAmountController@add_fees_amount")->name("add_fees_amount");
    Route::post("/amount/insert-data","backend\FeeAmountController@insert_data")->name("insert_fees_amount_data");
    Route::get("/amount/view-data/{fee_category_id}","backend\FeeAmountController@view_data")->name("view_fees_amount_data");
    Route::get("/amount/edit-data/{fee_category_id}","backend\FeeAmountController@edit_data")->name("edit_fees_amount_data");
    Route::post("/amount/update-data/{fee_category_id}","backend\FeeAmountController@update_data")->name("update_fees_amount_data");

    //=====================exam type routs ===============================
    Route::get("exam/view-exam-type","backend\ExamTypeController@view_exam_type")->name("view_exam_type");
    Route::get("/exam/add-exam-type","backend\ExamTypeController@add_exam_type")->name("add_exam_type");
    Route::post("/exam/insert-exam-data","backend\ExamTypeController@insert_data")->name("insert_exam_type");

    Route::get("/exam/edit-exam-data/{id}","backend\ExamTypeController@edit_data")->name("edit_exam_type");
    Route::post("/exam/update-exam-data/{id}","backend\ExamTypeController@update_data")->name("update_exam_type");
    Route::get("/exam/delete-exam-data/{id}","backend\ExamTypeController@delete_data")->name("delete_exam_type");


      //=====================student fee routs ===============================
      Route::get("/subject/view-subject","backend\SubjectController@view_subject")->name("view_subjects");
      Route::get("/subject/add-subject","backend\SubjectController@add_subject")->name("add_subjects");
      Route::post("/subject/insert-data","backend\SubjectController@insert_data")->name("insert_subjects");
      Route::get("/subject/delete/{id}","backend\SubjectController@delete_data")->name("delete_subjects");
      Route::get("/subject/edit-data/{id}","backend\SubjectController@edit_data")->name("edit_subjects");
      Route::post("/subject/update-data/{id}","backend\SubjectController@update_data")->name("update_subjects");

       //=====================student fee amount routs ===============================
    Route::get("/assign/subject/view","backend\AssignSubjectController@view")->name("view_assign_subject");
    Route::get("/assign/subject/add","backend\AssignSubjectController@add")->name("add_assign_subject");
    Route::post("/assign/subject/insert","backend\AssignSubjectController@insert")->name("insert_assign_subject");
    Route::get("/assign/subject/details/{class_id}","backend\AssignSubjectController@details")->name("details_assign_subject");
    Route::get("/assign/subject/edit/{class_id}","backend\AssignSubjectController@edit")->name("edit_assign_subject");
    Route::post("/assign/subject/update/{class_id}","backend\AssignSubjectController@update")->name("update_assign_subject");

       //=====================designation routs ===============================
    Route::get("/designetion/view","backend\DesignetionController@view")->name("view_designetion");
    Route::get("/designetion/add","backend\DesignetionController@add")->name("add_designetion");
    Route::post("/designetion/insert","backend\DesignetionController@insert")->name("insert_designetion");
    Route::get("/designetion/edit/{id}","backend\DesignetionController@edit")->name("edit_designetion");
    Route::post("/designetion/update/{id}","backend\DesignetionController@update")->name("update_designetion");
    Route::get("/designetion/delete/{id}","backend\DesignetionController@delete")->name("delete_designetion");


});


Route::prefix("studentregi")->group(function(){
    Route::get("/student/view","backend\student\StudentController@view")->name("view_student");
    Route::get("/student/add","backend\student\StudentController@add")->name("add_student");
    Route::post("/student/insert","backend\student\StudentController@insert")->name("insert_student");
    Route::get("/student/edit/{student_id}","backend\student\StudentController@edit")->name("edit_student");
    Route::post("/student/update/{student_id}","backend\student\StudentController@update")->name("update_student");


    Route::get("/student/promotion/{student_id}","backend\student\StudentController@promotion_student")->name("promotion_student");
    Route::post("/student/promotion/{student_id}","backend\student\StudentController@promote_student")->name("promote_student");
    Route::get("/student/search-student","backend\student\StudentController@search_student")->name("search_student");
    Route::get("/student/details/{student_id}","backend\student\StudentController@details_student")->name("details_student");


    Route::get("/student/roll-genarate","backend\student\RollGenaraeController@roll_genarate")->name("roll_genarate");
    Route::get("/student/get-student","backend\student\RollGenaraeController@get_student")->name("get_student");
    Route::post("/student/insert-roll","backend\student\RollGenaraeController@insert_roll")->name("insert_roll");

    //===========================registration fee routs=============================
    Route::get("/student/view/registration-fee","backend\student\RegistrationFeeController@view")->name("view_registration_fee");
    Route::get("/student/get-student/regi-fee","backend\student\RegistrationFeeController@get_student_regi_fee")->name("get_student_regi_fee");
    Route::get("/student/view/details-pdf/{student_id}","backend\student\RegistrationFeeController@get_pdf")->name("get_pdf");


    //===========================Monthly fee routs=============================
    Route::get("/student/view/monthly-fee","backend\student\MonthlyFeeController@view")->name("view_monthly_fee");
    Route::get("/student/get-student/monthly-fee","backend\student\MonthlyFeeController@get_student_monthly_fee")->name("get_student_monthly_fee");
    Route::get("/student/view/monthly-fee-details-pdf/{student_id}","backend\student\MonthlyFeeController@get_pdf_monthly_fee")->name("get_pdf_monthly_fee");

    //===========================Exam fee routs=============================
    Route::get("/student/view/exam-fee","backend\student\ExamFeeController@view")->name("view_exam_fee");
    Route::get("/student/get-student/exam-fee","backend\student\ExamFeeController@get_student_exam_fee")->name("get_student_exam_fee");
    Route::get("/student/view/exam-fee-details-pdf/{student_id}","backend\student\ExamFeeController@get_pdf_exam_fee")->name("get_pdf_exam_fee");





});
Route::prefix("employeregi")->group(function(){
    //============================Employe register Route==================================
    Route::get("/regi/view","backend\manageEmploye\EmployeController@view")->name("view_employe");
    Route::get("/regi/add","backend\manageEmploye\EmployeController@add")->name("add_employe");
    Route::post("/regi/insert","backend\manageEmploye\EmployeController@insert")->name("insert_employe");
    Route::get("/regi/edit/-{id}","backend\manageEmploye\EmployeController@edit")->name("edit_employe");
    Route::post("/regi/update/-{id}","backend\manageEmploye\EmployeController@update")->name("update_employe");

    //============================Employe Salary Route==================================
    Route::get("/salary/view","backend\manageEmploye\EmployeSalaryController@view")->name("view_salary");
    Route::get("/salary/increment/-{id}","backend\manageEmploye\EmployeSalaryController@add")->name("add_salary_increment");
    Route::post("/salary/insert/-{id}","backend\manageEmploye\EmployeSalaryController@insert")->name("insert_salary");
    Route::get("/salary/view-details/-{id}","backend\manageEmploye\EmployeSalaryController@view_salary_details")->name("view_salary_details");

    //============================Employe Leave Route==================================
    Route::get("/leave/view","backend\manageEmploye\EmployeLeaveController@view")->name("view_leave");
    Route::get("/leave/increment","backend\manageEmploye\EmployeLeaveController@add")->name("add_employe_leave");
    Route::post("/leave/insert","backend\manageEmploye\EmployeLeaveController@insert")->name("insert_leave");
    Route::get("/leave/edit/-{id}","backend\manageEmploye\EmployeLeaveController@edit_employe_leave")->name("edit_employe_leave");
    Route::post("/leave/update/-{id}","backend\manageEmploye\EmployeLeaveController@update")->name("update_leave");



});
Route::prefix("marks")->group(function(){
    //============================Employe Leave Route==================================
    Route::get("/add","backend\marks\MarksController@add")->name("add.marks");
    Route::post("/stor","backend\marks\MarksController@stor")->name("stor.marks");
    Route::get("/edit","backend\marks\MarksController@edit")->name("edit.marks");
    Route::get("/grade-point/view","backend\marks\MarksController@view_grade_point")->name("view.grade.point");
    Route::get("/grade-point/add","backend\marks\MarksController@add_grade_point")->name("add.grade.point");
    Route::post("/grade-point/insert","backend\marks\MarksController@insert_grade_point")->name("insert.grade.point");
    Route::post("/grade-point/update/{id}","backend\marks\MarksController@update_grade_point")->name("update.grade.point");
    Route::get("/grade-point/edit/{id}","backend\marks\MarksController@edit_grade_point")->name("edit.grade.point");

    Route::get("/get-subject","backend\marks\DefaultController@get_subject")->name("get_subject");
    Route::get("/get-student","backend\marks\DefaultController@get_student")->name("get_student");
    Route::get("/get-edit-data","backend\marks\DefaultController@get_edit_data")->name("get_edit_data");
    Route::post("/update-data","backend\marks\DefaultController@update")->name("update_data");



});
