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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'DashboardController@pc_members')->name('home');

Route::group(['prefix' => 'dashboard'], function () {
	Route::get('/pc_members', 'DashboardController@pc_members')->name('dashboard.pc_members');
	Route::get('/pc_partners', 'DashboardController@pc_partners')->name('dashboard.pc_partners');

	Route::get('/members_reports', 'DashboardController@members_reports')->name('dashboard.members_reports');
	Route::get('/members_labels', 'DashboardController@members_labels')->name('dashboard.members_labels');
	Route::get('/members', 'DashboardController@members')->name('dashboard.members');

	Route::get('/partners_reports', 'DashboardController@partners_reports')->name('dashboard.partners_reports');
	Route::get('/partners_labels', 'DashboardController@partners_labels')->name('dashboard.partners_labels');
	Route::get('/partners', 'DashboardController@partners')->name('dashboard.partners');
});

Route::group(['middleware' => 'auth'], function() {

	Route::group(['prefix' => 'users'], function () {
		Route::get('/{id}/enable', 'UsersController@enable')->name('users.enable');
		Route::get('/{id}/disable', 'UsersController@disable')->name('users.disable');
		Route::get('/', 'UsersController@index')->name('users');
		Route::get('/create', 'UsersController@create')->name('users.create');
		Route::get('/{id}/show', 'UsersController@show')->name('users.show');
		Route::get('/{id}/edit', 'UsersController@edit')->name('users.edit');
		Route::get('/{id}/destroy', 'UsersController@destroy')->name('users.destroy');
		Route::put('/{id}/update', 'UsersController@update')->name('users.update');
		Route::post('/', 'UsersController@store')->name('users.store');

		Route::get('/profile', 'UsersController@profile')->name('users.profile');
		Route::put('/profile', 'UsersController@avatar')->name('users.avatar');

		Route::post('/{id}/roles', 'UsersController@role_store')->name('users_roles.store');
		Route::get('/{user}/roles/{role}/destroy', 'UsersController@role_destroy')->name('users_roles.destroy');
	});

	Route::group(['prefix' => 'roles'], function () {
		Route::get('/', 'RolesController@index')->name('roles');
		Route::get('/create', 'RolesController@create')->name('roles.create');
		Route::get('/{id}/show', 'RolesController@show')->name('roles.show');
		Route::get('/{id}/edit', 'RolesController@edit')->name('roles.edit');
		Route::get('/{id}/destroy', 'RolesController@destroy')->name('roles.destroy');
		Route::put('/{id}/update', 'RolesController@update')->name('roles.update');
		Route::post('/', 'RolesController@store')->name('roles.store');

		Route::post('/{id}/users', 'RolesController@user_store')->name('roles_users.store');
		Route::get('/{role}/users/{user}/destroy', 'RolesController@user_destroy')->name('roles_users.destroy');

		Route::post('/{id}/permissions', 'RolesController@permission_store')->name('roles_permissions.store');
		Route::get('/{id}/permissions/{permission}/destroy', 'RolesController@permission_destroy')->name('roles_permissions.destroy');
	});

	Route::group(['prefix' => 'states'], function () {
		Route::get('/', 'StatesController@index')->name('states');
		Route::get('/create', 'StatesController@create')->name('states.create');
		Route::get('/{id}/show', 'StatesController@show')->name('states.show');
		Route::get('/{id}/edit', 'StatesController@edit')->name('states.edit');
		Route::get('/{id}/destroy', 'StatesController@destroy')->name('states.destroy');
		Route::put('/{id}/update', 'StatesController@update')->name('states.update');
		Route::post('/', 'StatesController@store')->name('states.store');
	});

	Route::group(['prefix' => 'regions'], function () {
		Route::get('/', 'RegionsController@index')->name('regions');
		Route::get('/create', 'RegionsController@create')->name('regions.create');
		Route::get('/{id}/show', 'RegionsController@show')->name('regions.show');
		Route::get('/{id}/edit', 'RegionsController@edit')->name('regions.edit');
		Route::get('/{id}/destroy', 'RegionsController@destroy')->name('regions.destroy');
		Route::get('/{id}/restore', 'RegionsController@restore')->name('regions.restore');
		Route::put('/{id}/update', 'RegionsController@update')->name('regions.update');
		Route::post('/', 'RegionsController@store')->name('regions.store');
	});

	Route::group(['prefix' => 'cities'], function () {
		Route::get('/', 'CitiesController@index')->name('cities');
		Route::get('/create', 'CitiesController@create')->name('cities.create');
		Route::get('/{id}/show', 'CitiesController@show')->name('cities.show');
		Route::get('/{id}/edit', 'CitiesController@edit')->name('cities.edit');
		Route::get('/{id}/destroy', 'CitiesController@destroy')->name('cities.destroy');
		Route::get('/{id}/restore', 'CitiesController@restore')->name('cities.restore');
		Route::put('/{id}/update', 'CitiesController@update')->name('cities.update');
		Route::post('/', 'CitiesController@store')->name('cities.store');
	});

	Route::group(['prefix' => 'plans'], function () {
		Route::get('/', 'PlansController@index')->name('plans');
		Route::get('/create', 'PlansController@create')->name('plans.create');
		Route::get('/{id}/show', 'PlansController@show')->name('plans.show');
		Route::get('/{id}/edit', 'PlansController@edit')->name('plans.edit');
		Route::get('/{id}/destroy', 'PlansController@destroy')->name('plans.destroy');
		Route::put('/{id}/update', 'PlansController@update')->name('plans.update');
		Route::post('/', 'PlansController@store')->name('plans.store');
	});

	Route::group(['prefix' => 'member_statuses'], function () {
		Route::get('/', 'MemberStatusesController@index')->name('member_statuses');
		Route::get('/create', 'MemberStatusesController@create')->name('member_statuses.create');
		Route::get('/{id}/show', 'MemberStatusesController@show')->name('member_statuses.show');
		Route::get('/{id}/edit', 'MemberStatusesController@edit')->name('member_statuses.edit');
		Route::get('/{id}/destroy', 'MemberStatusesController@destroy')->name('member_statuses.destroy');
		Route::put('/{id}/update', 'MemberStatusesController@update')->name('member_statuses.update');
		Route::post('/', 'MemberStatusesController@store')->name('member_statuses.store');
	});

	Route::group(['prefix' => 'member_status_reasons'], function () {
		Route::get('/', 'MemberStatusReasonsController@index')->name('member_status_reasons');
		Route::get('/create', 'MemberStatusReasonsController@create')->name('member_status_reasons.create');
		Route::get('/{id}/show', 'MemberStatusReasonsController@show')->name('member_status_reasons.show');
		Route::get('/{id}/edit', 'MemberStatusReasonsController@edit')->name('member_status_reasons.edit');
		Route::get('/{id}/destroy', 'MemberStatusReasonsController@destroy')->name('member_status_reasons.destroy');
		Route::put('/{id}/update', 'MemberStatusReasonsController@update')->name('member_status_reasons.update');
		Route::post('/', 'MemberStatusReasonsController@store')->name('member_status_reasons.store');
	});

	Route::group(['prefix' => 'genders'], function () {
		Route::get('/', 'GendersController@index')->name('genders');
		Route::get('/create', 'GendersController@create')->name('genders.create');
		Route::get('/{id}/show', 'GendersController@show')->name('genders.show');
		Route::get('/{id}/edit', 'GendersController@edit')->name('genders.edit');
		Route::get('/{id}/destroy', 'GendersController@destroy')->name('genders.destroy');
		Route::put('/{id}/update', 'GendersController@update')->name('genders.update');
		Route::post('/', 'GendersController@store')->name('genders.store');
	});

	Route::group(['prefix' => 'partner_sectors'], function () {
		Route::get('/', 'PartnerSectorsController@index')->name('partner_sectors');
		Route::get('/create', 'PartnerSectorsController@create')->name('partner_sectors.create');
		Route::get('/{id}/show', 'PartnerSectorsController@show')->name('partner_sectors.show');
		Route::get('/{id}/edit', 'PartnerSectorsController@edit')->name('partner_sectors.edit');
		Route::get('/{id}/destroy', 'PartnerSectorsController@destroy')->name('partner_sectors.destroy');
		Route::get('/{id}/restore', 'PartnerSectorsController@restore')->name('partner_sectors.restore');
		Route::put('/{id}/update', 'PartnerSectorsController@update')->name('partner_sectors.update');
		Route::post('/', 'PartnerSectorsController@store')->name('partner_sectors.store');
	});

	Route::group(['prefix' => 'partner_types'], function () {
		Route::get('/', 'PartnerTypesController@index')->name('partner_types');
		Route::get('/create', 'PartnerTypesController@create')->name('partner_types.create');
		Route::get('/{id}/show', 'PartnerTypesController@show')->name('partner_types.show');
		Route::get('/{id}/edit', 'PartnerTypesController@edit')->name('partner_types.edit');
		Route::get('/{id}/destroy', 'PartnerTypesController@destroy')->name('partner_types.destroy');
		Route::get('/{id}/restore', 'PartnerTypesController@restore')->name('partner_types.restore');
		Route::put('/{id}/update', 'PartnerTypesController@update')->name('partner_types.update');
		Route::post('/', 'PartnerTypesController@store')->name('partner_types.store');
	});

	Route::group(['prefix' => 'partners'], function () {
		Route::get('/', 'PartnersController@index')->name('partners');
		Route::get('/search', 'PartnersController@search')->name('partners.search');
		Route::post('/search_results', 'PartnersController@search_results')->name('partners.search_results');
		Route::get('/search_results_back', 'PartnersController@search_results_back')->name('partners.search_results_back');
		Route::get('/create', 'PartnersController@create')->name('partners.create');
		Route::get('/{id}/show', 'PartnersController@show')->name('partners.show');
		Route::get('/{id}/edit', 'PartnersController@edit')->name('partners.edit');
		Route::get('/{id}/destroy', 'PartnersController@destroy')->name('partners.destroy');
		Route::put('/{id}/update', 'PartnersController@update')->name('partners.update');
		Route::post('/', 'PartnersController@store')->name('partners.store');
	});

	Route::group(['prefix' => 'patrimonial_statuses'], function () {
		Route::get('/', 'PatrimonialStatusesController@index')->name('patrimonial_statuses');
		Route::get('/create', 'PatrimonialStatusesController@create')->name('patrimonial_statuses.create');
		Route::get('/{id}/show', 'PatrimonialStatusesController@show')->name('patrimonial_statuses.show');
		Route::get('/{id}/edit', 'PatrimonialStatusesController@edit')->name('patrimonial_statuses.edit');
		Route::get('/{id}/destroy', 'PatrimonialStatusesController@destroy')->name('patrimonial_statuses.destroy');
		Route::put('/{id}/update', 'PatrimonialStatusesController@update')->name('patrimonial_statuses.update');
		Route::post('/', 'PatrimonialStatusesController@store')->name('patrimonial_statuses.store');
	});

	Route::group(['prefix' => 'patrimonial_types'], function () {
		Route::get('/', 'PatrimonialTypesController@index')->name('patrimonial_types');
		Route::get('/create', 'PatrimonialTypesController@create')->name('patrimonial_types.create');
		Route::get('/{id}/show', 'PatrimonialTypesController@show')->name('patrimonial_types.show');
		Route::get('/{id}/edit', 'PatrimonialTypesController@edit')->name('patrimonial_types.edit');
		Route::get('/{id}/destroy', 'PatrimonialTypesController@destroy')->name('patrimonial_types.destroy');
		Route::get('/{id}/restore', 'PatrimonialTypesController@restore')->name('patrimonial_types.restore');
		Route::put('/{id}/update', 'PatrimonialTypesController@update')->name('patrimonial_types.update');
		Route::post('/', 'PatrimonialTypesController@store')->name('patrimonial_types.store');
	});

	Route::group(['prefix' => 'patrimonial_sub_types'], function () {
		Route::get('/', 'PatrimonialSubTypesController@index')->name('patrimonial_sub_types');
		Route::get('/create', 'PatrimonialSubTypesController@create')->name('patrimonial_sub_types.create');
		Route::get('/{id}/show', 'PatrimonialSubTypesController@show')->name('patrimonial_sub_types.show');
		Route::get('/{id}/edit', 'PatrimonialSubTypesController@edit')->name('patrimonial_sub_types.edit');
		Route::get('/{id}/destroy', 'PatrimonialSubTypesController@destroy')->name('patrimonial_sub_types.destroy');
		Route::get('/{id}/restore', 'PatrimonialSubTypesController@restore')->name('patrimonial_sub_types.restore');
		Route::put('/{id}/update', 'PatrimonialSubTypesController@update')->name('patrimonial_sub_types.update');
		Route::post('/', 'PatrimonialSubTypesController@store')->name('patrimonial_sub_types.store');
	});

	Route::group(['prefix' => 'patrimonial_brands'], function () {
		Route::get('/', 'PatrimonialBrandsController@index')->name('patrimonial_brands');
		Route::get('/create', 'PatrimonialBrandsController@create')->name('patrimonial_brands.create');
		Route::get('/{id}/show', 'PatrimonialBrandsController@show')->name('patrimonial_brands.show');
		Route::get('/{id}/edit', 'PatrimonialBrandsController@edit')->name('patrimonial_brands.edit');
		Route::get('/{id}/destroy', 'PatrimonialBrandsController@destroy')->name('patrimonial_brands.destroy');
		Route::get('/{id}/restore', 'PatrimonialBrandsController@restore')->name('patrimonial_brands.restore');
		Route::put('/{id}/update', 'PatrimonialBrandsController@update')->name('patrimonial_brands.update');
		Route::post('/', 'PatrimonialBrandsController@store')->name('patrimonial_brands.store');
	});

	Route::group(['prefix' => 'patrimonial_models'], function () {
		Route::get('/', 'PatrimonialModelsController@index')->name('patrimonial_models');
		Route::get('/create', 'PatrimonialModelsController@create')->name('patrimonial_models.create');
		Route::get('/{id}/show', 'PatrimonialModelsController@show')->name('patrimonial_models.show');
		Route::get('/{id}/edit', 'PatrimonialModelsController@edit')->name('patrimonial_models.edit');
		Route::get('/{id}/destroy', 'PatrimonialModelsController@destroy')->name('patrimonial_models.destroy');
		Route::get('/{id}/restore', 'PatrimonialModelsController@restore')->name('patrimonial_models.restore');
		Route::put('/{id}/update', 'PatrimonialModelsController@update')->name('patrimonial_models.update');
		Route::post('/', 'PatrimonialModelsController@store')->name('patrimonial_models.store');
	});

	Route::group(['prefix' => 'patrimonial_movement_types'], function () {
		Route::get('/', 'PatrimonialMovementTypesController@index')->name('patrimonial_movement_types');
		Route::get('/create', 'PatrimonialMovementTypesController@create')->name('patrimonial_movement_types.create');
		Route::get('/{id}/show', 'PatrimonialMovementTypesController@show')->name('patrimonial_movement_types.show');
		Route::get('/{id}/edit', 'PatrimonialMovementTypesController@edit')->name('patrimonial_movement_types.edit');
		Route::get('/{id}/destroy', 'PatrimonialMovementTypesController@destroy')->name('patrimonial_movement_types.destroy');
		Route::put('/{id}/update', 'PatrimonialMovementTypesController@update')->name('patrimonial_movement_types.update');
		Route::post('/', 'PatrimonialMovementTypesController@store')->name('patrimonial_movement_types.store');
	});

	Route::group(['prefix' => 'patrimonial_requests'], function () {
		Route::get('/', 'PatrimonialRequestsController@index')->name('patrimonial_requests');
		Route::get('/create', 'PatrimonialRequestsController@create')->name('patrimonial_requests.create');
		Route::get('/{id}/show', 'PatrimonialRequestsController@show')->name('patrimonial_requests.show');
		Route::get('/{id}/edit', 'PatrimonialRequestsController@edit')->name('patrimonial_requests.edit');
		Route::get('/{id}/destroy', 'PatrimonialRequestsController@destroy')->name('patrimonial_requests.destroy');
		Route::put('/{id}/update', 'PatrimonialRequestsController@update')->name('patrimonial_requests.update');
		Route::post('/', 'PatrimonialRequestsController@store')->name('patrimonial_requests.store');

		Route::get('/{id}/addItem/{patrimonial_id}', 'PatrimonialRequestsController@addItem')->name('patrimonial_requests.addItem');
		Route::get('/{id}/removeItem/{patrimonial_id}', 'PatrimonialRequestsController@removeItem')->name('patrimonial_requests.removeItem');

		Route::get('/{id}/close', 'PatrimonialRequestsController@close')->name('patrimonial_requests.close');
		Route::put('/{id}/confirm', 'PatrimonialRequestsController@confirm')->name('patrimonial_requests.confirm');

		Route::get('/{id}/report', 'PatrimonialRequestsController@report')->name('patrimonial_requests.report');
	});

	Route::group(['prefix' => 'payment_statuses'], function () {
		Route::get('/', 'PaymentStatusesController@index')->name('payment_statuses');
		Route::get('/create', 'PaymentStatusesController@create')->name('payment_statuses.create');
		Route::get('/{id}/show', 'PaymentStatusesController@show')->name('payment_statuses.show');
		Route::get('/{id}/edit', 'PaymentStatusesController@edit')->name('payment_statuses.edit');
		Route::get('/{id}/destroy', 'PaymentStatusesController@destroy')->name('payment_statuses.destroy');
		Route::put('/{id}/update', 'PaymentStatusesController@update')->name('payment_statuses.update');
		Route::post('/', 'PaymentStatusesController@store')->name('payment_statuses.store');
	});

	Route::group(['prefix' => 'payment_reasons'], function () {
		Route::get('/', 'PaymentReasonsController@index')->name('payment_reasons');
		Route::get('/create', 'PaymentReasonsController@create')->name('payment_reasons.create');
		Route::get('/{id}/show', 'PaymentReasonsController@show')->name('payment_reasons.show');
		Route::get('/{id}/edit', 'PaymentReasonsController@edit')->name('payment_reasons.edit');
		Route::get('/{id}/destroy', 'PaymentReasonsController@destroy')->name('payment_reasons.destroy');
		Route::put('/{id}/update', 'PaymentReasonsController@update')->name('payment_reasons.update');
		Route::post('/', 'PaymentReasonsController@store')->name('payment_reasons.store');
	});

	Route::group(['prefix' => 'payment_methods'], function () {
		Route::get('/', 'PaymentMethodsController@index')->name('payment_methods');
		Route::get('/create', 'PaymentMethodsController@create')->name('payment_methods.create');
		Route::get('/{id}/show', 'PaymentMethodsController@show')->name('payment_methods.show');
		Route::get('/{id}/edit', 'PaymentMethodsController@edit')->name('payment_methods.edit');
		Route::get('/{id}/destroy', 'PaymentMethodsController@destroy')->name('payment_methods.destroy');
		Route::put('/{id}/update', 'PaymentMethodsController@update')->name('payment_methods.update');
		Route::post('/', 'PaymentMethodsController@store')->name('payment_methods.store');
	});

	Route::group(['prefix' => 'meeting_types'], function () {
		Route::get('/', 'MeetingTypesController@index')->name('meeting_types');
		Route::get('/create', 'MeetingTypesController@create')->name('meeting_types.create');
		Route::get('/{id}/show', 'MeetingTypesController@show')->name('meeting_types.show');
		Route::get('/{id}/edit', 'MeetingTypesController@edit')->name('meeting_types.edit');
		Route::get('/{id}/destroy', 'MeetingTypesController@destroy')->name('meeting_types.destroy');
		Route::put('/{id}/update', 'MeetingTypesController@update')->name('meeting_types.update');
		Route::post('/', 'MeetingTypesController@store')->name('meeting_types.store');
	});

	Route::group(['prefix' => '/accounting_accounts'], function () {
		Route::get('/', 'AccountingAccountsController@index')->name('accounting_accounts');
		Route::get('/create', 'AccountingAccountsController@create')->name('accounting_accounts.create');
		Route::get('/{id}/show', 'AccountingAccountsController@show')->name('accounting_accounts.show');
		Route::get('/{id}/edit', 'AccountingAccountsController@edit')->name('accounting_accounts.edit');
		Route::get('/{id}/destroy', 'AccountingAccountsController@destroy')->name('accounting_accounts.destroy');
		Route::put('/{id}/update', 'AccountingAccountsController@update')->name('accounting_accounts.update');
		Route::post('/', 'AccountingAccountsController@store')->name('accounting_accounts.store');
	});


	Route::group(['prefix' => '/balance_sheets'], function () {
		Route::get('/', 'BalanceSheetsController@search')->name('balance_sheets.search');
		Route::post('/search_results', 'BalanceSheetsController@search_results')->name('balance_sheets.search_results');
	});

	Route::group(['prefix' => '/balance_sheet_previouses'], function () {
		Route::get('/', 'BalanceSheetPreviousesController@index')->name('balance_sheet_previouses');
		Route::get('/create', 'BalanceSheetPreviousesController@create')->name('balance_sheet_previouses.create');
		Route::get('/{id}/show', 'BalanceSheetPreviousesController@show')->name('balance_sheet_previouses.show');
		Route::get('/{id}/edit', 'BalanceSheetPreviousesController@edit')->name('balance_sheet_previouses.edit');
		Route::get('/{id}/destroy', 'BalanceSheetPreviousesController@destroy')->name('balance_sheet_previouses.destroy');
		Route::put('/{id}/update', 'BalanceSheetPreviousesController@update')->name('balance_sheet_previouses.update');
		Route::post('/', 'BalanceSheetPreviouses@store')->name('balance_sheet_previouses.store');
		Route::get('/search', 'BalanceSheetPreviousesControllerController@search')->name('balance_sheet_previouses.search'); 
		Route::post('/search_results', 'BalanceSheetPreviousesController@search_results')->name('balance_sheet_previouses.search_results');      
		Route::post('/search_results_back', 'BalanceSheetPreviousesController@search_results_back')->name('balance_sheet_previouses.search_results_back'); 
	});

	Route::group(['prefix' => '/material_units'], function () {
		Route::get('/', 'MaterialUnitsController@index')->name('material_units');
		Route::get('/create', 'MaterialUnitsController@create')->name('material_units.create');
		Route::get('/{id}/show', 'MaterialUnitsController@show')->name('material_units.show');
		Route::get('/{id}/edit', 'MaterialUnitsController@edit')->name('material_units.edit');
		Route::get('/{id}/destroy', 'MaterialUnitsController@destroy')->name('material_units.destroy');
		Route::get('/{id}/restore', 'MaterialUnitsController@restore')->name('material_units.restore');
		Route::put('/{id}/update', 'MaterialUnitsController@update')->name('material_units.update');
		Route::post('/', 'MaterialUnitsController@store')->name('material_units.store');
	});

	Route::group(['prefix' => 'affiliated_societies'], function () {
		Route::get('/', 'AffiliatedSocietiesController@index')->name('affiliated_societies');
		Route::get('/create', 'AffiliatedSocietiesController@create')->name('affiliated_societies.create');
		Route::get('/{id}/show', 'AffiliatedSocietiesController@show')->name('affiliated_societies.show');
		Route::get('/{id}/edit', 'AffiliatedSocietiesController@edit')->name('affiliated_societies.edit');
		Route::get('/{id}/destroy', 'AffiliatedSocietiesController@destroy')->name('affiliated_societies.destroy');
		Route::put('/{id}/update', 'AffiliatedSocietiesController@update')->name('affiliated_societies.update');
		Route::post('/', 'AffiliatedSocietiesController@store')->name('affiliated_societies.store');
	});

	Route::group(['prefix' => '/management_units'], function () {
		Route::get('/', 'ManagementUnitsController@index')->name('management_units');
		Route::get('/create', 'ManagementUnitsController@create')->name('management_units.create');
		Route::get('/{id}/show', 'ManagementUnitsController@show')->name('management_units.show');
		Route::get('/{id}/edit', 'ManagementUnitsController@edit')->name('management_units.edit');
		Route::get('/{id}/destroy', 'ManagementUnitsController@destroy')->name('management_units.destroy');
		Route::get('/{id}/restore', 'ManagementUnitsController@restore')->name('management_units.restore');
		Route::put('/{id}/update', 'ManagementUnitsController@update')->name('management_units.update');
		Route::post('/', 'ManagementUnitsController@store')->name('management_units.store');
	});
});

Route::group(['prefix' => 'meetings'], function () {
	Route::get('/', 'MeetingsController@index')->name('meetings');
	Route::get('/create', 'MeetingsController@create')->name('meetings.create');
	Route::get('/{id}/show', 'MeetingsController@show')->name('meetings.show');
	Route::get('/{id}/edit', 'MeetingsController@edit')->name('meetings.edit');
	Route::get('/{id}/destroy', 'MeetingsController@destroy')->name('meetings.destroy');
	Route::get('/{id}/restore', 'MeetingsController@restore')->name('meetings.restore');
	Route::put('/{id}/update', 'MeetingsController@update')->name('meetings.update');
	Route::post('/', 'MeetingsController@store')->name('meetings.store');

	Route::get('/{id}/attendance_list_reports', 'MeetingsController@attendance_list_reports')->name('meetings.attendance_list_reports');

	#Route::get('/members', 'MeetingMembersController@index')->name('meeting_members');
	Route::get('/{id}/members/create', 'MeetingMembersController@create')->name('meeting_members.create');
	Route::get('/{id}/employees/create', 'MeetingEmployeesController@create')->name('meeting_employees.create');
	Route::get('/{id}/partners/create', 'MeetingPartnersController@create')->name('meeting_partners.create');
	#Route::get('/{id}/members/show', 'MeetingMembersController@show')->name('meeting_members.show');
	#Route::get('/{id}/members/edit', 'MeetingMembersController@edit')->name('meeting_members.edit');
	#Route::get('/{id}/members/destroy', 'MeetingMembersController@destroy')->name('meeting_members.destroy');
	#Route::get('/{id}/members/restore', 'MeetingMembersController@restore')->name('meeting_members.restore');
	#Route::put('/{id}/members/update', 'MeetingMembersController@update')->name('meeting_members.update');
	#Route::post('/{id}/members', 'MeetingMembersController@store')->name('meeting_members.store');
});

Route::group(['prefix' => 'meeting_members'], function () {
	Route::get('/', 'MeetingMembersController@index')->name('meeting_members');
	#Route::get('/{id}/create', 'MeetingMembersController@create')->name('meeting_members.create');
	Route::get('/{id}/show', 'MeetingMembersController@show')->name('meeting_members.show');
	Route::get('/{id}/edit', 'MeetingMembersController@edit')->name('meeting_members.edit');
	Route::get('/{id}/destroy', 'MeetingMembersController@destroy')->name('meeting_members.destroy');
	Route::get('/{id}/restore', 'MeetingMembersController@restore')->name('meeting_members.restore');
	Route::put('/{id}/update', 'MeetingMembersController@update')->name('meeting_members.update');
	Route::post('/', 'MeetingMembersController@store')->name('meeting_members.store');
});

Route::group(['prefix' => 'meeting_employees'], function () {
	Route::get('/', 'MeetingEmployeesController@index')->name('meeting_employees');
	#Route::get('/{id}/create', 'MeetingEmployeesController@create')->name('meeting_employees.create');
	Route::get('/{id}/show', 'MeetingEmployeesController@show')->name('meeting_employees.show');
	Route::get('/{id}/edit', 'MeetingEmployeesController@edit')->name('meeting_employees.edit');
	Route::get('/{id}/destroy', 'MeetingEmployeesController@destroy')->name('meeting_employees.destroy');
	Route::get('/{id}/restore', 'MeetingEmployeesController@restore')->name('meeting_employees.restore');
	Route::put('/{id}/update', 'MeetingEmployeesController@update')->name('meeting_employees.update');
	Route::post('/', 'MeetingEmployeesController@store')->name('meeting_employees.store');
});

Route::group(['prefix' => 'meeting_partners'], function () {
	Route::get('/', 'MeetingPartnersController@index')->name('meeting_partners');
	#Route::get('/{id}/create', 'MeetingPartnersController@create')->name('meeting_partners.create');
	Route::get('/{id}/show', 'MeetingPartnersController@show')->name('meeting_partners.show');
	Route::get('/{id}/edit', 'MeetingPartnersController@edit')->name('meeting_partners.edit');
	Route::get('/{id}/destroy', 'MeetingPartnersController@destroy')->name('meeting_partners.destroy');
	Route::get('/{id}/restore', 'MeetingPartnersController@restore')->name('meeting_partners.restore');
	Route::put('/{id}/update', 'MeetingPartnersController@update')->name('meeting_partners.update');
	Route::post('/', 'MeetingPartnersController@store')->name('meeting_partners.store');
});

Route::group(['prefix' => 'providers'], function () {
	Route::get('/', 'ProvidersController@index')->name('providers');
	Route::get('/create', 'ProvidersController@create')->name('providers.create');
	Route::get('/{id}/show', 'ProvidersController@show')->name('providers.show');
	Route::get('/{id}/edit', 'ProvidersController@edit')->name('providers.edit');
	Route::get('/{id}/destroy', 'ProvidersController@destroy')->name('providers.destroy');
	route::get('/{id}/restore', 'ProvidersController@restore')->name('providers.restore');
	Route::put('/{id}/update', 'ProvidersController@update')->name('providers.update');
	Route::post('/', 'ProvidersController@store')->name('providers.store');
});

Route::group(['prefix' => 'patrimonials'], function () {
	Route::get('/', 'PatrimonialsController@search')->name('patrimonials.search');
	Route::post('/search_results', 'PatrimonialsController@search_results')->name('patrimonials.search_results');
	Route::get('/search_results_back', 'PatrimonialsController@search_results_back')->name('patrimonials.search_results_back');
	Route::get('/create', 'PatrimonialsController@create')->name('patrimonials.create');
	Route::get('/{id}/show', 'PatrimonialsController@show')->name('patrimonials.show');
	Route::get('/{id}/edit', 'PatrimonialsController@edit')->name('patrimonials.edit');
	Route::get('/{id}/destroy', 'PatrimonialsController@destroy')->name('patrimonials.destroy');
	#Route::get('/{id}/trashed', 'PatrimonialsController@trashed')->name('patrimonials.trashed');
	Route::get('/{id}/restore', 'PatrimonialsController@restore')->name('patrimonials.restore');
	Route::put('/{id}/update', 'PatrimonialsController@update')->name('patrimonials.update');
	Route::post('/', 'PatrimonialsController@store')->name('patrimonials.store');
	Route::get('/{id}/copy', 'PatrimonialsController@copy')->name('patrimonials.copy');

	Route::get('/{id}/create_movement', 'PatrimonialsController@create_movement')->name('patrimonial_movements.create');

	Route::get('/{id}/create_material', 'PatrimonialsController@create_material')->name('patrimonial_materials.create');
	Route::post('/{id}/materials', 'PatrimonialsController@store_material')->name('patrimonial_materials.store');
	Route::get('/edit_material/{id}', 'PatrimonialsController@edit_material')->name('patrimonial_materials.edit');
	Route::put('/update_material/{id}', 'PatrimonialsController@update_material')->name('patrimonial_materials.update');

	Route::get('/{id}/create_service', 'PatrimonialsController@create_service')->name('patrimonial_services.create');
	Route::post('/{id}/services', 'PatrimonialsController@store_service')->name('patrimonial_services.store');
	Route::get('/edit_service/{id}', 'PatrimonialsController@edit_service')->name('patrimonial_services.edit');
	Route::put('/update_service/{id}', 'PatrimonialsController@update_service')->name('patrimonial_services.update');

	Route::post('/{id}/file_upload', 'PatrimonialsController@file_upload')->name('patrimonial_files.upload');
	Route::get('/{id}/file/{file_id}/download', 'PatrimonialsController@file_download')->name('patrimonial_files.download');
	Route::get('/{id}/file/{file_id}/destroy', 'PatrimonialsController@file_destroy')->name('patrimonial_files.destroy');

	Route::get('/reports/employee', 'PatrimonialsController@rpt_employee')->name('patrimonial_reports.employee');
	Route::get('/reports/company_sector', 'PatrimonialsController@rpt_company_sector')->name('patrimonial_reports.company_sector');
	Route::post('/reports/company_sector/search_results', 'PatrimonialsController@rpt_company_sector_search_results')->name('patrimonial_reports.company_sector_search_results');
});

Route::group(['prefix' => 'members'], function () {
	Route::get('/search', 'MembersController@search')->name('members.search');
	Route::post('/search_results', 'MembersController@search_results')->name('members.search_results');
	Route::get('/search_results_back', 'MembersController@search_results_back')->name('members.search_results_back'); 
	Route::get('/create', 'MembersController@create')->name('members.create');
	Route::get('/{id}/show', 'MembersController@show')->name('members.show');
	Route::get('/{id}/edit', 'MembersController@edit')->name('members.edit');
	Route::get('/{id}/destroy', 'MembersController@destroy')->name('members.destroy');
	Route::put('/{id}/update', 'MembersController@update')->name('members.update');
	Route::post('/', 'MembersController@store')->name('members.store');
});

Route::group(['prefix' => '/materials'], function () {
	Route::get('/', 'MaterialsController@index')->name('materials');
	Route::get('/create', 'MaterialsController@create')->name('materials.create');
	Route::get('/{id}/show', 'MaterialsController@show')->name('materials.show');
	Route::get('/{id}/edit', 'MaterialsController@edit')->name('materials.edit');
	Route::get('/{id}/destroy', 'MaterialsController@destroy')->name('materials.destroy');
	Route::put('/{id}/update', 'MaterialsController@update')->name('materials.update');
	Route::post('/', 'MaterialsController@store')->name('materials.store');
});

Route::group(['prefix' => 'company_positions'], function () {
	Route::get('/', 'CompanyPositionsController@index')->name('company_positions');
	Route::get('/create', 'CompanyPositionsController@create')->name('company_positions.create');
	Route::get('/{id}/show', 'CompanyPositionsController@show')->name('company_positions.show');
	Route::get('/{id}/edit', 'CompanyPositionsController@edit')->name('company_positions.edit');
	Route::get('/{id}/destroy', 'CompanyPositionsController@destroy')->name('company_positions.destroy');
	Route::put('/{id}/update', 'CompanyPositionsController@update')->name('company_positions.update');
	Route::post('/', 'CompanyPositionsController@store')->name('company_positions.store');
});

Route::group(['prefix' => 'company_responsibilities'], function () {
	Route::get('/', 'CompanyResponsibilitiesController@index')->name('company_responsibilities');
	Route::get('/create', 'CompanyResponsibilitiesController@create')->name('company_responsibilities.create');
	Route::get('/{id}/show', 'CompanyResponsibilitiesController@show')->name('company_responsibilities.show');
	Route::get('/{id}/edit', 'CompanyResponsibilitiesController@edit')->name('company_responsibilities.edit');
	Route::get('/{id}/destroy', 'CompanyResponsibilitiesController@destroy')->name('company_responsibilities.destroy');
	Route::get('/{id}/restore', 'CompanyResponsibilitiesController@restore')->name('company_responsibilities.restore');
	Route::put('/{id}/update', 'CompanyResponsibilitiesController@update')->name('company_responsibilities.update');
	Route::post('/', 'CompanyResponsibilitiesController@store')->name('company_responsibilities.store');
});

Route::group(['prefix' => 'company_sectors'], function () {
	Route::get('/', 'CompanySectorsController@index')->name('company_sectors');
	Route::get('/create', 'CompanySectorsController@create')->name('company_sectors.create');
	Route::get('/{id}/show', 'CompanySectorsController@show')->name('company_sectors.show');
	Route::get('/{id}/edit', 'CompanySectorsController@edit')->name('company_sectors.edit');
	Route::get('/{id}/destroy', 'CompanySectorsController@destroy')->name('company_sectors.destroy');
	Route::get('/{id}/restore', 'CompanySectorsController@restore')->name('company_sectors.restore');
	Route::put('/{id}/update', 'CompanySectorsController@update')->name('company_sectors.update');
	Route::post('/', 'CompanySectorsController@store')->name('company_sectors.store');
});

Route::group(['prefix' => 'company_sub_sectors'], function () {
	Route::get('/', 'CompanySubSectorsController@index')->name('company_sub_sectors');
	Route::get('/create', 'CompanySubSectorsController@create')->name('company_sub_sectors.create');
	Route::get('/{id}/show', 'CompanySubSectorsController@show')->name('company_sub_sectors.show');
	Route::get('/{id}/edit', 'CompanySubSectorsController@edit')->name('company_sub_sectors.edit');
	Route::get('/{id}/destroy', 'CompanySubSectorsController@destroy')->name('company_sub_sectors.destroy');
	Route::get('/{id}/restore', 'CompanySubSectorsController@restore')->name('company_sub_sectors.restore');
	Route::put('/{id}/update', 'CompanySubSectorsController@update')->name('company_sub_sectors.update');
	Route::post('/', 'CompanySubSectorsController@store')->name('company_sub_sectors.store');
});

Route::group(['prefix' => 'employees'], function () {
	Route::get('/search', 'EmployeesController@search')->name('employees.search');
	Route::post('/search_results', 'EmployeesController@search_results')->name('employees.search_results');
	Route::get('/search_results_back', 'EmployeesController@search_results_back')->name('employees.search_results_back'); 
	Route::get('/create', 'EmployeesController@create')->name('employees.create');
	Route::get('/{id}/show', 'EmployeesController@show')->name('employees.show');
	Route::get('/{id}/edit', 'EmployeesController@edit')->name('employees.edit');
	Route::get('/{id}/destroy', 'EmployeesController@destroy')->name('employees.destroy');
	Route::put('/{id}/update', 'EmployeesController@update')->name('employees.update');
	Route::post('/', 'EmployeesController@store')->name('employees.store');

	Route::get('/{id}/start_movement', 'EmployeesController@start_movement')->name('employees.start_movement');
	Route::post('/{id}/store_movement', 'EmployeesController@store_movement')->name('employees.store_movement');
	Route::get('/{id}/end_movement', 'EmployeesController@end_movement')->name('employees.end_movement');
	Route::put('/{id}/update_movement', 'EmployeesController@update_movement')->name('employees.update_movement');


	Route::get('/{id}/edit_movement', 'EmployeesController@edit_movement')->name('employees.edit_movement');
	Route::get('/{id}/start_movement_edit', 'EmployeesController@start_movement_edit')->name('employees.start_movement_edit');
	Route::put('/{id}/start_movement_update', 'EmployeesController@start_movement_update')->name('employees.start_movement_update');
	Route::get('/{id}/end_movement_edit', 'EmployeesController@end_movement_edit')->name('employees.end_movement_edit');
	Route::put('/{id}/end_movement_update', 'EmployeesController@end_movement_update')->name('employees.end_movement_update');

	Route::get('/{id}/reports/patrimonials', 'EmployeesController@rpt_patrimonials')->name('employees.rpt_patrimonials');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
