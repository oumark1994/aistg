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

//home
Route::get('/','App\Http\Controllers\ClientController@index');
Route::get('/projectbyid/{id}','App\Http\Controllers\ClientController@projectbyid');
Route::get('/detailgallery/{id}','App\Http\Controllers\ClientController@detailgallery');
//admin
Route::get('/dashboard','App\Http\Controllers\AdminController@index');

//slider
Route::get('/slider','App\Http\Controllers\AdminController@slider');
Route::get('/sliders','App\Http\Controllers\SliderController@index');
Route::get('/newslider','App\Http\Controllers\SliderController@newslider');
Route::post('/addslider','App\Http\Controllers\SliderController@addslider');

Route::get('/editslider/{id}','App\Http\Controllers\SliderController@editslider');
Route::post('/updateslider','App\Http\Controllers\SliderController@updateslider');
Route::get('/deleteslider/{id}','App\Http\Controllers\SliderController@deleteslider');
Route::get('/deleteslider/{id}','App\Http\Controllers\SliderController@deleteslider');
//device
Route::get('/devices','App\Http\Controllers\DeviceController@devices');
Route::post('/updatedevice','App\Http\Controllers\DeviceController@updatedevice');
Route::get('/deletedevice/{id}','App\Http\Controllers\DeviceController@deletedevice');
Route::get('/editdevice/{id}','App\Http\Controllers\DeviceController@editdevice');
Route::post('/adddevice','App\Http\Controllers\DeviceController@adddevice');
Route::get('/newdevice','App\Http\Controllers\DeviceController@newdevice');
//categories
Route::get('/categories','App\Http\Controllers\CategorieController@index');
Route::post('/updatecategorie','App\Http\Controllers\CategorieController@updatecategorie');
Route::get('/deletecategorie/{id}','App\Http\Controllers\CategorieController@deletecategorie');
Route::get('/editcategorie/{id}','App\Http\Controllers\CategorieController@editcategorie');
Route::post('/addcategorie','App\Http\Controllers\CategorieController@addcategorie');
Route::get('/newcategorie','App\Http\Controllers\CategorieController@newcategorie');
//categories
Route::get('/events','App\Http\Controllers\EventController@index');
Route::post('/updateevent','App\Http\Controllers\EventController@updateevent');
Route::get('/deleteevent/{id}','App\Http\Controllers\EventController@deleteevent');
Route::get('/editevent/{id}','App\Http\Controllers\EventController@editevent');
Route::post('/addevent','App\Http\Controllers\EventController@addevent');
Route::get('/newevent','App\Http\Controllers\EventController@newevent');
//partners
Route::get('/partners','App\Http\Controllers\PartnerController@index');
Route::post('/updatepartner','App\Http\Controllers\PartnerController@updatepartner');
Route::get('/deletepartner/{id}','App\Http\Controllers\PartnerController@deletepartner');
Route::get('/editpartner/{id}','App\Http\Controllers\PartnerController@editpartner');
Route::post('/addpartner','App\Http\Controllers\PartnerController@addpartner');
Route::get('/newpartner','App\Http\Controllers\PartnerController@newpartner');
//teams
Route::get('/teams','App\Http\Controllers\TeamController@index');
Route::post('/updateteam','App\Http\Controllers\TeamController@updateteam');
Route::get('/deleteteam/{id}','App\Http\Controllers\TeamController@deleteteam');
Route::get('/editteam/{id}','App\Http\Controllers\TeamController@editteam');
Route::post('/addteam','App\Http\Controllers\TeamController@addteam');
Route::get('/newteam','App\Http\Controllers\TeamController@newteam');
//galleries
Route::get('/galleries','App\Http\Controllers\GalleryController@index');
Route::post('/updategallerie','App\Http\Controllers\GalleryController@updategallerie');
Route::get('/deletegallerie/{id}','App\Http\Controllers\GalleryController@deletegallerie');
Route::get('/editgallerie/{id}','App\Http\Controllers\GalleryController@editgallerie');
Route::post('/addgallerie','App\Http\Controllers\GalleryController@addgallerie');
Route::get('/newgallerie','App\Http\Controllers\GalleryController@newgallerie');
//member
Route::get('/members','App\Http\Controllers\MemberController@index');
Route::post('/updatemember','App\Http\Controllers\MemberController@updatemember');
Route::get('/deletemember/{id}','App\Http\Controllers\MemberController@deletemember');
Route::get('/editmember/{id}','App\Http\Controllers\MemberController@editmember');
Route::post('/addmember','App\Http\Controllers\MemberController@addmember');
Route::get('/newmember','App\Http\Controllers\MemberController@newmember');
Route::get('/memberById/{id}','App\Http\Controllers\MemberController@memberById');
Route::post('/searchmember','App\Http\Controllers\MemberController@searchmember');


//collection
Route::get('/collections','App\Http\Controllers\CollectionController@index');
Route::post('/updatecollection','App\Http\Controllers\CollectionController@updatecollection');
Route::get('/deletecollection/{id}','App\Http\Controllers\CollectionController@deletecollection');
Route::get('/editcollection/{id}','App\Http\Controllers\CollectionController@editcollection');
Route::post('/addcollection','App\Http\Controllers\CollectionController@addcollection');
Route::get('/newcollection','App\Http\Controllers\CollectionController@newcollection');
Route::get('/collectionById/{id}','App\Http\Controllers\CollectionController@collectionById');
Route::post('/collectionByMonth','App\Http\Controllers\CollectionController@collectionByMonth');


//blogs

Route::get('/blogs','App\Http\Controllers\BlogController@index');
Route::post('/updateblog','App\Http\Controllers\BlogController@updateblog');
Route::get('/deleteblog/{id}','App\Http\Controllers\BlogController@deleteblog');
Route::get('/editblog/{id}','App\Http\Controllers\BlogController@editblog');
Route::post('/addblog','App\Http\Controllers\BlogController@addblog');
Route::get('/newblog','App\Http\Controllers\BlogController@newblog');

Route::get('/desactive_slider/{id}','App\Http\Controllers\SliderController@desactive_slider');
Route::get('/activate_slider/{id}','App\Http\Controllers\SliderController@activate_slider');
//abouts
Route::get('/abouts','App\Http\Controllers\AboutController@index');
Route::get('/newabout','App\Http\Controllers\AboutController@newabout');
Route::post('/addabout','App\Http\Controllers\AboutController@addabout');

Route::get('/editabout/{id}','App\Http\Controllers\AboutController@editabout');
Route::post('/updateabout','App\Http\Controllers\AboutController@updateabout');
Route::get('/deleteabout/{id}','App\Http\Controllers\AboutController@deleteabout');


//project
Route::get('/project','App\Http\Controllers\PortfolioController@index');

Route::get('/addproject','App\Http\Controllers\PortfolioController@addproject');
Route::post('/newproject','App\Http\Controllers\PortfolioController@newproject');
Route::get('/editproject/{id}','App\Http\Controllers\PortfolioController@editproject');
Route::post('/updateproject/{id}','App\Http\Controllers\PortfolioController@updateproject');
Route::get('/deleteproject/{id}','App\Http\Controllers\PortfolioController@deleteproject');
//service
Route::get('/service','App\Http\Controllers\ServiceController@index');
Route::post('/newservice','App\Http\Controllers\ServiceController@newservice');
Route::get('/addservice','App\Http\Controllers\ServiceController@addservice');
Route::get('/editservice/{id}','App\Http\Controllers\ServiceController@editservice');
Route::post('/updateservice/{id}','App\Http\Controllers\ServiceController@updateservice');
Route::get('/deleteservice/{id}','App\Http\Controllers\ServiceController@deleteservice');
//messages
Route::get('/messages','App\Http\Controllers\MessageController@index');
Route::post('/contact','App\Http\Controllers\MessageController@contact');
Route::get('/deletemessage/{id}','App\Http\Controllers\MessageController@deletemessage');

//skill
Route::get('/skills','App\Http\Controllers\SkillController@index');
Route::post('/newskill','App\Http\Controllers\SkillController@newskill');
Route::get('/addskill','App\Http\Controllers\SkillController@addskill');
Route::get('/editskill/{id}','App\Http\Controllers\SkillController@editskill');
Route::post('/updateskill/{id}','App\Http\Controllers\SkillController@updateskill');
Route::get('/deleteskill/{id}','App\Http\Controllers\SkillController@deleteskill');
//framework
Route::get('/frameworks','App\Http\Controllers\FrameworkController@index');
Route::post('/newframework','App\Http\Controllers\FrameworkController@newframework');
Route::get('/addframework','App\Http\Controllers\FrameworkController@addframework');
Route::get('/editframework/{id}','App\Http\Controllers\FrameworkController@editframework');
Route::post('/updateframework/{id}','App\Http\Controllers\FrameworkController@updateframework');
Route::get('/deleteframework/{id}','App\Http\Controllers\FrameworkController@deleteframework');

//about
Route::get('/about','App\Http\Controllers\AboutController@index');
Route::post('/newabout','App\Http\Controllers\AboutController@newabout');
Route::get('/addabout','App\Http\Controllers\AboutController@addabout');
Route::get('/editabout/{id}','App\Http\Controllers\AboutController@editabout');
Route::post('/updateabout/{id}','App\Http\Controllers\AboutController@updateabout');
Route::get('/deleteabout/{id}','App\Http\Controllers\AboutController@deleteabout');


//feature
Route::get('/features','App\Http\Controllers\FeatureController@index');
Route::post('/newfeature','App\Http\Controllers\FeatureController@newfeature');
Route::get('/addfeature','App\Http\Controllers\FeatureController@addfeature');
Route::get('/editfeature/{id}','App\Http\Controllers\FeatureController@editfeature');
Route::post('/updatefeature/{id}','App\Http\Controllers\FeatureController@updatefeature');
Route::get('/deletefeature/{id}','App\Http\Controllers\FeatureController@deletefeature');

//links
Route::get('/sociallinks','App\Http\Controllers\SociallinkController@index');
Route::post('/newlink','App\Http\Controllers\SociallinkController@newlink');
Route::get('/addlink','App\Http\Controllers\SociallinkController@addlink');
Route::get('/editlink/{id}','App\Http\Controllers\SociallinkController@editlink');
Route::post('/updatelink/{id}','App\Http\Controllers\SociallinkController@updatelink');
Route::get('/deletelink/{id}','App\Http\Controllers\SociallinkController@deletelink');
Route::get('/download',function(){
    $file = public_path()."/cv.pdf";
    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file,"Mycv.pdf",$headers);
});










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
