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
Route::get('login', function()
{
    return View::make('auth.login');
})->name('login');

Route::post('login', function()
{
    $credentials = Input::only('email', 'password');

    if ( ! Auth::attempt($credentials))
    {
        return Redirect::back()->withMessage('Invalid credentials');
    }

    if (Auth::user()->hasRole('hradmin'))
    {
        return Redirect::to('hr/dashboard');
    }elseif (Auth::user()->hasRole('employee'))
    {
        return Redirect::to('/home');
    }elseif (Auth::user()->hasRole('dcp'))
    {
        return Redirect::to('dcp/dashboard');
    }
    elseif(Auth::user()->hasRole('cmp')) {
        return redirect(route('cmpHome'));

    }

    return Redirect::to('/');
})->name('login');


Route::get('/home', 'EmployeeController@index')->name('home')->middleware('auth');
Route::get('/checkin', 'CheckInOutController@checkin')->name('checkin')->middleware('auth');
Route::get('/checkout', 'CheckInOutController@checkout')->name('checkout')->middleware('auth');
//for human resource routing
Route::group(['prefix' => 'hr',  'middleware' => ['auth']], function()
{
  Route::get('dashboard','HrDashboardController@index')->name('hrdashboard');
  Route::get('takealeave','HrLeaveController@takealeave')->name('takealeave');
  Route::get('leavehistory','HrLeaveController@leavehistory')->name('leavehistory');
  Route::get('holidaycalender','HrLeaveController@holidaycalender')->name('holidaycalender');
//shahin vai

    Route::get('holidays', 'HrHolidayListController@just_show');
    Route::get('jsonholidays', 'HrHolidayListController@index')->name('holiday.all');
    Route::post('holiday/add', 'HrHolidayListController@saveholiday')->name('holiday.add');
    Route::post('holiday/edit', 'HrHolidayListController@editholiday')->name('holiday.edit');
    Route::post('holiday/delete', 'HrHolidayListController@deleteholiday')->name('holiday.delete');


  Route::resources([
    'emptype' => 'HrEmpController',
    'section' => 'HrSectionController',
    'department' => 'HrDepartmentController',
    'designation'=>'HrDesignationController',
    'profile'=>'ProfileController',
    'jobopenning' => 'HrJobOpenningController',
    'jobapplicant' => 'JobapplicantController',
    // 'offerleter'=> 'HrJobOfferController',
    // 'leaveapplication'=> 'HrLeaveApplicationController',
     'leavetype'=> 'HrLeaveTypeController',
     'holidaylist'=> 'HrHolidayListController',
    // 'leaveallocation'=> 'HrLeaveAllocationController',
    // 'attendance'=> 'HrAttendanceController',

   ]);


});


/*
================================================================================
DCP All Route's
================================================================================
*/
Route::group(['prefix'=>'dcp','middleware'=>'auth'],function() {
    Route::resources([
      'season' => 'DcpSeasonController',
      'supplier' => 'DcpSupplierController',
       'brand' => 'DcpBrandController',
       'productstype'=>'DcpProductstypeController',
       'productcategory'=>'DcpProductCategoryController',
       'label' => 'DcpLabelController',
       'courier' => 'DcpCourierController'

  ]);
  Route::get('dashboard','DcpController@index')->name('dcpdashboard');

});

Route::group(['prefix'=>'dcp','middleware'=>'auth'],function(){

//step-one routelist
  Route::get('/stepone','DcpsteponeController@index')->name('dcpsteponeindex');
  Route::get('/stepone/create','DcpsteponeController@create')->name('dcpsteponecreate');
  Route::post('/stepone','DcpsteponeController@store')->name('dcpstepone');
  Route::get('/stepone/{id}/edit','DcpsteponeController@edit')->name('dcpsteponedit');
  Route::match(array('PUT','PATCH'),'/stepone/update/{id}','DcpsteponeController@update')->name('dcpsteponeupdate');
  Route::delete('/stepone/{id}/delete','DcpsteponeController@destroy')->name('dcpdestroy');
  Route::post('/proto/check','DcpsteponeController@checkproto')->name('proto.unique');
  //step-two routelist

  Route::get('/steptwo','DcpStepTwoController@list')->name('dcpsteptwolist');
  Route::get('/steptwo/create','DcpStepTwoController@index')->name('getdcpsteptwo');
  Route::post('/steptwo/store','DcpStepTwoController@store')->name('dcpsteptwo');
  Route::get('/steptwo/{id}/edit','DcpStepTwoController@edit')->name('dcpsteptwoedit');
  Route::match(array('PUT','PATCH'),'/steptwo/update/{id}','DcpStepTwoController@update')->name('dcpsteptwoupdate');
  Route::delete('/steptwo/{id}/delete','DcpStepTwoController@destroy')->name('dcpsteptwodestroy');
  Route::post('/steptwo/getinfo','DcpStepTwoController@getinfo')->name('dcpgetinfo');

  Route::get('/steptwo/{id}/approve','DcpStepTwoController@approve')->name('dcpapprove');

  Route::get('/excel/export','DcpStepTwoController@export')->name('excelexport');

  Route::get('/approved/list','DcpStepTwoController@approved')->name('approvedlist');


});

/*
================================================================================
Order-Process Route's
================================================================================
*/

Route::group(['prefix'=>'order'],function(){
   Route::get('/process/index','OrderProcessController@index')->name('orderprocess.index');
   Route::get('/process/create','OrderProcessController@create')->name('orderprocess.create');
   Route::post('/process/store','OrderProcessController@store')->name('orderprocess.store');
   Route::get('/process/{id}/edit','OrderProcessController@edit')->name('orderprocess.edit');
   Route::match(array('PUT','PATCH'),'/process/update/{id}','OrderProcessController@update')->name('orderprocess.update');
   Route::delete('/process/{id}/delete','OrderProcessController@delete')->name('orderprocess.delete');

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




Route::group(['prefix'=>'vacancy','middleware'=>'guest'],function() {
    Route::get('list','VacancyController@index')->name('vacancylist');
    Route::get('apply','VacancyController@apply')->name('apply');
    Route::get('show/{id}','VacancyController@show')->name('vacancyshow');
    Route::post('saveapply','VacancyController@saveapply')->name('saveapply');
});


//Account module route
Route::group(['prefix' => 'account', 'middleware' => 'auth'], function () {

    Route::get('/', function(){
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


    Route::get('/head-reports2', 'Account\ReportController@show_head_report2')->name('head.report2');;
    Route::post('/head-reports/show2', 'Account\ReportController@show_head_report_show2')->name('head.report.show2');



    Route::get('/pettycash-reports/', 'Account\ReportController@show_balance_report')->name('balance_report_show');
    Route::post('/pettycash-reports/', 'Account\ReportController@show_balance_report_show')->name('balance_report');

});

Route::any ( '/search', 'ProfileController@searchprofile')->name('search.profile');
