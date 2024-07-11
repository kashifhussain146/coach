<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AssignmentCategoryController;
use App\Http\Controllers\Backend\SubjectCategoryController;
use App\Http\Controllers\Backend\SubjectCategoryControllers;
use App\Http\Controllers\Backend\CollegesController;
use App\Http\Controllers\Backend\CourseCodeController;

use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\OnlineClassesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\QuestionsController;
use App\Http\Controllers\AdminAuth\LoginController as AdminLoginController;
use App\Http\Controllers\AdminAuth\RegisterController as AdminRegisterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\FilerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Backend\ModulesDataController;
use App\Http\Controllers\Backend\ModulesController;
use App\Http\Controllers\Backend\WidgetPagesController;
use App\Http\Controllers\Backend\WidgetsController;
use App\Http\Controllers\Backend\WidgetDataController;
use App\Http\Controllers\Backend\RolePermissionController;
use App\Http\Controllers\Backend\TasksController;
use App\Http\Controllers\Backend\EmailTemplatesController;
use App\Http\Controllers\Backend\MastersController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GetAQuoteController;
use App\Http\Controllers\QuoteController;
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


Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blog/{id}', [HomeController::class, 'blogDetail'])->name('blog.detail');

Route::get('/about-us', [HomeController::class, 'aboutUsView'])->name('about-us');
Route::get('/services', [HomeController::class, 'servicesView'])->name('services');
Route::get('/get-a-quote', [HomeController::class, 'contactView'])->name('get-a-quote');
Route::post('/submit-quote', [QuoteController::class, 'submitQuote'])->name('submit.quote');




Route::get('/solutions-library', [HomeController::class, 'solutionsLibrary'])->name('solutions.library');
Route::get('/take-my-online-class', [HomeController::class, 'takeMyOnlineClass'])->name('take.my.online.class');
Route::get('/solutions-library/question/{question_id}', [HomeController::class, 'questionDetails'])->name('solutions.library.question.page');
Route::get('/solutions-library/subject-topics/{subject_id}/{topic_id?}', [HomeController::class, 'solutionsLibrary'])->name('solutions.library.subject.page');

Route::get('/pages/faq', [HomeController::class, 'faq'])->name('pages.faq');
Route::get('/pages/privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.policy');
Route::get('/pages/terms-conditions', [HomeController::class, 'termsconditions'])->name('pages.termsconditions');

Route::get('/ajax/subcategory', [HomeController::class,'getSubcategory'])->name('get.ajax.subcategory');
Route::get('/ajax/subjects', [HomeController::class,'getSubjects'])->name('get.ajax.subjects');

Route::get('/assignment-help', [AssignmentController::class, 'index'])->name('assignment.help');
Route::get('/assignment/help/{module_data_id}', [AssignmentController::class, 'assignmentDetails'])->name('assignment.help.details')->where(['slug' => '[a-z]+']);


Route::group(['middleware' => ['auth']], function() {
    Route::get('/cart', [CartController::class,'index'])->name('cart.index');
    Route::post('/cart/add',[CartController::class,'addToCart'])->name('cart.addToCart');
    Route::post('/cart/remove/{cart}',[CartController::class,'removeFromCart'])->name('cart.removeFromCart');
    Route::get('/checkout', [CartController::class,'index'])->name('checkout.index');
    Route::post('/checkout', [CartController::class,'checkoutPost'])->name('checkout.question');


    Route::post('/payment',[PaymentController::class,'createPayment'])->name('payment.create');
    Route::get('/order-success/{payment_id}', [PaymentController::class,'success'])->name('payment.success');

});
Route::post('ckeditor/upload',[CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
Route::post('ajax_upload_file',[FilerController::class, 'upload'])->name('filer.image-upload');
Route::post('ajax_remove_file',[FilerController::class, 'fileDestroy'])->name('filer.image-remove');

Route::post('/freelancer/login', [AdminLoginController::class,'freelancerLogin'])->name('freelancer.post.login');
Route::post('/freelancer/signup', [AdminRegisterController::class,'freelancerSignup'])->name('freelancer.post.signup');
Route::post('/freelancer/logout', [HomeController::class,'freelancerLogout'])->name('freelancer.post.logout');


Route::get('/admin/login', [AdminLoginController::class,'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class,'adminLogin'])->name('admin.post.login');
Route::post('/admin/logout', [AdminLoginController::class,'logout'])->name('admin.post.logout');

Route::group(['middleware' => ['auth:admin']], function() {
    //Banner Master
    Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [DashboardController::class,'index'])->name('admin.profile');

    Route::get('/free-lancer/dashboard', [DashboardController::class,'index'])->name('free.lancer.dashboard');
    Route::get('/free-lancer/profile', [DashboardController::class,'index'])->name('free.lancer.profile');


    Route::get('/roles-list', [RolePermissionController::class,'roles'])->name('roles-list');
    Route::get('/roles/create', [RolePermissionController::class,'create'])->name('roles-create');
    Route::post('/roles/store', [RolePermissionController::class,'store'])->name('roles-store');
    Route::get('/roles/edit/{id}', [RolePermissionController::class,'edit'])->name('roles-edit');
    Route::post('/roles/update/{id}', [RolePermissionController::class,'update'])->name('roles-update');
    Route::get('/ajax/roles/view/{id}', [RolePermissionController::class,'show'])->name('roles-view');
    Route::post('/change-flag/{table}/{id}', [UserController::class,'changeFlag'])->name('changeflag');


    //User Master
    Route::group([], function() {
        Route::get('/users', [UserController::class,'index'])->name('user-list')->middleware(['can:List Users']);
        Route::get('/ajax/users/list', [UserController::class,'indexAajax'])->name('ajax-user-list')->middleware(['can:List Users']);
        Route::get('/users/create', [UserController::class,'create'])->name('user-create')->middleware(['can:Add Users']);
        Route::post('/users/store', [UserController::class,'store'])->name('user-save')->middleware(['can:Add Users']);
        Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('user-edit')->middleware(['can:Edit Users']);
        Route::post('/users/update/users/{id}', [UserController::class,'update'])->name('user-update')->middleware(['can:Edit Users']);
        Route::get('/users/view/{id}', [UserController::class,'show'])->name('user-view')->middleware(['can:Edit Users']);
    });

    Route::group([], function() {
        Route::get('/masters', [MastersController::class,'index'])->name('masters-list')->middleware(['can:Module_List_master']);
        Route::get('/ajax/masters/list', [MastersController::class,'indexAajax'])->name('ajax-masters-list');
        Route::get('/masters/create', [MastersController::class,'create'])->name('masters-create')->middleware(['can:Module_Add_master']);
        Route::post('/masters/store', [MastersController::class,'store'])->name('masters-save');
        Route::get('/masters/edit/{id}', [MastersController::class,'edit'])->name('masters-edit')->middleware(['can:Module_Edit_master']);
        Route::post('/masters/update/masters/{master}', [MastersController::class,'update'])->name('masters-update');
        Route::get('/masters/view/{id}', [MastersController::class,'show'])->name('masters-view');
    });

    //Task Master
    Route::group([], function() {
        Route::get('/tasks', [TasksController::class,'index'])->name('tasks-list')->middleware(['can:List Tasks']);
        Route::get('/ajax/tasks/list', [TasksController::class,'indexAajax'])->name('ajax-tasks-list')->middleware(['can:List Tasks']);
        Route::get('/tasks/create', [TasksController::class,'create'])->name('tasks-create')->middleware(['can:Add Tasks']);
        Route::post('/tasks/store', [TasksController::class,'store'])->name('tasks-save')->middleware(['can:Add Tasks']);
        Route::get('/tasks/edit/{id}', [TasksController::class,'edit'])->name('tasks-edit')->middleware(['can:Edit Tasks']);
        Route::post('/tasks/update/{id}', [TasksController::class,'update'])->name('tasks-update')->middleware(['can:Edit Tasks']);
        Route::get('/tasks/view/{id}', [TasksController::class,'show'])->name('tasks-view')->middleware(['can:Edit Tasks']);
        Route::delete('/tasks/delete/{id}', [TasksController::class,'destroy'])->name('tasks-delete')->middleware(['can:Delete Tasks']);
        Route::get('/tasks/update/status/{id}/{status}', [TasksController::class,'statusUpdate'])->name('status-update')->middleware(['can:Edit Tasks']);
        Route::post('/tasks/assign/status/{id}', [TasksController::class,'statusAssigned'])->name('status-assign')->middleware(['can:Edit Tasks']);

        Route::get('/tasks/start-work/{task}', [TasksController::class,'startWork'])->name('tasks-start-work')->middleware(['can:Edit Tasks']);
        Route::post('/tasks/update/start-work/{id}', [TasksController::class,'updateStartWork'])->name('update-start-work')->middleware(['can:Edit Tasks']);
        
        Route::post('/tasks/publish/{task}', [TasksController::class,'publish'])->name('task-publish')->middleware(['can:Edit Tasks']);
        Route::post('/tasks/re-assigned/{task}', [TasksController::class,'reAssigned'])->name('task-re-assigned')->middleware(['can:Edit Tasks']);

        Route::get('/tasks/getSubjects', [TasksController::class, 'getSubjects'])->name('tasks.get.subjects');

        Route::get('/tasks/roles', [TasksController::class,'rolesTasks'])->name('get.roles.tasks');
        
        Route::get('/tasks/ajax/freelancers', [TasksController::class,'getFreelancers'])->name('get-freelancers')->middleware(['can:Edit Tasks']);

        // Route::get('/tasks/sample/download', [TasksController::class,'sample'])->name('tasks-sample');


        Route::get('/tasks/sample/download', function () {
            $sampleData = "Question,\nSample Question 1,\nSample Question 2";
            
            return Response::make($sampleData, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename=questions-sample.csv',
            ]);
        })->name('questions-tasks-sample');


        Route::get('/tasks/answers/sample/download', function () {
            $sampleData = "Answers,\nSample Answers 1,\nSample Answers 2";
            
            return Response::make($sampleData, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename=answers-sample.csv',
            ]);
        })->name('answers-tasks-sample');


        Route::get('/tasks/questions-answers-sample/download', function () {
            $sampleData = "Question,Answer,\nSample Question 1,Sample Answers 1";
            
            return Response::make($sampleData, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename=questions-sample.csv',
            ]);
        })->name('questions-answers-sample-download');


    });

    Route::prefix('email-templates')->group(function() {

        Route::get('/', [EmailTemplatesController::class,'index'])->name('emailtemplates');
        Route::get('/ajax/list', [EmailTemplatesController::class,'ajaxList'])->name('emailtemplates.ajax.list');
        Route::get('/view/{id}', [EmailTemplatesController::class,'show'])->name('emailtemplates.show');
        Route::get('/add', [EmailTemplatesController::class,'create'])->name('emailtemplates.add');
        Route::post('/store', [EmailTemplatesController::class,'store'])->name('emailtemplates.store');
        Route::post('/update/{id}', [EmailTemplatesController::class,'update'])->name('emailtemplates.update');
        Route::get('/edit/{id}', [EmailTemplatesController::class,'edit'])->name('emailtemplates.edit');

    });
    

    Route::group([], function() {

        Route::get('/admin/banner-list', [BannerController::class,'index'])->name('banner-list');//->middleware(['can:Banner List']);
        Route::get('/admin/banner/create', [BannerController::class,'create'])->name('banner-create');//->middleware(['can:Banner Create']);
        Route::post('/admin/banner/store', [BannerController::class,'store'])->name('banner-store');//->middleware(['can:Banner Create']);
        Route::get('/admin/banner/edit/{id}', [BannerController::class,'edit'])->name('banner-edit');//->middleware(['can:Banner Edit']);
        Route::post('/admin/banner/update/{id}', [BannerController::class,'update'])->name('banner-update');//->middleware(['can:Banner Edit']);
        Route::get('/admin/banner/delete/{id}', [BannerController::class,'destroy'])->name('banner-delete');//->middleware(['can:Banner Delete']);
        Route::post('/admin/banner/export-search-results', [BannerController::class,'export'])->name('export-search-results');
        Route::get('/admin/banner/view/{id}', [BannerController::class,'show'])->name('banner-view');//->middleware(['can:Banner Edit']);

    });


    // Category Master
    Route::group([], function() {

        Route::get('/admin/service', [CategoryController::class,'index'])->name('category-list')->middleware(['can:List Service']);
        Route::get('/admin/service/create', [CategoryController::class,'create'])->name('category-create')->middleware(['can:Add Service']);
        Route::post('/admin/service/store', [CategoryController::class,'store'])->name('category-store')->middleware(['can:Add Service']);
        Route::get('/admin/service/edit/{id}', [CategoryController::class,'create'])->name('category-edit')->middleware(['can:Edit Service']);
        Route::post('/admin/service/update/{id}', [CategoryController::class,'update'])->name('category-update')->middleware(['can:Edit Service']);
        Route::get('/admin/ajax/service/view/{id}', [CategoryController::class,'show'])->name('category-view')->middleware(['can:Edit Service']);

    });

    //assignment Category Master
    Route::group([], function() {

        Route::get('/admin/assignment-category', [AssignmentCategoryController::class,'index'])->name('assignment-category-list');//->middleware(['can:Category List']);
        Route::get('/admin/assignment-category/create', [AssignmentCategoryController::class,'create'])->name('assignment-category-create');//->middleware(['can:Category Create']);
        Route::post('/admin/assignment-category/store', [AssignmentCategoryController::class,'store'])->name('assignment-category-store');//->middleware(['can:Category Create']);
        Route::get('/admin/assignment-category/edit/{id}', [AssignmentCategoryController::class,'edit'])->name('assignment-category-edit');//->middleware(['can:Category Edit']);
        Route::post('/admin/assignment-category/update/{id}', [AssignmentCategoryController::class,'update'])->name('assignment-category-update');//->middleware(['can:Category Edit']);
        Route::get('/admin/ajax/assignment-category/view/{id}', [AssignmentCategoryController::class,'show'])->name('assignment-category-view');//->middleware(['can:Category View']);

    });
    
    
    
    //Subject Category Master
    Route::group([], function() {

        Route::get('/admin/subject-category', [SubjectCategoryController::class,'index'])->name('subject-category-list')->middleware(['can:List Category']);
        Route::get('/admin/subject-category/create', [SubjectCategoryController::class,'create'])->name('subject-category-create')->middleware(['can:Add Category']);
        Route::post('/admin/subject-category/store', [SubjectCategoryController::class,'store'])->name('subject-category-store')->middleware(['can:Add Category']);
        Route::get('/admin/subject-category/edit/{id}', [SubjectCategoryController::class,'edit'])->name('subject-category-edit')->middleware(['can:Edit Category']);
        Route::post('/admin/subject-category/update/{id}', [SubjectCategoryController::class,'update'])->name('subject-category-update')->middleware(['can:Edit Category']);
        Route::post('/admin/subject-category/delete/{id}', [SubjectCategoryController::class,'destroy'])->name('subject-category-destroy')->middleware(['can:Delete Category']);
        Route::get('/admin/ajax/subject-category/view/{id}', [SubjectCategoryController::class,'show'])->name('subject-category-view')->middleware(['can:Edit Category']);

    });


    //Subject Master
    Route::group([], function() {

        Route::get('/admin/subjects', [SubjectController::class,'index'])->name('subject-list')->middleware(['can:List Subjects']);
        Route::get('/admin/subjects/create', [SubjectController::class,'create'])->name('subject-create')->middleware(['can:Add Subjects']);
        Route::post('/admin/subjects/store', [SubjectController::class,'store'])->name('subject-store')->middleware(['can:Add Subjects']);
        Route::get('/admin/subjects/edit/{id}', [SubjectController::class,'edit'])->name('subject-edit')->middleware(['can:Edit Subjects']);
        Route::post('/admin/subjects/update/{id}', [SubjectController::class,'update'])->name('subject-update')->middleware(['can:Edit Subjects']);
        Route::post('/admin/subjects/delete/{id}', [SubjectController::class,'destroy'])->name('subject-destroy')->middleware(['can:Delete Subjects']);
        Route::get('/admin/ajax/subjects/view/{id}', [SubjectController::class,'show'])->name('subject-view')->middleware(['can:View']);

    });
    

    //Colleges Master
    Route::group([], function() {

        Route::get('/admin/colleges', [CollegesController::class,'index'])->name('colleges-list')->middleware(['can:Module_List_library']);
        Route::get('/admin/colleges/create', [CollegesController::class,'create'])->name('colleges-create')->middleware(['can:Module_Add_library']);
        Route::post('/admin/colleges/store', [CollegesController::class,'store'])->name('colleges-store')->middleware(['can:Module_Add_library']);
        Route::get('/admin/colleges/edit/{id}', [CollegesController::class,'edit'])->name('colleges-edit')->middleware(['can:Module_Edit_library']);
        Route::post('/admin/colleges/update/{id}', [CollegesController::class,'update'])->name('colleges-update')->middleware(['can:Module_List_library']);
        Route::post('/admin/colleges/delete/{id}', [CollegesController::class,'destroy'])->name('colleges-destroy')->middleware(['can:Module_Delete_library']);
        Route::get('/admin/ajax/colleges/view/{id}', [CollegesController::class,'show'])->name('colleges-view')->middleware(['can:Module_List_library']);

    });


        //Course Code Master
    Route::group([], function() {

        Route::get('/admin/course-code', [CourseCodeController::class,'index'])->name('course-code-list')->middleware(['can:Module_List_course-code']);
        Route::get('/admin/course-code/create', [CourseCodeController::class,'create'])->name('course-code-create')->middleware(['can:Module_Add_course-code']);
        Route::post('/admin/course-code/store', [CourseCodeController::class,'store'])->name('course-code-store')->middleware(['can:Module_Add_course-code']);
        Route::get('/admin/course-code/edit/{id}', [CourseCodeController::class,'edit'])->name('course-code-edit')->middleware(['can:Module_Edit_course-code']);
        Route::post('/admin/course-code/update/{id}', [CourseCodeController::class,'update'])->name('course-code-update')->middleware(['can:Module_Edit_course-code']);
        Route::post('/admin/course-code/delete/{id}', [CourseCodeController::class,'destroy'])->name('course-code-destroy')->middleware(['can:Module_Delete_course-code']);
        Route::get('/admin/ajax/course-code/view/{id}', [CourseCodeController::class,'show'])->name('course-code-view')->middleware(['can:Module_Edit_course-code']);

    });
   
    //Questions Modules
    Route::group([], function() {

        Route::get('/admin/questions', [QuestionsController::class,'index'])->name('questions-list')->middleware(['can:Module List Questions']);
        Route::get('/admin/questions/create', [QuestionsController::class,'create'])->name('questions-create')->middleware(['can:Module Add Questions']);
        Route::post('/admin/questions/store', [QuestionsController::class,'store'])->name('questions-store')->middleware(['can:Module Add Questions']);
        Route::get('/admin/questions/edit/{id}', [QuestionsController::class,'edit'])->name('questions-edit')->middleware(['can:Module Edit Questions']);
        Route::post('/admin/questions/update/{id}', [QuestionsController::class,'update'])->name('questions-update')->middleware(['can:Module Edit Questions']);
        Route::post('/admin/questions/delete/{id}', [QuestionsController::class,'destroy'])->name('questions-destroy')->middleware(['can:Module Delete Questions']);
        Route::get('/admin/ajax/questions/view/{id}', [QuestionsController::class,'show'])->name('questions-view')->middleware(['can:Module Edit Questions']);
        Route::get('/admin/ajax/subcategory', [QuestionsController::class,'getSubcategory'])->name('get.subcategory');

    });



    //Questions Modules
    // Route::group([], function() {
    //     Route::get('/admin/{slug}/create', [OnlineClassesController::class,'create'])->name('online-classes-create');//->middleware(['can:Category Create']);
    //     Route::post('/admin/online-class/store', [OnlineClassesController::class,'store'])->name('online-classes-store');//->middleware(['can:Category Create']);
    //     Route::get('/admin/online-class/edit/{slug}/{id}', [OnlineClassesController::class,'edit'])->name('online-classes-edit');//->middleware(['can:Category Edit']);
    //     Route::post('/admin/online-class/update', [OnlineClassesController::class,'update'])->name('online-classes-update');//->middleware(['can:Category Edit']);
    // });    

     /*Modules Data routes Start*/
    
    
     Route::get('/module/add', [ModulesController::class,'add'])->name('admin.modules.add');
    
     Route::post('/module/store', [ModulesDataController::class,'store'])->name('admin.modules.store');
    
     Route::post('/module/{module}/update', [ModulesDataController::class,'update'])->name('admin.modules.update');
    
     Route::get('/module/{module}/edit/{id}', [ModulesDataController::class,'edit'])->name('admin.modules.edit');
    
     Route::get('/module/{module}/delete/{id}', [ModulesDataController::class,'destroy'])->name('admin.modules.delete');
    
     Route::get('/admin/data-status/{module}/{status}', [ModulesDataController::class,'update_status']);
     
    
     Route::get('/module/{module}', [ModulesDataController::class,'index'])->name('admin.modules.data')->middleware('moduleListAuthorization');
    
     Route::get('/module/{module}/add', [ModulesDataController::class,'add'])->name('admin.modules.data.add')->middleware('moduleAddAuthorization');
    
     Route::post('/module/{module}/store', [ModulesDataController::class,'store'])->name('admin.modules.data.store');
    
     Route::post('/module/{module}/update', [ModulesDataController::class,'update'])->name('admin.modules.data.update');
    
     Route::get('/module/{module}/edit/{id}', [ModulesDataController::class,'edit'])->name('admin.modules.data.edit')->middleware('moduleEditAuthorization');
     
     Route::get('/module/{module}/delete/{id}', [ModulesDataController::class,'destroy'])->name('admin.modules.data.delete')->middleware('moduleDeleteAuthorization');
    
    
     /*Modules Data routes End*/
    
     /*Widget Page routes Start*/
    
     Route::get('/admin/widget-pages', [WidgetPagesController::class,'index'])->name('admin.widget_pages');
    
     Route::get('/admin/add-widget-page', [WidgetPagesController::class,'add'])->name('admin.widget_pages.add');
    
     Route::post('/admin/store-widget-page', [WidgetPagesController::class,'store'])->name('admin.widget_pages.store');
    
     Route::post('/admin/update-widget-page', [WidgetPagesController::class,'update'])->name('admin.widget_pages.update');
    
     Route::get('/admin/edit-widget-page/{widget_page}', [WidgetPagesController::class,'edit'])->name('admin.widget_pages.edit');
    
     Route::get('/admin/delete-widget-page/{widget_page}', [WidgetPagesController::class,'destroy'])->name('admin.widget_pages.delete');
    
     /*Widget Page routes End*/
    
     /*Widget routes Start*/
    
     Route::get('/admin/widgets', [WidgetsController::class,'index'])->name('admin.widgets');
    
     Route::get('/admin/add-widget', [WidgetsController::class,'add'])->name('admin.widgets.add');
    
     Route::post('/admin/store-widget', [WidgetsController::class,'store'])->name('admin.widgets.store');
    
     Route::post('/admin/update-widget', [WidgetsController::class,'update'])->name('admin.widgets.update');
    
     Route::get('/admin/edit-widget/{widget}', [WidgetsController::class,'edit'])->name('admin.widgets.edit');
    
     Route::get('/admin/delete-widget/{widget}', [WidgetsController::class,'destroy'])->name('admin.widgets.delete');
    
     /*Widget routes End*/
    
     /*Widget data routes Start*/
    
     Route::get('/page/{page}', [WidgetDataController::class,'index'])->name('admin.widgets_data');
    
    
     Route::post('/store-widget-data/{id}', [WidgetDataController::class,'store'])->name('admin.widget_data.store');
    
     Route::post('/update-widget-page', [WidgetDataController::class,'update'])->name('admin.widget_pages.update');
     
     
    
    
     Route::get('/delete-widget-page/{widget_page}', [WidgetPagesController::class,'destroy'])->name('admin.widget_pages.delete');
    

    
     Route::get('admin/about-us/edit', [AboutUsController::class, 'editAboutView'])->name('about-us.edit');
     Route::put('admin/about-us/update', [AboutUsController::class, 'updateAbout'])->name('about-us.update');
    

     Route::get('admin/get-a-quote/edit', [GetAQuoteController::class, 'editGetAQuoteView'])->name('admin.get-a-quote.edit');
     Route::put('admin/get-a-quote/update', [GetAQuoteController::class, 'updateGetAQuote'])->name('admin.get-a-quote.update');
    
});
