<?php

use Illuminate\Support\Facades\Input;

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
Route::get('/demo', function () {
    return view('hr.createhremployee');
});

Auth::routes();
Route::get('login', function () {
    return View::make('auth.login');
})->name('login');

Route::post('login', function () {
    $credentials = Input::only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return Redirect::back()->withMessage('Invalid credentials');
    }

    if (Auth::user()->hasRole('hradmin')) {
        return Redirect::to('hr/dashboard');
    } elseif (Auth::user()->hasRole('employee')) {
        return Redirect::to('/home');
    } elseif (Auth::user()->hasRole('dcp')) {
        return Redirect::to('dcp/dashboard');
    } elseif (Auth::user()->hasRole('cmp')) {
        return redirect(route('cmpHome'));
    }

    return Redirect::to('/');
})->name('login');

Route::get('/home', 'EmployeeController@index')->name('home')->middleware('auth');
Route::get('/checkin', 'CheckInOutController@checkin')->name('checkin')->middleware('auth');
Route::get('/checkout', 'CheckInOutController@checkout')->name('checkout')->middleware('auth');
Route::post('/checkout', 'CheckInOutController@savecheckout')->name('savecheckout')->middleware('auth');
//for human resource routing
Route::group(['prefix' => 'hr',  'middleware' => ['auth']], function () {
    Route::get('dashboard', 'HrDashboardController@index')->name('hrdashboard');
    Route::get('takealeave', 'HrLeaveController@takealeave')->name('takealeave');
    Route::post('savetakealeave', 'HrLeaveController@savetakealeave')->name('savetakealeave');
    Route::get('leavehistory', 'HrLeaveController@leavehistory')->name('leavehistory');
    Route::get('holidaycalender', 'HrLeaveController@holidaycalender')->name('holidaycalender');
    Route::get('officetime', 'AttendanceSettingController@officetime')->name('officetime');
    Route::post('saveofficetime', 'AttendanceSettingController@saveofficetime')->name('saveofficetime');
    Route::get('showofficetime', 'AttendanceSettingController@showofficetime')->name('showofficetime');
    Route::get('officeouttime', 'AttendanceSettingController@officeouttime')->name('officeouttime');
    Route::post('saveofficeouttime', 'AttendanceSettingController@saveofficeouttime')->name('saveofficeouttime');
    Route::get('graceperiod', 'AttendanceSettingController@graceperiod')->name('graceperiod');
    Route::post('savegraceperiod', 'AttendanceSettingController@savegraceperiod')->name('savegraceperiod');
    Route::get('viewleaveapp', 'Hr\LeaveapplicationController@index')->name('viewleaveapp');
    Route::get('viewleaveapp/api', 'Hr\LeaveapplicationController@api')->name('leaveapi');
    Route::post('viewleaveapp/api', 'Hr\LeaveapplicationController@postapi');
    Route::get('attend', 'ShowHrAttend@index')->name('attend');
    Route::post('savecheckin', 'CheckInOutController@savecheckin')->name('savecheckin');
    //shahin vai

    Route::get('holidays', 'HrHolidayListController@just_show')->name('holidays');
    Route::get('jsonholidays', 'HrHolidayListController@index')->name('holiday.all');
    Route::post('holiday/add', 'HrHolidayListController@saveholiday')->name('holiday.add');
    Route::post('holiday/edit', 'HrHolidayListController@editholiday')->name('holiday.edit');
    Route::post('holiday/delete', 'HrHolidayListController@deleteholiday')->name('holiday.delete');

    Route::resources([
    'emptype'      => 'HrEmpController',
    'section'      => 'HrSectionController',
    'department'   => 'HrDepartmentController',
    'designation'  => 'HrDesignationController',
    'profile'      => 'ProfileController',
    'jobopenning'  => 'HrJobOpenningController',
    'jobapplicant' => 'JobapplicantController',
    // 'offerleter'=> 'HrJobOfferController',
    // 'leaveapplication'=> 'HrLeaveApplicationController',
     'leavetype'=> 'HrLeaveTypeController',

    // 'leaveallocation'=> 'HrLeaveAllocationController',
    // 'attendance'=> 'HrAttendanceController',

   ]);
});

/*
================================================================================
DCP All Route's
================================================================================
*/
Route::group(['prefix'=>'dcp', 'middleware'=>['role:dcp']], function () {
    Route::resources([
      'season'          => 'DcpSeasonController',
      'supplier'        => 'DcpSupplierController',
       'brand'          => 'DcpBrandController',
       'productstype'   => 'DcpProductstypeController',
       'productcategory'=> 'DcpProductCategoryController',
       'label'          => 'DcpLabelController',
       'courier'        => 'DcpCourierController',

  ]);
    Route::get('dashboard', 'DcpController@index')->name('dcpdashboard');
});

Route::group(['prefix'=>'dcp', 'middleware'=>'auth'], function () {

//step-one routelist
    Route::get('/stepone', 'DcpsteponeController@index')->name('dcpsteponeindex');
    Route::get('/stepone/create', 'DcpsteponeController@create')->name('dcpsteponecreate');
    Route::post('/stepone', 'DcpsteponeController@store')->name('dcpstepone');
    Route::get('/stepone/{id}/edit', 'DcpsteponeController@edit')->name('dcpsteponedit');
    Route::match(['PUT', 'PATCH'], '/stepone/update/{id}', 'DcpsteponeController@update')->name('dcpsteponeupdate');
    Route::delete('/stepone/{id}/delete', 'DcpsteponeController@destroy')->name('dcpdestroy');
    Route::post('/proto/check', 'DcpsteponeController@checkproto')->name('proto.unique');
    //step-two routelist

    Route::get('/steptwo', 'DcpStepTwoController@list')->name('dcpsteptwolist');
    Route::get('/steptwo/create', 'DcpStepTwoController@index')->name('getdcpsteptwo');
    Route::post('/steptwo/store', 'DcpStepTwoController@store')->name('dcpsteptwo');
    Route::get('/steptwo/{id}/edit', 'DcpStepTwoController@edit')->name('dcpsteptwoedit');
    Route::match(['PUT', 'PATCH'], '/steptwo/update/{id}', 'DcpStepTwoController@update')->name('dcpsteptwoupdate');
    Route::delete('/steptwo/{id}/delete', 'DcpStepTwoController@destroy')->name('dcpsteptwodestroy');
    Route::post('/steptwo/getinfo', 'DcpStepTwoController@getinfo')->name('dcpgetinfo');

    Route::get('/steptwo/{id}/approve', 'DcpStepTwoController@approve')->name('dcpapprove');

    Route::get('/excel/export', 'DcpStepTwoController@export')->name('excelexport');

    Route::get('/approved/list', 'DcpStepTwoController@approved')->name('approvedlist');
});

/*
================================================================================
Order-Process Route's
================================================================================
*/

Route::group(['prefix'=>'order'], function () {
    Route::get('/process/index', 'OrderProcessController@index')->name('orderprocess.index');
    Route::get('/process/create', 'OrderProcessController@create')->name('orderprocess.create');
    Route::post('/process/store', 'OrderProcessController@store')->name('orderprocess.store');
    Route::get('/process/{id}/edit', 'OrderProcessController@edit')->name('orderprocess.edit');
    Route::match(['PUT', 'PATCH'], '/process/update/{id}', 'OrderProcessController@update')->name('orderprocess.update');
    Route::delete('/process/{id}/delete', 'OrderProcessController@delete')->name('orderprocess.delete');
});

//Compliance Sector Route
Route::group(['prefix' => 'cmp', 'middleware' => 'auth'], function () {
    Route::get('/', 'Cmp\CmpDashBoardController@index')->name('cmpHome');

    Route::get('/supplier/create', 'Cmp\CmpSupplierController@create')->name('supplierCreate');
    Route::post('/supplier', 'Cmp\CmpSupplierController@store')->name('supplierStore');
    Route::get('/supplier/{id}', 'Cmp\CmpSupplierController@show')->name('supplierShow');
    Route::get('/supplier/{id}/edit', 'Cmp\CmpSupplierController@edit')->name('supplierEdit');
    Route::post('/supplier/{id}/edit', 'Cmp\CmpSupplierController@edits')->name('supplierEdits');
    Route::delete('/supplier/{id}/delete', 'Cmp\CmpSupplierController@destroy')->name('supplierDestroy');

    Route::get('/supplier/{id}/smeta/create', 'Cmp\CmpSmetaController@create')->name('smetaCreate');
    Route::post('/supplier/{id}/smeta', 'Cmp\CmpSmetaController@store')->name('smetaStore');
    Route::get('/supplier/{id}/smeta/edit', 'Cmp\CmpSmetaController@edit')->name('smetaEdit');
    Route::post('/supplier/{id}/smeta/edit', 'Cmp\CmpSmetaController@edits')->name('smetaEdits');

    Route::get('/supplier/{id}/audit', 'Cmp\CmpAuditController@create')->name('auditCreate');
    Route::post('/supplier/{id}/audit', 'Cmp\CmpAuditController@Store')->name('auditStore');
    Route::get('/supplier/{id}/audit/edit', 'Cmp\CmpAuditController@edit')->name('auditEdit');
    Route::post('/supplier/{id}/audit/edit', 'Cmp\CmpAuditController@edits')->name('auditEdits');

    Route::get('/supplier/{id}/auditcaps', 'Cmp\CmpAuditCapController@index')->name('auditCaps');
    Route::get('/supplier/{id}/auditcap/create', 'Cmp\CmpAuditCapController@create')->name('auditcapCreate');
    Route::post('/supplier/{id}/auditcap', 'Cmp\CmpAuditCapController@store')->name('auditcapStore');

    Route::get('/supplier/{id}/alliance/create', 'Cmp\CmpAllianceController@create')->name('alliance.create');
    Route::post('/supplier/{id}/alliance', 'Cmp\CmpAllianceController@store')->name('alliance.store');
    Route::get('/supplier/{id}/alliance/edit', 'Cmp\CmpAllianceController@edit')->name('alliance.edit');
    Route::post('/supplier/{id}/alliance/edit', 'Cmp\CmpAllianceController@edits')->name('alliance.edits');

    Route::get('/supplier/{id}/currentApproval/create', 'Cmp\CmpCurrentApprovalController@create')->name('approval.create');
    Route::post('/supplier/{id}/currentApproval', 'Cmp\CmpCurrentApprovalController@store')->name('approval.save');
    Route::get('/supplier/{id}/currentApproval/edit', 'Cmp\CmpCurrentApprovalController@edit')->name('approval.edit');
    Route::post('/supplier/{id}/currentApproval/edit', 'Cmp\CmpCurrentApprovalController@edits')->name('approval.edits');
});

Route::group(['prefix'=>'vacancy', 'middleware'=>'guest'], function () {
    Route::get('list', 'VacancyController@index')->name('vacancylist');
    Route::get('apply', 'VacancyController@apply')->name('apply');
    Route::get('show/{id}', 'VacancyController@show')->name('vacancyshow');
    Route::post('saveapply', 'VacancyController@saveapply')->name('saveapply');
});

//Account module route
Route::group(['prefix' => 'account', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('account.dashboard');
    })->name('adashboard');

    Route::get('party/create', 'Account\PartyController@create')->name('party.create');
    Route::post('party/save', 'Account\PartyController@store')->name('party.save');
    Route::get('party/', 'Account\PartyController@index')->name('party.index');
    Route::get('party/{id}/edit', 'Account\PartyController@edit')->name('party.edit');
    Route::post('party/{id}/edit', 'Account\PartyController@update')->name('party.update');
    Route::get('party/{id}/delete', 'Account\PartyController@destroy')->name('party.delete');

    Route::get('bank/create', 'Account\BankController@create')->name('bank.create');
    Route::post('bank/save', 'Account\BankController@store')->name('bank.save');
    Route::get('bank/', 'Account\BankController@index')->name('bank.index');
    Route::get('bank/{id}/edit', 'Account\BankController@edit')->name('bank.edit');
    Route::post('bank/{id}/edit', 'Account\BankController@update')->name('bank.update');
    Route::get('bank/{id}/delete', 'Account\BankController@destroy')->name('bank.delete');

    Route::get('balance/create', 'Account\BalanceController@create')->name('balance.create');
    Route::post('balance/save', 'Account\BalanceController@store')->name('balance.save');
    Route::get('balance/', 'Account\BalanceController@index')->name('balance.index');
    Route::get('balance/{id}/edit', 'Account\BalanceController@edit')->name('balance.edit');
    Route::post('balance/{id}/edit', 'Account\BalanceController@update')->name('balance.update');
    Route::get('balance/{id}/delete', 'Account\BalanceController@destroy')->name('balance.delete');
    //json
    Route::get('balance/json/', 'Account\BalanceController@send_json')->name('balance.json');

    //balance with expense history
    Route::get('balanceexpense/', 'Account\BalanceController@balanceexpense')->name('balanceexpense');
    Route::post('balanceexpense/report', 'Account\BalanceController@balanceexpenseReport')->name('balanceexpenseReport');
    Route::get('balanceexpense/report', 'Account\BalanceController@balanceexpenseShow')->name('balanceexpenseReportshow');

    Route::get('/accounthead', 'Account\AccountHeadController@index')->name('accounthead.index');
    Route::post('/accounthead', 'Account\AccountHeadController@store')->name('accounthead.store');
    Route::post('/accounthead/{id}/edit', 'Account\AccountHeadController@update')->name('accounthead.update');
    Route::get('/accounthead/{id}/delete', 'Account\AccountHeadController@destroy')->name('accounthead.delete');
    //json
    Route::get('accounthead/json/', 'Account\AccountHeadController@send_json')->name('abalance.json');
    Route::get('/head-subhead/json', 'Account\AccountHeadController@head_subhead')->name('head_subhead');

    Route::get('/accountsubhead', 'Account\AccountSubHeadController@index')->name('accountsubhead.index');
    Route::post('/accountsubhead', 'Account\AccountSubHeadController@store')->name('accountsubhead.store');
    Route::post('/accountsubhead/{id}/edit', 'Account\AccountSubHeadController@update')->name('accountsubhead.update');
    Route::get('/accountsubhead/{id}/delete', 'Account\AccountSubHeadController@destroy')->name('accountsubhead.delete');
    //json
    Route::get('accountsubhead/json/', 'Account\AccountSubHeadController@send_json')->name('sbalance.json');

    Route::get('bankbalance/', 'Account\BankBalanceController@index')->name('bankbalance.index');
    Route::get('bankbalance/create', 'Account\BankBalanceController@create')->name('bankbalance.create');
    Route::post('bankbalance/', 'Account\BankBalanceController@store')->name('bankbalance.store');
    Route::get('bankbalance/{id}/edit', 'Account\BankBalanceController@edit')->name('bankbalance.edit');
    Route::post('bankbalance/{id}/update', 'Account\BankBalanceController@update')->name('bankbalance.update');
    Route::get('bankbalance/{id}/delete', 'Account\BankBalanceController@destroy')->name('bankbalance.delete');

    Route::get('expense/create', 'Account\ExpenseController@create')->name('expense.create');
    Route::post('expense/save', 'Account\ExpenseController@store')->name('expense.save');
    Route::get('expense/', 'Account\ExpenseController@index')->name('expense.index');
    Route::get('expense/{id}/edit', 'Account\ExpenseController@edit')->name('expense.edit');
    Route::post('expense/{id}/edit', 'Account\ExpenseController@update')->name('expense.update');
    Route::get('expense/{id}/delete', 'Account\ExpenseController@destroy')->name('expense.delete');
    Route::get('expense-month', 'Account\ExpenseController@expense_month')->name('expense-month');
    Route::post('pay/{id}', 'Account\ExpenseController@pay')->name('expense.pay');

    Route::get('payableexpense/create', 'Account\PayableExpenseController@create')->name('payable.create');
    Route::post('payableexpense/save', 'Account\PayableExpenseController@store')->name('payable.save');
    Route::get('payableexpense/', 'Account\PayableExpenseController@index')->name('payable.index');
    Route::get('payableexpense/{id}/edit', 'Account\PayableExpenseController@edit')->name('payable.edit');
    Route::post('payableexpense/{id}/edit', 'Account\PayableExpenseController@update')->name('payable.update');
    Route::get('payableexpense/{id}/delete', 'Account\PayableExpenseController@destroy')->name('payable.delete');

    Route::get('/date-reports', 'Account\ReportController@show_date_report')->name('date.report');
    Route::post('/date-reports/show', 'Account\ReportController@show_date_report_show')->name('date.report.show');

    Route::get('/date-reports2', 'Account\ReportController@show_date_report2');
    Route::post('/date-reports2/show', 'Account\ReportController@show_date_report_show2')->name('date.report.show2');

    Route::get('/head-reports', 'Account\ReportController@show_head_report')->name('head.report');
    Route::post('/head-reports/show', 'Account\ReportController@show_head_report_show')->name('head.report.show');

    Route::get('/head-reports2', 'Account\ReportController@show_head_report2')->name('head.report2');
    Route::post('/head-reports/show2', 'Account\ReportController@show_head_report_show2')->name('head.report.show2');

    Route::get('/pettycash-reports/', 'Account\ReportController@show_balance_report')->name('balance_report_show');
    Route::post('/pettycash-reports/', 'Account\ReportController@show_balance_report_show')->name('balance_report');
});

Route::any('/search', 'ProfileController@searchprofile')->name('search.profile');
Route::get('superadmin', 'SuperAdminController@index')->name('superadmin');

/*
    ==================================================
    PCP routes
    ==================================================
*/

Route::group(['prefix'=>'pcp', 'middleware'=>'auth'], function () {
    Route::get('/dashboard', 'LabDipController@dashboard')->name('labdip.dashboard');

    Route::get('/labdip/create', 'LabDipController@create')->name('labdip.create');
    Route::get('/labdip/index', 'LabDipController@index')->name('labdip.index');
    Route::post('/labdip/store', 'LabDipController@store')->name('labdip.store');
    Route::get('labdip/colors/{id}/edit', 'LabDipController@edit')->name('labdip.edit');
    Route::post('/labdip/{id}/editsave', 'LabDipController@editsave')->name('labdip.editsave');

    Route::get('/labdip/approve', 'LabDipController@approve')->name('labdip.approve');
    Route::get('/labdip/reject', 'LabDipController@reject')->name('labdip.reject');
    Route::get('/labdip/rejectlog', 'LabDipController@rejectlog')->name('labdip.rejectlog');

    Route::get('/labdip/exfactory/', 'LabDipController@exfactory')->name('labdip.exfactory');
    Route::get('/labdip/colors/', 'LabDipController@colors')->name('labdip.colors');
    Route::get('/Labdip/color/', 'LabDipController@color_info')->name('labdip.color');
    Route::get('/labdip/exf', 'LabDipController@exf')->name('labdip.exf');

    Route::get('/seal01/create', 'SealOneController@create')->name('seal01.create');
    Route::post('/seal01/save', 'SealOneController@store')->name('seal01.store');
    Route::get('/seal01/exfactory/', 'SealOneController@exfactory')->name('seal01.exfactory');
    Route::get('/seal01/', 'SealOneController@index')->name('seal01.index');
    Route::get('/seal01/edit', 'SealOneController@edit')->name('seal101.edit');
    Route::post('/seal101/edit', 'SealOneController@editsave')->name('seal101.editsave');

    Route::get('/seal01/approve', 'SealOneController@approve')->name('seal01.approve');
    Route::get('/seal01/reject', 'SealOneController@reject')->name('seal01.reject');
    Route::get('/seal01/rejectlog', 'SealOneController@rejectlog')->name('seal01.rejectlog');

    Route::get('/seal02/create', 'SealTwoController@create')->name('seal02.create');
    Route::get('/seal02/', 'SealTwoController@index')->name('seal02.index');
    Route::post('/seal02/save', 'SealTwoController@store')->name('seal02.store');
    Route::get('/seal02/edit', 'SealTwoController@edit')->name('seal02.edit');
    Route::post('/seal102/edit', 'SealTwoController@editsave')->name('seal02.editsave');

    Route::get('/seal02/approve', 'SealTwoController@approve')->name('seal02.approve');
    Route::get('/seal02/reject', 'SealTwoController@reject')->name('seal02.reject');
    Route::get('/seal02/rejectlog', 'SealTwoController@rejectlog')->name('seal02.rejectlog');

    //Route::get('/seal04/create','LabDipController@tcreate')->name('seal04.create');
    Route::get('/feedin/create', 'FeedInTargetController@create')->name('feedin.create');
    Route::post('/feedin/store', 'FeedInTargetController@store')->name('feedin.store');
    Route::get('/feedin', 'FeedInTargetController@index')->name('feedin.index');
    Route::get('feedin/edit', 'FeedInTarget@edit')->name('feedin.edit');

    Route::get('/seal03/create', 'SealThreeController@create')->name('seal03.create');
    Route::get('/seal03/', 'SealThreeController@index')->name('seal03.index');
    Route::post('/seal03/save', 'SealThreeController@store')->name('seal03.store');
    Route::get('/seal03/edit', 'SealThreeController@edit')->name('seal03.edit');
    Route::post('/seal103/edit', 'SealThreeController@editsave')->name('seal03.editsave');

    Route::get('/seal03/approve', 'SealThreeController@approve')->name('seal03.approve');
    Route::get('/seal03/reject', 'SealThreeController@reject')->name('seal03.reject');
    Route::get('/seal03/rejectlog', 'SealThreeController@rejectlog')->name('seal03.rejectlog');

    Route::get('/seal04/create', 'SealFourController@create')->name('seal04.create');
    Route::get('/seal04/', 'SealFourController@index')->name('seal04.index');
    Route::post('/seal04/save', 'SealFourController@store')->name('seal04.store');
    Route::get('/seal04/edit', 'SealFourController@edit')->name('seal04.edit');
    Route::post('/seal104/edit', 'SealFourController@editsave')->name('seal04.editsave');

    Route::get('/seal04/approve', 'SealFourController@approve')->name('seal04.approve');
    Route::get('/seal04/reject', 'SealFourController@reject')->name('seal04.reject');
    Route::get('/seal04/rejectlog', 'SealFourController@rejectlog')->name('seal04.rejectlog');
});

/**========================= Shipping Routes ================================**/

Route::group(['prefix'=>'shipment'], function () {
    //Route::get('/','shipping\ShipmentProcessController@dashboard')->name('shipment.dashboard');
    Route::get('/index', 'shipping\ShipmentProcessController@index')->name('shipment.index');
    Route::get('/vessel/approval', 'shipping\ShipmentProcessController@vessel_approval')->name('vessel.approval');
    Route::post('/ship', 'shipping\ShipmentProcessController@ex_fact')->name('shipment.exfact');
    Route::post('/exfactory', 'shipping\ShipmentProcessController@store_exfactory')->name('shipment.exfact.store');
    Route::post('/vesselinfo', 'shipping\ShipmentProcessController@store_vesselinfo')->name('shipment.vesselinfo.store');
    Route::post('/revised_list', 'shipping\ShipmentProcessController@revised_exfactory')->name('shipment.revised_exfactory');
    Route::get('/vessel/list', 'shipping\ShipmentProcessController@vessel_list')->name('vessel.list');
    Route::post('/get/shipment', 'shipping\ShipmentProcessController@get_shipmentinfo')->name('shipment.info');
    Route::post('/update/oktoship', 'shipping\ShipmentProcessController@ok_ship')->name('shipment.oktoship');
});

Route::group(['prefix'=>'shipment-module'], function () {
    Route::get('/', 'shipping\ShipmentModuleController@dashboard')->name('shipment.dashboard');
    Route::get('/index', 'shipping\ShipmentModuleController@index')->name('shipmodule.index');
    Route::post('/info/store', 'shipping\ShipmentModuleController@shipment_info')->name('shipmodule.store');
    Route::post('/com/store', 'shipping\ShipmentModuleController@complete_ship')->name('shipmodule.complete');
});
