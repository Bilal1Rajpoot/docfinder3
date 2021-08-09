<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

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

Route::get('/home', [App\Http\Controllers\DoctorController::class, 'dashboard'])->name('dashboard');



Route::get('/dashboard', 'App\Http\Controllers\DoctorController@dashboard')->name('doctor.dashboard');;
Route::get('/appointments', 'App\Http\Controllers\DoctorController@appointments');
Route::get('/my-patients', 'App\Http\Controllers\DoctorController@myPatients');
Route::get('/schedule-timings', 'App\Http\Controllers\DoctorController@scheduleTimings');
Route::get('/reviews', 'App\Http\Controllers\DoctorController@reviews');
Route::get('/doctor-profile-settings', 'App\Http\Controllers\DoctorController@doctorProfileSettings');
Route::get('/social-media', 'App\Http\Controllers\DoctorController@socialMedia');
Route::get('/doctor-change-password', 'App\Http\Controllers\DoctorController@doctorChangePassword');
Route::get('/doctor-login', 'App\Http\Controllers\DoctorController@doctorLogin');
Route::post('/savedUserSetting', 'App\Http\Controllers\DoctorController@saveUserSetting');
Route::post('/savedDoctorSchedule', 'App\Http\Controllers\DoctorController@savedDoctorSchedule');
Route::post('/changePassword', 'App\Http\Controllers\DoctorController@changePassword');
Route::post('/savedSocialMedia', 'App\Http\Controllers\DoctorController@savedSocialMedia');
Route::post('/doctor/basic_info', 'App\Http\Controllers\DoctorController@savedBasicInformation')->name('doctor.basic_information');
Route::post('/doctor/contact', 'App\Http\Controllers\DoctorController@savedContact')->name('doctor.contact');
Route::post('/doctor/education', 'App\Http\Controllers\DoctorController@savedEducation')->name('doctor.education');
Route::post('/doctor/clinic', 'App\Http\Controllers\DoctorController@savedClinic')->name('doctor.clinic');
Route::post('/doctor/education/delete', 'App\Http\Controllers\DoctorController@deleteEducation')->name('doctor.education.delete');
Route::post('/doctor/clinic/', 'App\Http\Controllers\DoctorController@saveClinic')->name('doctor.clinic');
Route::post('/doctor/services/', 'App\Http\Controllers\DoctorController@saveServices')->name('doctor.services');
Route::get('/doctor/services/delete', 'App\Http\Controllers\DoctorController@deleteServices')->name('doctor.services.delete');
Route::post('/doctor/upload/cv', 'App\Http\Controllers\DoctorController@uploadCV')->name('doctor.upload.cv');
Route::post('/doctor/fee', 'App\Http\Controllers\DoctorController@saveFee')->name('doctor.fee');
Route::post('/doctor/award', 'App\Http\Controllers\DoctorController@saveAward')->name('doctor.award');
Route::get('/doctor/award/delete', 'App\Http\Controllers\DoctorController@awardDelete')->name('doctor.award.delete');
Route::get('/doctor/video', 'App\Http\Controllers\DoctorController@video')->name('doctor.video');


Route::post('/doctor/specialization', 'App\Http\Controllers\DoctorController@saveSpecialization')->name('doctor.specialization');
Route::get('/doctor/specialization/delete', 'App\Http\Controllers\DoctorController@deleteSpecialization')->name('doctor.specialization.delete');

Route::post('/doctor/experience', 'App\Http\Controllers\DoctorController@saveExperience')->name('doctor.experience');
Route::get('/doctor/experience/delete', 'App\Http\Controllers\DoctorController@deleteExperience')->name('doctor.experience.delete');
Route::get('/doctor/category/{category}', 'App\Http\Controllers\HomeController@category')->name('doctor.category');


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/search', 'App\Http\Controllers\HomeController@search');
Route::get('/doctor/{id}', 'App\Http\Controllers\HomeController@doctorProfile');
Route::get('/doctor/{id}/booking', 'App\Http\Controllers\HomeController@booking');
Route::post('doctor/appointment/cancel', 'App\Http\Controllers\DoctorController@cancelAppointment')->name('doctor.appointment.cancel');
Route::post('patient/appointment/cancel', 'App\Http\Controllers\PatientController@cancelAppointment')->name('patient.appointment.cancel');
Route::post('/patient/bookmark', 'App\Http\Controllers\HomeController@bookmarkDoctor')->name('patient.bookmark');
Route::get('/patient/isLogin', 'App\Http\Controllers\HomeController@isPatientLogin')->name('patient.isLogin');
Route::get('/patient/invoice/{id}', 'App\Http\Controllers\PatientController@invoice')->name('patient.invoice');
Route::get('patient/prescription/{id}', 'App\Http\Controllers\PatientController@prescription')->name('patient.prescription');


Route::get('/patient/login', 'App\Http\Controllers\PatientAuthController@login')->name('patient.login');
Route::get('/patient', 'App\Http\Controllers\PatientController@dashboard')->name('patient.dashboard');
Route::post('/patient/booking/login', 'App\Http\Controllers\PatientAuthController@patientBookinglogin')->name('patient.booking.authenticate');
Route::get('/patient/registration', 'App\Http\Controllers\PatientAuthController@registration')->name('patient.registration');
Route::post('/patient/create', 'App\Http\Controllers\PatientAuthController@create')->name('patient.create');
Route::post('/patient/authenticate', 'App\Http\Controllers\PatientAuthController@authenticate')->name('patient.authenticate');
Route::get('/patient/password', 'App\Http\Controllers\PatientController@showPassword')->name('patient.password');
Route::post('/patient/password/update', 'App\Http\Controllers\PatientController@updatePassword')->name('patient.password.update');
Route::get('/patient/logout', 'App\Http\Controllers\PatientAuthController@logout')->name('patient.logout');
Route::get('/patient/dashboard', 'App\Http\Controllers\PatientController@dashboard')->name('patient.dashboard');
Route::get('/patient/profile', 'App\Http\Controllers\PatientController@profile')->name('patient.profile');
Route::post('/patient/profile/save', 'App\Http\Controllers\PatientController@saveProfile')->name('patient.profile.save');
Route::get('patient/favourites', 'App\Http\Controllers\PatientController@favourites')->name('patient.favourites');
Route::get('patient/medical_record', 'App\Http\Controllers\PatientController@medicalRecord')->name('patient.medical_record');
Route::post('patient/medical_record/create', 'App\Http\Controllers\PatientController@medicalRecordCreate')->name('patient.medical-record.create');
Route::post('patient/upload', 'App\Http\Controllers\PatientController@uploadFile')->name('patient.upload');
Route::get('patient/meeting/{appointment_id}', 'App\Http\Controllers\PatientController@meeting')->name('patient.meeting');
Route::post('patient/meeting/feedback', 'App\Http\Controllers\PatientController@feedback')->name('patient.meeting.feedback');
Route::post('patient/meeting/feedback/skip', 'App\Http\Controllers\PatientController@feedbackSkip')->name('patient.meeting.feedback.skip');


Route::post('/patient/book/appointment', 'App\Http\Controllers\AppointmentController@create')->name('patient.book.appointment');


//admin routes

Route::get('/admin', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/login', 'App\Http\Controllers\AdminAuthController@login')->name('admin.login');
Route::post('/admin/authenticate', 'App\Http\Controllers\AdminAuthController@authenticate')->name('admin.authenticate');
Route::get('/admin/logout', 'App\Http\Controllers\AdminAuthController@logout')->name('admin.logout');
Route::get('/admin/profile', 'App\Http\Controllers\AdminController@profile')->name('admin.profile');
Route::post('/admin/profile/save', 'App\Http\Controllers\AdminController@saveProfile')->name('admin.profile.save');
Route::post('/admin/profile/image', 'App\Http\Controllers\AdminController@saveImage')->name('admin.profile.image');
Route::get('/admin/reviews', 'App\Http\Controllers\AdminController@reviews')->name('admin.reviews');
Route::get('/admin/roles', 'App\Http\Controllers\AdminController@roles')->name('admin.roles')->middleware('IsSuperAdmin');
Route::post('/admin/role/create', 'App\Http\Controllers\AdminController@createRole')->name('admin.role.create')->middleware('IsSuperAdmin');
Route::get('/admin/role/delete', 'App\Http\Controllers\AdminController@deleteRole')->name('admin.role.delete');
Route::get('/admin/manage/doctor', 'App\Http\Controllers\AdminController@manageDoctor')->name('admin.manage.doctor');
Route::post('/admin/manage/doctor/search', 'App\Http\Controllers\AdminController@searchDoctor')->name('admin.manage.doctor.search');
Route::get('/admin/manage/doctor/block', 'App\Http\Controllers\AdminController@blcokDoctor')->name('admin.manage.doctor.block');
Route::get('/admin/manage/doctor/unblock', 'App\Http\Controllers\AdminController@unblcokDoctor')->name('admin.manage.doctor.unblock');
Route::get('/admin/doctor/verify', 'App\Http\Controllers\AdminController@verifyDoctor')->name('admin.doctor.verify');



Route::get('/meeting/{appointmentID}', 'App\Http\Controllers\MeetingController@meeting')->name('meeting');
Route::get('/meeting/{appointmentID}/{meetingID}', 'App\Http\Controllers\MeetingController@startMeeting')->name('meeting');

