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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','Auth\LoginController@showLoginForm');
Route::match(['get', 'post'], '/', 'AdminController@login');
Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::fallback('AdminController@dashboard');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'AdminController@dashboard')->name('dashboard');

Route::get('/dashboard', ['as' => 'dashboard', 'middleware' => 'language', 'uses' => 'AdminController@dashboard']);
Route::get('/admin/dashboard', ['middleware' => 'language', 'uses' => 'AdminController@dashboard']);
Route::get('/logout', 'AdminController@logout');


Route::group(['middleware' => ['language', 'auth']], function() {
    
    //summury serarch
    Route::get('/summarysearch', ['as' => 'summarysearch', 'uses' => 'Newproject_summury_controller@summarysearch']);


    Route::resource('new-project-status-summary','NewProjectStatusSummaryController');
  
    Route::get('/approvedsummarysearch', ['as' => 'approvedsummarysearch', 'uses' =>'Approved_project_summary_controller@a_summarysearch']);
    //project search
     Route::get('/project_Serach', ['as' => 'project_Serach', 'uses' => 'Project_wise_celings_distribution@project_Serach']);
     Route::get('/special_acount/{id}', ['as' => 'special_acount', 'uses' => 'Project_wise_celings_distribution@special_acount']);
    
    //====== Gender Goal ================//
    Route::resource('genderGoal', 'GenderGoalController');
    Route::resource('genderGoalTarget', 'genderGoalTarget');
    
    Route::resource('approval-setup', 'approvalSetupController');
    
    
    //====== Climate Change ================//
    Route::resource('ClaimateChangeGoal', 'ClaimateChangeGoalController');
    Route::resource('ClaimateChangeTarget', 'ClimateChangeTargetController');

    Route::resource('usergroup', 'UsergroupController');
    Route::resource('usercreation', 'UsercreationController');
    Route::resource('menucreation', 'MenucreationController');
    Route::resource('userprivilege', 'UserPrivilegeController');
    
    //approved project summary
    Route::resource('approved_summary', 'Approved_project_summary_controller');
    
    //Project wise celings
   Route::resource('project_celings', 'Project_wise_celings_distribution');
    //.....................setupfile**start.........................//
    Route::resource('district', 'DistrictController');
    Route::resource('division', 'DivisonController');
    Route::resource('ministry', 'MinistryController');
    Route::resource('agency', 'agencycontroller');
    Route::resource('sub-sector', 'SubSectorController');
    Route::resource('sector', 'SectorController');
    Route::resource('project-source', 'SourceProjectController');
    Route::resource('upazila-location', 'UpazilaLocationController');
    Route::resource('budget-head', 'BudgetHeadController');
    Route::resource('pa-source', 'PaSourceController');
    Route::resource('financial-year', 'FinalcialYearController');
    Route::resource('guideline', 'GuidelineController');
    Route::get('show-guideline', 'GuidelineController@showAll')->name('guideline.showguideline');
    Route::get('download/{id}', 'GuidelineController@download');
    Route::resource('project-type', 'ProjectTypeController');
    Route::resource('poverty-goal', 'PovertyGoalController');
    Route::resource('poverty-target', 'PovertyTargetController');
    //======optional================//
    Route::resource('fiscal-year', 'FiscalYearController');
    Route::resource('sdgsgole', 'SdgsgoleController');
    Route::resource('sdgstargets', 'SdgstargetsController');
    Route::resource('pppgole', 'PppgoleController');
    Route::resource('multiyear-target', 'MultiyearTargetController');
    Route::resource('multiyear-goal', 'MultiyearGoalController');
    Route::resource('ppptargets', 'PpptargetsController');
    Route::resource('rmo_setup', 'Rmo_controller');
    Route::resource('wings', 'WingsController');
    //.....................approved_project.......................//
    Route::resource('newproject', 'UnapprovedProjectController');
    Route::resource('approaved_project', 'ApprovedProjectController');
    Route::resource('approaved_project_approval', 'approved_project_approval');
    Route::get('show_approved_project', 'AjaxAllDataController@show_approved_project')->name('show_approved_project');
    Route::resource('approved_project_list', 'ApprovedProjectListController');
    Route::resource('adp_allocation', 'AdpAllocationController');
    Route::resource('allocated_project', 'allocated_projectController');
    Route::resource('sendadpallocation', 'SendAdpAllocationController');
    Route::resource('newprojectlist', 'UnapprovedProjectListController');
    //.....................Re-Appropriation.......................//
    Route::resource('re_appropriation', 'reAppropriationController'); 
    //new project summuary
     Route::resource('summary','Newproject_summury_controller');
     Route::resource('AdpSummery','AdpSummeryController');
   //.....................Re-Allocations.......................//
    Route::resource('re_allcation', 'reAllocation');
    Route::resource('ministerialmeeting', 'MinisterialMeetingController');
    Route::resource('ministerialmeeting', 'MinisterialMeetingController');
    Route::resource('adpministerialmeeting', 'AdpMinisterialMeetingController');
     Route::resource('pd_distribution', 'PdDistributionController');
    Route::post('adminministerialmeeting/admin_store', 'MinisterialMeetingController@admin_store')->name('adminministerialmeeting.admin_store');
    Route::post('add_finance_approve_project', 'ApprovedProjectController@add_finance');
    Route::post('link_target_approve_project/{id}', 'ApprovedProjectController@link_target');
    Route::post('add_comments_to_approve_project', 'ApprovedProjectController@add_comments_to_approve_project');
    Route::post('sendtochecker', 'UnapprovedProjectController@sendtochecker');
    Route::post('adpsendtochecker', 'allocated_projectController@adpsendtochecker');

    Route::delete('delete_type_of_finance/{id}/{project_id}', 'ApprovedProjectController@delete_type_of_finance');
    Route::post('update_finance_type/{id}', 'ApprovedProjectController@update_finance_type');

    Route::post('update_component_wise_cost/{id}', 'ApprovedProjectController@update_component_wise_cost');

    Route::post('update_location_wise_cost/{id}', 'ApprovedProjectController@update_location_wise_cost');
    Route::post('update_year_wise_cost/{id}', 'ApprovedProjectController@update_year_wise_cost');
    Route::post('add_component_wise_cost', 'ApprovedProjectController@add_component_wise_cost');
//    Route::post('/update_component_wise_cost/{id}', ['as' => 'update_component_wise_cost','uses' => 'ApprovedProjectController@update_component_wise_cost']);
    Route::post('add_year_wise_cost', 'ApprovedProjectController@add_year_wise_cost');
    Route::post('add_location_wise_cost', 'ApprovedProjectController@add_location_wise_cost');
    Route::get('edit_year_wise_cost/{id}/{project_id}', 'AjaxAllDataController@edit_year_wise_cost');
    Route::get('edit_locationwisecost/{id}/{project_id}', 'AjaxAllDataController@edit_locationwisecost');
    Route::post('add_approval_status', 'ApprovedProjectController@add_approval_status');


    //.............................route**for***ajax****get***source****data.........................//
    Route::get('/sourcedata', ['as' => 'source_data', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@get_source_data']);

    //.............................route**for***ajax****get***division & UPAZILLA****data.........................//
    Route::get('/division_data', ['as' => 'division_data', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@get_division_data']);
    
    Route::get('/upazila_data', ['as' => 'get_upazila_data', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@get_upazila_data']);
    Route::get('/send_comment_data', ['as' => 'send_comment_data', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@send_comment_data']);
    Route::get('/delcomment', ['as' => 'delcomment', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@delcomment']);
    Route::get('/commentupdate', ['as' => 'commentupdate', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@commentupdate']);
    Route::get('/getting_the_target', ['as' => 'getting_the_target', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@getting_the_target']);

    Route::get('/getting_sub_sector', ['as' => 'getting_sub_sector', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@getting_sub_sector']);
    Route::get('/getting_ministry', ['as' => 'getting_ministry', 'middleware' => 'language', 'uses' => 'AjaxAllDataController@getting_ministry']);

    //.............................route**for***send component ****data.........................//

    Route::get('/send_component_data', ['as' => 'send_component_data', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_component_data']);

    Route::get('/send_modal_add_comment_data', ['as' => 'send_modal_add_comment_data', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@send_modal_add_comment_data']);

    Route::get('demand_data', 'AjaxAllDataController@get_demand_data');
    Route::get('get_selected_upazila_data', 'AjaxAllDataController@get_selected_upazila_data');
    Route::get('reAllocationDataSet', 'reAllocation@ReAllocationData');
    Route::get('reAppropriationDataSet', 'reAppropriationController@ReApproptiationData');
    //..........................multiyeart target...........................
    
    Route::get('/get_m_target', ['as' => 'get_m_target', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_m_target']);
    Route::get('/get_m_goal', ['as' => 'get_m_goal', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_m_goal']);
    //--------------------------gender-----------------------------------
      Route::get('/get_gender_target', ['as' => 'get_gender_target', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_gender_target']);
       Route::get('/gendergoal', ['as' => 'gendergoal', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@gendergoal']);
    //...........................get_sdgs_goal.......................................//
    Route::get('/get_sdgs_goal', ['as' => 'get_sdgs_goal', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_sdgs_goal']);

    Route::get('/get_climate_goal', ['as' => 'get_climate_goal', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_climate_goal']);

    Route::get('/getting_the_climate_target', ['as' => 'getting_the_climate_target', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@getting_the_climate_target']);

    Route::get('/get_poverty_goal', ['as' => 'get_poverty_goal', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_poverty_goal']);

    Route::get('/poverty_target', ['as' => 'poverty_target', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@poverty_target']);

    Route::get('/get_ppp_goal', ['as' => 'get_ppp_goal', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_ppp_goal']);

    Route::get('/ppp_target', ['as' => 'ppp_target', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@ppp_target']);

    Route::get('/get_rmo_data', ['as' => 'get_rmo_data', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_rmo_data']);

    Route::get('/get_district_data', ['as' => 'get_district_data', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@get_district_data']);

    //send edit comment data
    Route::get('/send_edit_comment_data', ['as' => 'send_edit_comment_data', 'middleware' => 'language',
        'uses' => 'AjaxAllDataController@send_edit_comment_data']);

    //...............................add**component*to**cart*****......................................//

    Route::get('/add_component_to_cart', ['as' => 'add_component_to_cart',
        'middleware' => 'language',
        'uses' => 'UnapprovedProjectController@addComponentTocart'
    ]);

    Route::get('/show_comment_data', ['as' => 'show_comment_data',
        'middleware' => 'language',
        'uses' => 'AjaxAllDataController@show_comment_data'
    ]);


    Route::get('/show_unapproved_project', ['as' => 'show_unapproved_project',
        'middleware' => 'language',
        'uses' => 'AjaxAllDataController@show_unapproved_project'
    ]);

    //...............................delete**component*to**cart*****......................................//

    Route::get('/cartdelete', [
        'uses' => 'AjaxAllDataController@cartdelete',
        'as' => 'cartdelete'
    ]);

    //...............................update**component*to**cart*****......................................//
    Route::get('/cartupdate', [
        'uses' => 'AjaxAllDataController@cartupdate',
        'as' => 'cartupdate'
    ]);

    Route::get('/showcomment', [
        'uses' => 'AjaxAllDataController@showcomment',
        'as' => 'showcomment'
    ]);

    Route::get('/add_administrative_info', [
        'uses' => 'AjaxAllDataController@administrative_info',
        'as' => 'add_administrative_info'
    ]);

    Route::get('add_yearwisecost/{project_id}', [
        'uses' => 'AjaxAllDataController@add_yearwisecost',
        'as' => 'add_yearwisecost'
    ]);

    Route::get('add_locationwisecost/{project_id}', [
        'uses' => 'AjaxAllDataController@add_locationwisecost',
        'as' => 'add_locationwisecost'
    ]);
    
    Route::get('add_approval/{project_id}', [
        'uses' => 'AjaxAllDataController@add_approval',
        'as' => 'add_approval'
    ]);

    //getting ministry_from sector
     Route::get('sector-to-ministry','AjaxAllDataController@getting_ministry');
     Route::get('ministry-to-project','AjaxAllDataController@getting_ministry_to_project');
     Route::get('ministry-to-project_edit','AjaxAllDataController@getting_ministry_to_project_edit');

    Route::get('/add_componentwisecost/{id}', [
        'uses' => 'AjaxAllDataController@add_componentwisecost',
        'as' => 'add_componentwisecost'
    ]);

    Route::get('add_type_of_finance/{project_id}', [
        'uses' => 'AjaxAllDataController@add_type_of_finance',
        'as' => 'add_type_of_finance'
    ]);
    Route::get('edit_type_of_finance/{id}/{project_id}', 'AjaxAllDataController@edit_type_of_finance');
    Route::get('edit_component_wise_cost/{id}/{project_id}', 'AjaxAllDataController@edit_component_wise_cost');

    //.............................delete source........................//

    Route::get('/delete_source/{pid}/{sid?}', [
        'uses' => 'UnapprovedProjectController@delete_source',
        'as' => 'delete_source'
    ]);

    //.............. rotue for foreign aid budget and accounts.............//
    Route::resource('fa-budget-accounts',"ForeignAidBudgetAndAccountsController");
});

Route::post('/change-language', ['as' => 'change_language', 'uses' => 'LanguageController@changeLanguage']);

Route::get('adp_allocation_view/{id}', 'allocated_projectController@show');
Route::get('user-group-department', 'UsercreationController@ajaxrequest');
Route::get('download', 'downloadController@download')->name('download');

Route::resource('financial-division-distributon','FinancialDivisionDistributionController')->middleware(['language','auth']);