<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\agentController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\BadgesController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\JoinTaskController;
use App\Http\Controllers\AdminTaskController;
use App\Http\Controllers\DashboardController;

//CBT

use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CBTController;
use App\Http\Controllers\NotificationController;
//Forum

use App\Http\Controllers\Forum\ThreadController;
use App\Http\Controllers\Forum\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'homepage']);




Route::middleware('auth', 'verified')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   // View all notifications
 Route::prefix('notifications')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::post('/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    Route::post('/clear', [NotificationController::class, 'clear'])->name('notifications.clear');
});


    Route::get('/dashboard', [ProfileController::class, 'task'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::post('/user/profile/store', [HomeController::class, "userProfileStore"])->name('user.profile.store');
//User Profile Image
    Route::get('/user/profile', [HomeController::class, 'userProfile'])->name('user.profile');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, "destroy"])->name('logout');
    // Route::get('/checkvEmailVerification', [EmailVerificationPromptController::class, "__invoke"]);

    //list Task to all users
    Route::get('/user/all-task', [UserTaskController::class, "Tasklisting"])->name('user.all-task');
//User Enrolled tasked
     Route::get('/user/enrolled-task', [UserTaskController::class, "enrolled_task"])->name('user.enrolled-task');

     //User Completed tasked
     Route::get('/user/completed-task', [UserTaskController::class, "completed_task"])->name('user.completed-task');
    //show preview task
    Route::get('/task/show/{id}', [UserTaskController::class, "showTask"])->name('task.show');

    //enroll into task
    Route::get('/enrol/task/{id}', [JoinTaskController::class, "enrolTask"])->name('enrol.task');
//task submission view
    Route::get('/user/task/{id}/submit', [UserTaskController::class, 'showSubmitPage'])
    ->name('task.submit.page');
    //Task submission post
    Route::post('/submit-task/{id}', [UserTaskController::class, 'submitTask'])
     ->name('submit.user.task');

     //View task submissions
     Route::get('/my-task-submissions', [UserTaskController::class, 'mySubmissions'])
    ->name('user.my.submissions');
    //edit task submitted
    Route::get('/edit-submission/{encryptedId}', [UserTaskController::class, 'editSubmission'])->name('editSubmission.task');

    //update edited user submission
    Route::post('/update/editSubmission/{id}', [UserTaskController::class, 'updateSubmission'])->name('update.submission');
//CBT User
Route::get('/cbt/start/{topic}/{task}', [CbtController::class, 'start'])
     ->name('cbt.start');
Route::post('/cbt/submit', [CBTController::class, 'submit'])->name('cbt.submit');
Route::get('/cbt/{topic}/result', [CBTController::class, 'result'])->name('cbt.result');


    

});

require __DIR__.'/auth.php';


/* ---------------------------------------------------
|  FORUM ROUTES
|---------------------------------------------------- */


Route::prefix('forum')->name('forum.')->group(function () {

    // Threads
    Route::get('/', [ThreadController::class, 'index'])->name('threads.index');
    Route::get('/create', [ThreadController::class, 'create'])->middleware('auth')->name('threads.create');
    Route::post('/', [ThreadController::class, 'store'])->middleware('auth')->name('threads.store');
    Route::get('/thread/{thread}', [ThreadController::class, 'show'])->name('threads.show');
    Route::get('/{thread}/edit', [ThreadController::class, 'edit'])->middleware('auth')->name('threads.edit');
    Route::put('/{thread}', [ThreadController::class, 'update'])->middleware('auth')->name('threads.update');
    Route::delete('/{thread}', [ThreadController::class, 'destroy'])->middleware('auth')->name('threads.destroy');

    // Posts
    Route::post('/{thread}/posts', [PostController::class, 'store'])
        ->middleware('auth')
        ->name('posts.store');

    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->middleware('auth')
        ->name('posts.update');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->middleware('auth')
        ->name('posts.destroy');

    Route::post('/posts/{post}/like', [PostController::class, 'like'])
        ->middleware('auth')
        ->name('posts.like');

});

//route for admin
Route::middleware(['auth', 'role:Admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, "adminDashboard"])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, "adminLogout"])->name('admin.logout');
    Route::get('/admin/Badges', [BadgesController::class, "createBadges"])->name('admin.Badges');
    Route::post('/admin/Badges', [BadgesController::class, "badgeUpload"])->name('badge.upload');
    Route::get('/badges/edit/{id}', [BadgesController::class, 'editBadge'])->name('badge.edit');

    // Update badge
Route::post('/badges/update/{id}', [BadgesController::class, 'updateBadge'])->name('badge.update');

// Delete badge
Route::delete('/badges/delete/{id}', [BadgesController::class, 'deleteBadge'])->name('badge.delete');


//Levels

Route::get('/admin/Levels', [LevelsController::class, "createLevels"])->name('admin.Levels');
Route::post('/admin/Levels', [LevelsController::class, "levelUpload"])->name('levels.upload');
    Route::get('/level/edit/{id}', [LevelsController::class, 'editLevel'])->name('level.edit');

    // Update Level
Route::post('/levels/update/{id}', [LevelsController::class, 'updateLevel'])->name('level.update');

// Delete Level
Route::delete('/levels/delete/{id}', [LevelsController::class, 'deleteLevel'])->name('level.delete');

//create Task view
Route::get('/admin/Tasks', [TasksController::class, "createTasks"])->name('admin.Tasks');
//save task
Route::post('/admin/store-task', [TasksController::class, 'store'])->name('store-task');

//List all tasks
Route::get('/admin/show-task', [TasksController::class, 'showTask'])->name('admin.showTask');
//edit task view page
Route::get('/admin/edit-task/{id}', [TasksController::class, 'editTask'])->name('admin.edit-task');
//upadte task
Route::post('/admin/update-task/{id}', [TasksController::class, 'updateTask'])->name('admin.update-task');
//delete Task
Route::delete('/admin/tasks/{id}', [TasksController::class, 'taskDestroy'])->name('admin.task.destroy');





// Show all submissions pending approval
    Route::get('/admin/task-submissions', [AdminTaskController::class, 'index'])
        ->name('admin.submissions');

    // Show single submission details for approval or rejection
    Route::get('/admin/task-submissions/{id}', [AdminTaskController::class, 'show'])
        ->name('admin.submission.view');

    // Approve a submission
    Route::post('/admin/task-submissions/{id}/approve', [AdminTaskController::class, 'approve'])
        ->name('admin.approve.submission');

    // Reject a submission
    Route::post('/admin/task-submissions/{id}/reject', [AdminTaskController::class, 'reject'])
        ->name('admin.reject.submission');


//Admin Profile
    Route::get('/admin/profile', [AdminController::class, "adminProfile"])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, "adminProfileStore"])->name('admin.profile.store');
    Route::post('/calendar/store', [AdminController::class, "store"])->name('calendar.store');
    Route::get('/admin/change/password', [AdminController::class, "adminChangePassword"])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, "adminUpdatePassword"])->name('admin.update.password');

    //Creating a group for Permissions
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
        //Route::get('/all/roles', 'AllRoles')->name('all.roles');


        //CBT

    //Topics
Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('/topics/create', [TopicController::class, 'create'])->name('topics.create');
Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');

// Questions
Route::get('/topics/{topic}/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/topics/{topic}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/topics/{topic}/questions', [QuestionController::class, 'store'])->name('questions.store');

// CBT
//List All Topics
Route::get('List-All/topics', [TopicController::class, 'allTopics'])->name('All-topics.index');



// NEW ROUTES YOU ASKED FOR:
Route::get('/topics/{id}', [TopicController::class, 'show'])->name('topics.show');
Route::get('/topics/{id}/edit', [TopicController::class, 'edit'])->name('topics.edit');
Route::put('/topics/{id}', [TopicController::class, 'update'])->name('topics.update');
Route::delete('/topics/{id}', [TopicController::class, 'destroy'])->name('topics.destroy');

    });

    //Creating a group for Roles
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/roles', 'AddRoles')->name('add.roles');
        Route::post('/store/roles', 'StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

        //roles in Permission
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'rolesPermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminRolesEdit')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
       Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');

    
    });// End RoleController Group 

    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/admin', 'AllAdmin')->name('all.admin')->middleware('permission:all.administrators');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
    });// End Settings Group 


    Route::controller(EventController::class)->group(function(){
        Route::get('/event-record/{id}', 'index')->name('event.get');
        Route::get('/event-record/update/{id}', 'edit')->name('event.update');
      Route::get('/expense-record/update/{id}', 'expenses')->name('expense.get');
        Route::post('/event/save', 'store')->name('event.save');
        Route::get('/edit/expense/{id}', 'EditExpense')->name('edit.expense');
        Route::post('/delete/expense/{id}', 'DeleteExpense')->name('delete.expense');

    });// End Settings Group 

}); //End Admin Middleware


Route::get('/admin/login', [AdminController::class, "adminLogin"])->name('admin.login');


//routes for Agent

Route::middleware(['auth','role:Agent'])->group(function(){
    Route::get('/agent/dashboard', [agentController::class, "agentDashboard"])->name('agent.dashboard');

});