<?php

use App\Activity;
use App\MonthlyProgress;
use App\Plan;
use App\User;
use Illuminate\Support\Facades\Session;

//\Illuminate\Support\Facades\Auth::loginUsingId(1);

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest');



Route::group(['middleware' => ['auth']], function () {

    // Change Password
    Route::get('change-password', 'SettingsController@showChangePasswordForm');
    Route::post('change-password', 'SettingsController@changePassword');

    // PROFILE
    Route::get('/profile', 'ProfileController@index')->name('profile.index');

    //    Components'
    Route::resource('component', 'ComponentsController', ['names' => ['index' => 'component']]);
    Route::resource('subcomponent', 'subComponentsController', ['names' => ['index' => 'subcomponent']]);

    //    Projects
    Route::resource('project', 'ProjectsController', ['names' => ['index' => 'project']]);

    // Data Table
    Route::get('/datatable', 'OutputsController@datatable')->name('datatable');
    //    Activities
    Route::resource('activity', 'ActivityController', ['names' => ['index' => 'activity', 'show' => 'activity.show']]);
    Route::resource('province', 'ProvinceController');

    //    Settings

    //    Permisions
    Route::get('roles_and_permissions', 'SettingsController@manageRolesAndPermissions')->name('manage_roles_and_permissions');

    Route::post('roles_and_permissions', 'SettingsController@storeRoleAndPermissions')->name('store_roles_and_permissions');


    //    User Managemnt
    Route::get('/user/create', 'UsersController@create')->name('create_user');


    //    Settings
    Route::get('/unit', 'SettingsController@units')->name('units');
    Route::post('/unit', 'SettingsController@store_unit')->name('store_unit');
    Route::resource('province', 'ProvincesController');
    Route::resource('district', 'DistrictsController');
    Route::resource('village', 'VillagesController');

    Route::get('/output/create-for-plan', 'OutputsController@createForPlan');


    // Outputs
    Route::resource('output', 'OutputsController');
    //Plans
    Route::resource('/plan', 'PlanController', ['names' => ['index' => 'plan', 'show' => 'show-plan', 'create' => 'create-plan']]);
    Route::get('/outputs', 'OutputsController@outputs');

    //    Lists and Ajax
    Route::get('/add-ajax-item', 'AjaxController@addAjaxItem');
    Route::get('/ajax/item', 'AjaxController@storeItem');
    Route::get('/ajax/refreshComponent', 'AjaxController@refreshComponent');
    Route::get('/ajax/refreshProject', 'AjaxController@refreshProject');
    Route::get('/ajax/refreshSubComponent', 'AjaxController@refreshSubComponent');
    Route::get('/ajax/refreshActivity', 'AjaxController@refreshActivity');
    Route::get('/ajax/refreshProvince', 'AjaxController@refreshProvince');
    Route::get('/ajax/refreshDistrict', 'AjaxController@refreshDistrict');
    Route::get('/ajax/refreshVillage', 'AjaxController@refreshVillage');
    //    Implemeting Partners
    Route::resource('/implementing-partner', 'ImplementingPartnersController');

    //    Beneficiaries
    Route::resource('/beneficiary', 'BeneficiariesController');
    Route::resource('/indicator', 'IndicatorController');

    //    Reports
    Route::get('/report', 'ReportsController@index')->name('report.index');
    Route::get('/report/generate', 'ReportsController@generate')->name('report.result');

    Route::get('/cumulative-report', 'ReportsController@cumulativeReport');
    Route::get('/cumulative-report-result', 'ReportsController@cumulativeReportResult');


    Route::get('/report/test', 'ReportsController@test');
    Route::post('/outputForPlan', 'OutputsController@storeForPlan');


    Route::get('/updateOutput', 'AjaxController@updateOutput');

    //    Workplan and Logframe

    Route::get('/project/{id}/workplan', 'ProjectsController@workplan');
    Route::get('/project/{id}/workplans', 'ProjectsController@workplans');
    Route::get('/project/{id}/logframe', 'ProjectsController@logframe');
    //    Route::get('/output/{id}/monthlyProgress', 'OutputsController@MonthlyProgress');
    //    Route::post('/output/{id}/monthlyProgress', 'OutputsController@StoreMonthlyProgress');
    Route::post('/addMonthlyProgress', 'OutputsController@StoreMonthlyProgress');
    Route::get('/progress/{progress}', 'OutputsController@edit_progress');
    Route::put('/progress', 'OutputsController@update_progress');
    //    Progress for each province
    Route::get('/plan/{plan}/province/{province}', 'PlanController@ProgressForProvince');

    // Filters
    Route::get('/filter', 'FilterController@Index')->name('filter.index');
    Route::get('/getFilterEssentials', 'FilterController@essentials')->name('filter.essentials');
    Route::get('/getComponents', 'FilterController@components')->name('filter.components');
    Route::get('/getSubcomponents', 'FilterController@subcomponents')->name('filter.subcomponents');
    Route::get('/getActivities', 'FilterController@activities')->name('filter.activities');
    Route::get('/getPlans', 'FilterController@plans')->name('filter.plans');
    Route::get('/getProvinces', 'FilterController@provinces')->name('filter.provinces');

    // Documents || Filemanager

    Route::resource('document', 'DocumentController');
    Route::get('/file-manager', function () {
        return view('filemanager.index');
    });

    // Summary Report

    Route::get('/entry_summary', 'EntryController@AllUsers');

    Route::get('/entry-summary/{userid}/{date}', 'EntryController@SpecificDateEntryReportForSpecificUser');
    Route::get('/my-progress', 'EntryController@MyProgress');


    // Fetch API
    Route::get('/loadUsers', 'FetchController@loadUsers');


    Route::get('/home', 'HomeController@index')->name('home');


    // Axios
    Route::get('/refreshDistricts', 'AjaxController@Districts');
    Route::get('/getProgress', 'OutputsController@getProgress');




    //BirdsEye
    Route::get('/birdseye', 'BirdsEyeController@index');

    // Rechecking
    Route::get('/rechecking', 'RecheckingController@index');
    Route::get('/progress_details', 'RecheckingController@index')->name('plan.progress');
    Route::get('/trash', 'RecheckingController@trash');

    // Maps
    Route::get('/map', 'MapController@index');
    Route::get('/getMapInfo', 'MapController@getMapInfo');
    Route::get('/getDistrictsCoordinates', 'MapController@getDistrictsCoordinates');


    // Data Questionnaire
    Route::resource('/questionnaire', 'QuestionnaireController');

    // Irrigation
    Route::resource('/scheme', 'SchemeController');

    // Charts

    Route::get('/chartProvinces', 'ChartController@chartProvinces');
    Route::get('/chartSeries', 'ChartController@chartSeries');
    Route::get('/getChartName', 'ChartController@getChartName');
    Route::get('/chartDistricts', 'ChartController@chartDistricts');
    Route::get('/chartMonths', 'ChartController@chartMonths');
    Route::get('/getEntryProgressDetails', 'ChartController@getEntryProgressDetails');
    Route::get('/activityDetails', 'ChartController@activityDetails');
    Route::get('/getActualVsPlannedDetails', 'ChartController@getActualVsPlannedDetails');

    // Irrigation
    Route::get('/irrigation_scheme', 'IrrigationController@index')->name('irrigation.index');
    Route::post('/irrigation_scheme', 'IrrigationController@store')->name('irrigation_scheme.store');
    Route::get('/getIrrigationEssentials', 'IrrigationController@getIrrigationEssentials');

    // Development
    Route::view('/development', 'development.index');
    //
});


Auth::routes();




// Fixes
Route::get('/fixActivityID', function () {
    $progresses = \App\MonthlyProgress::all();
    foreach ($progresses as $progress) {
        $activity_id = \App\Plan::find($progress->plan_id)->activity_id;
        $progress->activity_id = $activity_id;
        $progress->update();
    }
});

Route::get('/fix', function () {
    $progresses = \App\MonthlyProgress::all();
    foreach ($progresses as $progress) {
        $project_id = \App\Plan::find($progress->plan_id)->project_id;
        $activity_id = \App\Plan::find($progress->plan_id)->activity_id;
        $component_id = \App\Plan::find($progress->plan_id)->component_id;
        $subcomponent_id = \App\Plan::find($progress->plan_id)->subcomponent_id;

        $progress->activity_id = $activity_id;
        $progress->project_id = $project_id;
        $progress->subcomponent_id = $subcomponent_id;
        $progress->component_id = $component_id;
        $progress->update();
    }
});

// Maps




// Tests

Route::get('test', 'PracticeController@index');




// Fix Years
Route::get('/fix-years', function () {
    $years = [2015, 2016, 2017, 2018, 2019];
    foreach ($years as $year) {
        $progresses = MonthlyProgress::whereYear('start_date', $year)->get();
        foreach ($progresses as $progress) {
            if ($progress->plan->year != $year) {
                $progressActivity = $progress->plan->activity->name;
                $progressActivityId = Activity::where('name', $progressActivity)->first();
                $plan = Plan::where('year', $year)->where('activity_id', $progressActivityId->id)->first();
                if ($plan) {
                    $progress->plan_id = $plan->id;
                    $progress->update();
                }
            }
        }
    }
});


Route::get('/delete-duplicates', function () {
    $ids = [
        11310,
        11312,
        11313,
        11315,
        11316,
        11317,
        11318,
        11320,
        11322,
        11324,
        11384,
        11385,
        11386,
        11387,
        11388,
        11389,
        11390,
        11391,
        11392,
        11393,
        11328,
        11331,
        11333,
        11334,
        11336,
        11337,
        11338,
        11340,
        11341,
        11343,
        11394,
        11395,
        11396,
        11397,
        11398,
        11399,
        11400,
        11401,
        11402,
        11403,
        11346,
        11348,
        11349,
        11353,
        11355,
        11356,
        11357,
        11358,
        11359,
        11360,
        11404,
        11405,
        11406,
        11407,
        11408,
        11409,
        11410,
        11411,
        11361,
        11362,
        11363,
        11364,
        11365,
        11366,
        11367,
        11368,
        11369,
        11370,
        11412,
        11413,
        11414,
        11415,
        11416,
        11417,
        11418,
        11420,
        11421,
        11422,
        11371,
        11272,
        11373,
        11374,
        11375,
        11376,
        11377,
        11378,
        11379,
        11380,
        11423,
        11424,
        11425,
        11426,
        11432,
        11434,
        11436,
        11438,
        11441,
        11442
    ];


    foreach ($ids as $id) {
        MonthlyProgress::find($id)->delete();
    }
});

\PWA::routes();
