<?php

use App\Models\User;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

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


Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginPage'])->name('login-page');
Route::get('/registration-page', [\App\Http\Controllers\UserController::class, 'registrationPage'])->name('register-page');
Route::post('/review-terms', [\App\Http\Controllers\UserController::class, 'reviewTerms']);
Route::get('/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::get('/forgot', [\App\Http\Controllers\UserController::class, 'forgot']);
Route::get('/reset/{email}/{token}', [\App\Http\Controllers\UserController::class, 'reset'])->name('reset');

Route::post('/register', [\App\Http\Controllers\UserController::class, 'saveUser'])->name('auth.register');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginUser'])->name('auth.login');
Route::get('/signin', function (){
    return view('admin.church_members.html');
});
Route::post('/forgot-password', [\App\Http\Controllers\UserController::class, 'forgotPassword'])->name('auth.forgot');
Route::post('/reset-password', [\App\Http\Controllers\UserController::class, 'resetPassword'])->name('auth.reset');

Route::group(['middleware'=>['LoginCheck']], function (){
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('register');
    Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('auth.logout');
    Route::get('/profile',[\App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/profile-image', [\App\Http\Controllers\UserController::class, 'profileImageUpdate'])->name('profile.image');
    Route::post('/profile-edit', [\App\Http\Controllers\UserController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/profile-update', [\App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.update');
    Route::post('/profile-pass-subcounty', [\App\Http\Controllers\UserController::class, 'profilePasSubcounty'])->name('profile.pass-subcounty');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/status-based-dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'statusBasedDashboard'])->name('admin.staus-based-dashboard');
    Route::get('/insert-active-dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'insertActiveDashboard'])->name('admin.insert-active-dashboard');
    Route::get('/side-profile-edit', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('side-profile-edit');
    Route::get('/main-church-members', [\App\Http\Controllers\Admin\DashboardController::class, 'churchMembers'])->name('members.index');
    Route::get('/status-based-members', [\App\Http\Controllers\Admin\DashboardController::class, 'statusBasedMembers']);
    Route::get('/conditional_title_array', [\App\Http\Controllers\Admin\DashboardController::class, 'conditionTitleArray']);
    Route::post('delete-member', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
    Route::post('deactivate-member', [\App\Http\Controllers\UserController::class, 'deactivate'])->name('deactivate');
    Route::post('/edit-member', [\App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.admin_update');
    Route::post('/admin-add-member', [\App\Http\Controllers\Admin\DashboardController::class, 'adminRegisterMember'])->name('members.create');
    Route::post('/admin-assign-role', [\App\Http\Controllers\Admin\DashboardController::class, 'adminAssignRole'])->name('members.assign');
    Route::post('/admin-assign-id', [\App\Http\Controllers\Admin\DashboardController::class, 'adminAssignId'])->name('members.assign_id');
    Route::post('/admin-review-membership', [\App\Http\Controllers\Admin\DashboardController::class, 'reviewMembership'])->name('admin.review-membership');
    Route::post('/align-phone', [\App\Http\Controllers\Admin\DashboardController::class, 'alignPhone'])->name('align_phone');
//    Route::get('/generate-pdf', [\App\Http\Controllers\Admin\DashboardController::class, 'getPdf'])->name('generate-pdf');
    Route::post('/generate-pdf', [\App\Http\Controllers\PDF\PDFController::class, 'generatePDF'])->name('generate-pdf');

});

//test route
Route::get('/data', function () {
    $members = \App\Models\ActivityLog::with('createdByUser')->orderBy('created_by', 'desc')->get();
    foreach($members as $notification){
        $user = $notification->createdByUser;
        $gender_id = $user->gender;
        if(isset($notification->affected_user)){
            $affected_user = \App\Models\User::where('id', $notification->affected_user)->first()->name;
        }
        if ($gender_id == config('membership.gender.male.id')){
            $gender_possessive = 'His';
        }else{
            $gender_possessive = 'Her';
        }
        $activity = config('membership.statuses.activities')[$notification->activity];
        if ($notification->activity === config('membership.activities.application')||
            $notification->activity === config('membership.activities.login')||
            $notification->activity === config('membership.activities.logout')||
            $notification->activity === config('membership.activities.password_reset')||
            $notification->activity === config('membership.activities.profile_update')||
            $notification->activity === config('membership.activities.profile_image_update')
            ){
            $activity_refined = str_replace(':gender_poseesive', $gender_possessive, $activity);
        }elseif($notification->activity === config('membership.activities.creation')||
        $notification->activity === config('membership.activities.membership_preparation')||
        $notification->activity === config('membership.activities.membership_review')||
        $notification->activity === config('membership.activities.membership_approval')||
        $notification->activity === config('membership.activities.role_assignment')||
        $notification->activity === config('membership.activities.member_deletion')||
        $notification->activity === config('membership.activities.member_deactivating')||
        $notification->activity === config('membership.activities.member_decline')||
        $notification->activity === config('membership.activities.member_edit')||
        $notification->activity === config('membership.activities.reinstating')||
        $notification->activity === config('membership.activities.role_unassignment')||
        $notification->activity === config('membership.activities.member_activating')
        ){
            $activity_refined = str_replace(':username', $affected_user, $activity);
        }elseif(
            $notification->activity === config('membership.activities.see_report')||
            $notification->activity === config('membership.activities.report_generation')
        ){
            $category = config('membership.statuses.age_clusters')[$notification->report_category]['text'];
            $activity_refined = str_replace(':category', $category, $activity);
        }
        else{
            $activity_refined = $activity;
        }
    dump($activity_refined);
    }
});


