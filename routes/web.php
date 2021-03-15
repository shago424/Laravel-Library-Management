<?php

use Illuminate\Support\Facades\Route;
 

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/add',[App\Http\Controllers\student\StudentController::class,'add'])->name('students.add');
	Route::post('/student/store',[App\Http\Controllers\student\StudentController::class,'store'])->name('students.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){ 
	Route::get('dashboard',[App\Http\Controllers\admin\AdminController::class,'index'])->name('admin.dashboard');

});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
	Route::get('dashboard',[App\Http\Controllers\user\UserController::class,'index'])->name('user.dashboard');

});

//========Item Catagory============
Route::group(['middleware'=>'auth'],function(){
	

//========Users============

Route::prefix('users')->group(function(){
	Route::get('/view',[App\Http\Controllers\backend\UserController::class,'view'])->name('users.view');
	Route::get('/add',[App\Http\Controllers\backend\UserController::class,'add'])->name('users.add');
	Route::post('/store',[App\Http\Controllers\backend\UserController::class,'store'])->name('users.store');
	Route::get('/edit/{id}',[App\Http\Controllers\backend\UserController::class,'edit'])->name('users.edit');
	Route::post('/update/{id}',[App\Http\Controllers\backend\UserController::class,'update'])->name('users.update');
	Route::get('/delete/{id}',[App\Http\Controllers\backend\UserController::class,'delete'])->name('users.delete');
	Route::get('/user/allbook/view',[App\Http\Controllers\backend\UserController::class,'userwisebook'])->name('users.allbook-view');

});

Route::prefix('profiles')->group(function(){
	Route::get('/view',[App\Http\Controllers\backend\ProfileController::class,'view'])->name('profiles.view');
	Route::get('/edit',[App\Http\Controllers\backend\ProfileController::class,'edit'])->name('profiles.edit');
	Route::post('/store',[App\Http\Controllers\backend\ProfileController::class,'update'])->name('profiles.update');
	Route::get('/password/view',[App\Http\Controllers\backend\ProfileController::class,'passwordview'])->name('profiles.password.view');
	Route::post('/password/update',[App\Http\Controllers\backend\ProfileController::class,'passwordupdate'])->name('profiles.password.update');
});


	//========Student============

	Route::prefix('students')->group(function(){
	Route::get('/student/view',[App\Http\Controllers\student\StudentController::class,'view'])->name('students.view');
	Route::get('/student/show',[App\Http\Controllers\student\StudentController::class,'show'])->name('students.show');
	Route::get('/student/pdf',[App\Http\Controllers\student\StudentController::class,'viewpdf'])->name('students.view-pdf');
	Route::get('/student/inactive{id}',[App\Http\Controllers\student\StudentController::class,'inactive'])->name('students.inactive-student');
Route::get('/student/active{id}',[App\Http\Controllers\student\StudentController::class,'active'])->name('students.active-student');
Route::get('/student/allbook/view',[App\Http\Controllers\student\StudentController::class,'studetnwisebook'])->name('students.allbook-view');
Route::get('/student/issueallbook/view',[App\Http\Controllers\student\StudentController::class,'bookissueview'])->name('students.allbook-issue-view');
Route::get('/student/issueallbook/add',[App\Http\Controllers\student\StudentController::class,'bookissueadd'])->name('students.allbook-issue-add');
Route::post('/student/issueallbook/store',[App\Http\Controllers\student\StudentController::class,'bookissuestore'])->name('students.allbook-issue-store');
Route::get('/student/issueallbook/edit{id}',[App\Http\Controllers\student\StudentController::class,'bookissueedit'])->name('students.allbook-issue-edit');
Route::post('/student/issueallbook/update{id}',[App\Http\Controllers\student\StudentController::class,'bookissueupdate'])->name('students.allbook-issue-update');

});		// Student Profile Part

Route::prefix('stprofiles')->group(function(){
	Route::get('/student/profile/view',[App\Http\Controllers\student\StudentController::class,'profileview'])->name('stprofiles.profile-view');
	Route::get('/student/profile/edit',[App\Http\Controllers\student\StudentController::class,'profileedit'])->name('stprofiles.profile-edit');
	Route::post('/student/profile/update',[App\Http\Controllers\student\StudentController::class,'profileupdate'])->name('stprofiles.profile-update');
	Route::get('/student/password/change',[App\Http\Controllers\student\StudentController::class,'passwordchange'])->name('stprofiles.password-change');
	Route::post('/student/password/update',[App\Http\Controllers\student\StudentController::class,'passwordupdate'])->name('stprofiles.password-update');

});

Route::prefix('showbooks')->group(function(){
	Route::get('/show/books/view',[App\Http\Controllers\student\StudentController::class,'showbook'])->name('showbooks.show-book-view');
	
});


	// All Search With Student Controller

  Route::prefix('searches')->group(function(){
      Route::get('/all/search/view',[App\Http\Controllers\student\StudentController::class,'studetnwisesearch'])->name('searches.search-view');
      Route::get('/date/search/view',[App\Http\Controllers\student\StudentController::class,'datewisesearch'])->name('searches.date-search-view');
      Route::get('/date/search/details',[App\Http\Controllers\student\StudentController::class,'datewisedetails'])->name('searches.date-search-details');

      
});

 Route::prefix('setups')->group(function(){

// ===============Class================

	Route::get('/student/class/view',[App\Http\Controllers\backend\ClassController::class,'view'])->name('setups.class-view');
	Route::get('/student/class/add',[App\Http\Controllers\backend\ClassController::class,'add'])->name('setups.class-add');
	Route::post('/student/class/store',[App\Http\Controllers\backend\ClassController::class,'store'])->name('setups.class-store');
	Route::get('/student/class/edit/{id}',[App\Http\Controllers\backend\ClassController::class,'edit'])->name('setups.class-edit');
Route::post('/student/class/update/{id}',[App\Http\Controllers\backend\ClassController::class,'update'])->name('setups.class-update');
Route::get('/student/class/delete/{id}',[App\Http\Controllers\backend\ClassController::class,'delete'])->name('setups.class-delete');

// =========Group===============
Route::get('/student/group/view',[App\Http\Controllers\backend\GroupController::class,'view'])->name('setups.group-view');
	Route::get('/student/group/add',[App\Http\Controllers\backend\GroupController::class,'add'])->name('setups.group-add');
	Route::post('/student/group/store',[App\Http\Controllers\backend\GroupController::class,'store'])->name('setups.group-store');
	Route::get('/student/group/edit/{id}',[App\Http\Controllers\backend\GroupController::class,'edit'])->name('setups.group-edit');
Route::post('/student/group/update/{id}',[App\Http\Controllers\backend\GroupController::class,'update'])->name('setups.group-update');
Route::get('/student/group/delete/{id}',[App\Http\Controllers\backend\GroupController::class,'delete'])->name('setups.group-delete');

// =========Section===============
Route::get('/student/section/view',[App\Http\Controllers\backend\SectionController::class,'view'])->name('setups.section-view');
	Route::get('/student/section/add',[App\Http\Controllers\backend\SectionController::class,'add'])->name('setups.section-add');
	Route::post('/student/section/store',[App\Http\Controllers\backend\SectionController::class,'store'])->name('setups.section-store');
	Route::get('/student/section/edit/{id}',[App\Http\Controllers\backend\SectionController::class,'edit'])->name('setups.section-edit');
Route::post('/student/section/update/{id}',[App\Http\Controllers\backend\SectionController::class,'update'])->name('setups.section-update');
Route::get('/student/section/delete/{id}',[App\Http\Controllers\backend\SectionController::class,'delete'])->name('setups.section-delete');

// =========Group===============

Route::get('/student/session/view',[App\Http\Controllers\backend\SessionController::class,'view'])->name('setups.session-view');
	Route::get('/student/session/add',[App\Http\Controllers\backend\SessionController::class,'add'])->name('setups.session-add');
	Route::post('/student/session/store',[App\Http\Controllers\backend\SessionController::class,'store'])->name('setups.session-store');
	Route::get('/student/session/edit/{id}',[App\Http\Controllers\backend\SessionController::class,'edit'])->name('setups.session-edit');
Route::post('/student/session/update/{id}',[App\Http\Controllers\backend\SessionController::class,'update'])->name('setups.session-update');
Route::get('/student/session/delete/{id}',[App\Http\Controllers\backend\SessionController::class,'delete'])->name('setups.session-delete');


});

 // =========Book===============
  Route::prefix('books')->group(function(){

Route::get('/category/book/view',[App\Http\Controllers\book\CategoryController::class,'view'])->name('books.category-view');
	Route::get('/category/book/add',[App\Http\Controllers\book\CategoryController::class,'add'])->name('books.category-add');
	Route::post('/category/book/store',[App\Http\Controllers\book\CategoryController::class,'store'])->name('books.category-store');
	Route::get('/category/book/edit/{id}',[App\Http\Controllers\book\CategoryController::class,'edit'])->name('books.category-edit');
Route::post('/category/book/update/{id}',[App\Http\Controllers\book\CategoryController::class,'update'])->name('books.category-update');
Route::get('/category/book/delete/{id}',[App\Http\Controllers\book\CategoryController::class,'delete'])->name('books.category-delete');



Route::get('/book/view',[App\Http\Controllers\book\BookController::class,'view'])->name('books.book-view');
Route::get('/book/view-pdf',[App\Http\Controllers\book\BookController::class,'viewpdf'])->name('books.book-view-pdf');
	Route::get('/book/add',[App\Http\Controllers\book\BookController::class,'add'])->name('books.book-add');
	Route::post('/book/store',[App\Http\Controllers\book\BookController::class,'store'])->name('books.book-store');
	Route::get('/book/edit/{id}',[App\Http\Controllers\book\BookController::class,'edit'])->name('books.book-edit');
Route::post('/book/update/{id}',[App\Http\Controllers\book\BookController::class,'update'])->name('books.book-update');
Route::get('/book/delete/{id}',[App\Http\Controllers\book\BookController::class,'delete'])->name('books.book-delete');
Route::get('/book/inactive{id}',[App\Http\Controllers\book\BookController::class,'inactive'])->name('books.inactive-book');
Route::get('/book/active{id}',[App\Http\Controllers\book\BookController::class,'active'])->name('books.active-book');

Route::get('/book/search',[App\Http\Controllers\book\BookController::class,'search'])->name('books.search-book');


});

   Route::prefix('issuebooks')->group(function(){
Route::get('/issue-book/view',[App\Http\Controllers\book\IssueBookController::class,'view'])->name('issuebooks.issue-view');
Route::get('/pending-list/view',[App\Http\Controllers\book\IssueBookController::class,'pendinglist'])->name('issuebooks.pending-list');
Route::get('/returne-book-list/view',[App\Http\Controllers\book\IssueBookController::class,'returnlist'])->name('issuebooks.returne-book-list');
	Route::get('/issue-book/add',[App\Http\Controllers\book\IssueBookController::class,'add'])->name('issuebooks.issue-add');
	Route::post('/issue-book/store',[App\Http\Controllers\book\IssueBookController::class,'store'])->name('issuebooks.issue-store');
	Route::get('/issue-book/edit/{id}',[App\Http\Controllers\book\IssueBookController::class,'edit'])->name('issuebooks.issue-edit');
Route::post('/issue-book/update/{id}',[App\Http\Controllers\book\IssueBookController::class,'update'])->name('issuebooks.issue-update');
Route::get('/issue-book/delete/{id}',[App\Http\Controllers\book\IssueBookController::class,'delete'])->name('issuebooks.issue-delete');
Route::get('/issuebook/inactive{id}',[App\Http\Controllers\book\IssueBookController::class,'inactive'])->name('issuebooks.inactive');
Route::get('/issuebook/active{id}',[App\Http\Controllers\book\IssueBookController::class,'active'])->name('issuebooks.active');
Route::get('/issuebook/return{id}',[App\Http\Controllers\book\IssueBookController::class,'return'])->name('issuebooks.return');
Route::get('/issuebook/date-over',[App\Http\Controllers\book\IssueBookController::class,'dateover'])->name('issuebooks.date-over');
Route::get('/issuebook/date-over-return',[App\Http\Controllers\book\IssueBookController::class,'dateoverreturn'])->name('issuebooks.date-over-return');



});

      Route::prefix('returnebooks')->group(function(){
Route::get('/returne-issue-book/view',[App\Http\Controllers\book\ReturneBookController::class,'view'])->name('returnebooks.returne-book-view');
	Route::get('/returne-issue-book/add',[App\Http\Controllers\book\ReturneBookController::class,'add'])->name('returnebooks.returne-book-add');
	Route::post('/returne-issue-book/store',[App\Http\Controllers\book\ReturneBookController::class,'store'])->name('returnebooks.returne-book-store');
	Route::get('/returne-issue-book/edit/{id}',[App\Http\Controllers\book\ReturneBookController::class,'edit'])->name('returnebooks.returne-book-edit');
Route::post('/returne-issue-book/update/{id}',[App\Http\Controllers\book\ReturneBookController::class,'update'])->name('returnebooks.returne-book-update');
Route::get('/returne-issue-book/delete/{id}',[App\Http\Controllers\book\ReturneBookController::class,'delete'])->name('returnebooks.returne-book-delete');


});

      // Ajax Rourt Dropdown

 
Route::get('/get-book',[App\Http\Controllers\backend\DefaultController::class,'getbook'])->name('get-book');
Route::get('/get-class-roll',[App\Http\Controllers\backend\DefaultController::class,'getclassroll'])->name('get-classroll');

Route::get('/get-category', 'backend\DefaultController@getcategory')->name('get-category');
Route::get('/get-subsubcategory',[App\Http\Controllers\backend\DefaultController::class,'subsubgetcategory'])->name('get-subsubcategory');
Route::get('/get-session',[App\Http\Controllers\backend\DefaultController::class,'getsession'])->name('get-session');
Route::get('/get-productname',[App\Http\Controllers\backend\DefaultController::class,'getproductname'])->name('get-productname');
Route::get('/get-class',[App\Http\Controllers\backend\DefaultController::class,'getclass'])->name('get-class');

Route::get('/get-group',[App\Http\Controllers\backend\DefaultController::class,'getgroup'])->name('get-group');
Route::get('/get-section', [App\Http\Controllers\backend\DefaultController::class,'getsection'])->name('get-section');
Route::get('/get-publication',[App\Http\Controllers\backend\DefaultController::class,'getpublication'])->name('get-publication');
Route::get('/get-author',[App\Http\Controllers\backend\DefaultController::class,'getauhtor'])->name('get-author');
Route::get('/get-stock',[App\Http\Controllers\backend\DefaultController::class,'getstock'])->name('get-stock');

Route::get('/get-product-name',[App\Http\Controllers\backend\DefaultController::class,'getproduct'])->name('get-product');





});
