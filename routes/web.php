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

Route::group(['middleware' => 'web'], function () {

 //

//Route::get('/', function () {  return view('gen.student-index'); })->name('general');
//current home page
Route::get('/', function () {  return view('gen.index1'); })->name('general');



Route::get('/sample2', function () {  return view('quest.ask-question-12'); });

Route::get('/suspensions', array('as'=>'sus',
	'uses' => 'HomeController@PostSuspension'));

Route::get('/ask', array('as'=>'ask',
	'uses' => 'HomeController@askSample'))->middleware('user');

Route::group(['middleware' => ['auth']], function() {
    // your routes

//Route::get('sample-two/', function(){ 	return view('tut.sample'); });

Route::get('question-stat',array('as'=>'question-stat','uses'=>'QuestionController@questionStat'));

Route::get('/university', array('as'=>'university',
	'uses' => 'AutoComplete@Universities'));

Route::get('/categories', array('as'=>'categories',
	'uses' => 'AutoComplete@OrderSubject'));

Route::get('/academic-level', array( 'as'=>'academic-level', 'uses' => 'AutoComplete@AcademicLevel'));

//Auth::routes();



//profile pics

//Route::get('/profile-pic-view/{view}',array('as'=>'profile-pic-view','uses'=>'UserController@ProfilePicView'));
Route::post('/profile-pic/',array('as'=>'profile-pic','uses'=>'UserController@ProfilePic'));

//Route::get('sample',array('as'=>'sample','uses'=>'DateTimeController@getDeadlineInSeconds12'));

//post payments

Route::post('/make-payment', ['uses'=>'AskQuestionController@postPayment', 'as'=>'post.payment']);

Route::get('comment-files/{question_id}/{filename}/{commentId}',array('as'=>'comment-files','uses'=>'QuestionController@CommentFilesDownload'));

Route::get('all-questions/{status?}',
	array(
		'as'=>'all-questions',
		'uses'=>'AdminController@TutProfile'
	));

// get tutor payment route, all payments

Route::get('get-payment/{myurl?}/{tutorid?}',array('as'=>'get-payment','uses'=>'PaymentController@getPayments'));


Route::post('post-payment',array(
	'as'=>'paytutor',
	'uses'=>'PaymentController@postPayments'));

Route::get('post-questions',array('as'=>'post-questions','uses'=>'QuestionController@postQuestions'));

//sample post questions
Route::post('post-question',array('as'=>'post-question','uses'=>'AskQuestionController@postQuestion'));

Route::post('/post-answer/{question_id}', ['as' =>'post.answer', 'uses' => 'QuestionController@PostAnswer']);


Route::get('questions-answered',array('as'=>'questions-answered','uses'=>'AdminController@QuestionsAnswered'));
Route::get('file-download/{question_id}/{filename}/{type}',array('as'=>'file-download','uses'=>'QuestionController@downloads'));
/*
 * Post deadline and price using these two
 */

Route::get('post-deadlinePric',array('as'=>'deadlinePrice','uses'=>'HomeController@getQuestionPrice'));


Route::post('PostQuestionPriceDeadline',array('as'=>'PostQuestionPrice',
	'uses'=>'AskQuestionController@postQuestionDetails'));


//admin commwnts

Route::post('/post-admin-comments/{question_id}', ['as'=> 'post-comments1', 'uses' => 'QuestionController@PostAdminComments']);


Route::post('/post-comments/{question_id}', ['as'=> 'post-comments', 'uses' => 'QuestionController@PostComments']);

Route::post('/update-question/{question_id}', array('as' => 'update-question', 'uses'=>'UpdateQuestionController@UpdateQuestionStatus'));


Route::post('/autocomplete', array('as' => 'autocomplete', 'uses'=>'SearchController@autocomplete'));

Route::post('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));

Route::post('autocomplete-search',array('as'=>'autocomplete.search','uses'=>'SearchController@index'));

Route::post('autocomplete-ajax',array('as'=>'searchajax','uses'=>'SearchController@autoComplete'));



Route::get('post-payment-request/{amount}',array('as'=>'post-payment-request','uses'=>'QuestionController@PostPaymentRequest'));


Route::post('tut-payment12',array('as'=>'tut-payment','uses'=>'QuestionController@PayRequests'));
//get tutor  

Route::get('tut-profile',
	array('as'=>'tut-profile','uses'=>'HomeController@getTutProfile'));
//post tutor profile
Route::post('tut-profile',
	array('as'=>'post.tut-profile','uses'=>'TutorProfileController@postTutProfile'));

//get tutor proggress
Route::get('tut-progress',
	array('as'=>'tut-progress','uses'=>'TutorProfileController@getTutProgress'));
//post tutor progress
Route::post('tut-progress',
	array('as'=>'tut-progress','uses'=>'TutorProfileController@postTutProgress'));
//get tutor profile
Route::get('tut-account',
	array('as'=>'tut-account','uses'=>'TutorProfileController@getTutAccount'));

//post tutor profile
Route::post('tut-account',
	array('as'=>'tut-account','uses'=>'TutorProfileController@postTutAccount'));

//post tutor profile

Route::post('tut-education',
	array('as'=>'tut-education','uses'=>'TutorProfileController@postTutEducation'));

//get all tutors
Route::get('adm-tutors', array('as'=>'adm-tutors','uses'=>'AdminController@admTutors'));

//return all adm questions
Route::get('adm-questions', array('as'=>'adm-questions','uses'=>'AdminController@AdmQuestions'));

//return search results

Route::post('adm-search', array('as'=>'adm-search','uses'=>'AdminController@AdmSearchResults'));


//get customer payments
Route::get('make-cust-payments', array('as'=>'get-cust-payments','uses'=>'CustomerPayments@getCustPayment'));

//get customer payments
Route::get('payment-successful', array('as'=>'payment-successful','uses'=>'CustomerPayments@paymentSuccessful'));

//post customer

Route::post('payment', array(
		'as'=>'post-cust-payments',
		'uses'=>'CustomerPayments@postCustPayment'
	));

//return search results

Route::get('cust-dashboard', array(

	'uses'=>'UserController@viewCustomerDashboard',
	'as' => 'cust-dashboard'
));

Route::get('/status/{question_id}', 'QuestionStatus@clientOrderStatus')->name('stats');

//get payment meta
Route::get('/get-payment-meta', 'AskQuestionController@getMetadata')->name('get.meta');

//post payment metadata
Route::any('/payment_meta', 'AskQuestionController@PostMetadata')->name('post.meta');


Route::get('/tutor-auto',
	[ 'as'=>'tutor-auto', 'uses'=>'AutoComplete@Tutor']);

Route::get('/question_det/{question_id}',

	[ 'as'=>'question_det', 'uses'=>'QuestionController@NewQuestionDetails']);

//questio bids

Route::get('/bids/{question_id}/',

	[ 'as'=>'get-bids', 'uses'=>'QuestionController@GetTBids']);

Route::post('/bids/{question_id}/{tutor_id}',

	[ 'as'=>'post-bids', 'uses'=>'QuestionBidsController@PostBids']);

Route::post('/assign/{question_id}/{tutor_id?}',

	[ 'as'=>'assign-question', 'uses'=>'QuestionBidsController@AssignQuestion']);

Route::get('home/{params?}', [ 'as'=>'home', 'uses'=>'HomeController@index']);

//paypal routes

Route::get('payment-with-paypal/{price}',
	['uses' => 'PaypalPayments@PayWithPaypal', 'as' =>'get.paypal']);

Route::get('/view-make-payment',['as'=>'view-make-payment', 'uses' =>'AskQuestionController@GetMakePayments'] );

Route::get('paypal/callback/',
	['uses' => 'PaypalPayments@PayWithPaypalCallback', 'as' =>'paypal-callback']);

Route::get('payment/success', function () {
    return view('paypal.payment-success');
})->name('success');

Route::get('/payment/error', function () {

    return view('paypal.error');

})->name('paypal-error');


Route::post('messages/{questionid}',	['uses' => 'MessageController@PostMessages', 'as' =>'messages']);


});

Route::post('/register', 'Auth\UserRegisterController@create')->name('register');

Route::post('/login', 'Auth\UserLoginController@login')->name('login');


Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//paypal Here

Route::get('paypal/{price}/{qid}', 'PaymentControllerOne@payWithpaypal');

// route for check status of the payment
Route::get('status', 'PaymentControllerOne@getPaymentStatus');

Route::get('/payment/success/{qid}', 'PaymentControllerOne@getPaymentSuccess');

Route::get('/payment/failed/{qid}', 'PaymentControllerOne@getPaymentFailed');

Route::get('/admin/questions', array('as'=>'adm.questions',
	'uses' => 'AdminTutorController@AdminQuestionsView'));
//Route::get('/sample', function () {  return view('layouts.index-template'); });

//admin routes starts here
Route::get('adm-tut-payments',array('as'=>'adm-tut-payments','uses'=>'HomeController@viewTutorPayment'));

Route::get('adm-dashboard',array('as'=>'adm-dashboard','uses'=>'AdminController@AdmDashboard'));


});
