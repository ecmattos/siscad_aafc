<?php

namespace SisCad\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        '\SisCad\Entities\City' => '\SisCad\Policies\CityPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        #$this->registerPolicies();
        
        /**
         * Users Policies.
         *
         */
        Gate::define('users-index', function ($user) {
            return $user->hasAccess(['users.index']);
        });

        Gate::define('users-create', function ($user) {
            return $user->hasAccess(['users.create']);
        });

        Gate::define('users-show', function ($user) {
            return $user->hasAccess(['users.show']);
        });

        Gate::define('users-edit', function ($user) {
            return $user->hasAccess(['users.edit']);
        });

        Gate::define('users-destroy', function ($user) {
            return $user->hasAccess(['users.destroy']);
        });

        /**
         * Roles Policies.
         *
         */
        Gate::define('roles-index', function ($user) {
            return $user->hasAccess(['roles.index']);
        });

        Gate::define('roles-create', function ($user) {
            return $user->hasAccess(['roles.create']);
        });

        Gate::define('roles-show', function ($user) {
            return $user->hasAccess(['roles.show']);
        });

        Gate::define('roles-edit', function ($user) {
            return $user->hasAccess(['roles.edit']);
        });

        Gate::define('roles-destroy', function ($user) {
            return $user->hasAccess(['roles.destroy']);
        });


        /**
         * States Policies.
         *
         */
        Gate::define('states-index', function ($user) {
            return $user->hasAccess(['states.index']);
        });

        Gate::define('states-create', function ($user) {
            return $user->hasAccess(['states.create']);
        });

        Gate::define('states-show', function ($user) {
            return $user->hasAccess(['states.show']);
        });

        Gate::define('states-edit', function ($user) {
            return $user->hasAccess(['states.edit']);
        });

        Gate::define('states-destroy', function ($user) {
            return $user->hasAccess(['states.destroy']);
        });

        /**
         * Region Policies.
         *
         */
        Gate::define('regions-index', function ($user) {
            return $user->hasAccess(['regions.index']);
        });

        Gate::define('regions-create', function ($user) {
            return $user->hasAccess(['regions.create']);
        });

        Gate::define('regions-show', function ($user) {
            return $user->hasAccess(['regions.show']);
        });

        Gate::define('regions-edit', function ($user) {
            return $user->hasAccess(['regions.edit']);
        });

        Gate::define('regions-destroy', function ($user) {
            return $user->hasAccess(['regions.destroy']);
        });

        /**
         * City Policies.
         *
         */
        Gate::define('cities-index', function ($user) {
            return $user->hasAccess(['cities.index']);
        });

        Gate::define('cities-create', function ($user) {
            return $user->hasAccess(['cities.create']);
        });

        Gate::define('cities-show', function ($user) {
            return $user->hasAccess(['cities.show']);
        });

        Gate::define('cities-edit', function ($user) {
            return $user->hasAccess(['cities.edit']);
        });

        Gate::define('cities-destroy', function ($user) {
            return $user->hasAccess(['cities.destroy']);
        });

        /**
         * Plan Policies.
         *
         */
        Gate::define('plans-index', function ($user) {
            return $user->hasAccess(['plans.index']);
        });

        Gate::define('plans-create', function ($user) {
            return $user->hasAccess(['plans.create']);
        });

        Gate::define('plans-show', function ($user) {
            return $user->hasAccess(['plans.show']);
        });

        Gate::define('plans-edit', function ($user) {
            return $user->hasAccess(['plans.edit']);
        });

        Gate::define('plans-destroy', function ($user) {
            return $user->hasAccess(['plans.destroy']);
        });

        /**
         * Member Status Policies.
         *
         */
        Gate::define('member_statuses-index', function ($user) {
            return $user->hasAccess(['member_statuses.index']);
        });

        Gate::define('member_statuses-create', function ($user) {
            return $user->hasAccess(['member_statuses.create']);
        });

        Gate::define('member_statuses-show', function ($user) {
            return $user->hasAccess(['member_statuses.show']);
        });

        Gate::define('member_statuses-edit', function ($user) {
            return $user->hasAccess(['member_statuses.edit']);
        });

        Gate::define('member_statuses-destroy', function ($user) {
            return $user->hasAccess(['member_statuses.destroy']);
        });

        /**
         * Member Status Reasons Policies.
         *
         */
        Gate::define('member_status_reasons-index', function ($user) {
            return $user->hasAccess(['member_status_reasons.index']);
        });

        Gate::define('member_status_reasons-create', function ($user) {
            return $user->hasAccess(['member_status_reasons.create']);
        });

        Gate::define('member_status_reasons-show', function ($user) {
            return $user->hasAccess(['member_status_reasons.show']);
        });

        Gate::define('member_status_reasons-edit', function ($user) {
            return $user->hasAccess(['member_status_reasons.edit']);
        });

        Gate::define('member_status_reasons-destroy', function ($user) {
            return $user->hasAccess(['member_status_reasons.destroy']);
        });

        /**
         * Dashboard Policies.
         *
         */

        Gate::define('dashboard-members', function ($user) {
            return $user->hasAccess(['dashboard.members']);
        });

        /**
         * Members Policies.
         *
         */
        Gate::define('members-search', function ($user) {
            return $user->hasAccess(['members.search']);
        });

        Gate::define('members-create', function ($user) {
            return $user->hasAccess(['members.create']);
        });

        Gate::define('members-show', function ($user) {
            return $user->hasAccess(['members.show']);
        });

        Gate::define('members-edit', function ($user) {
            return $user->hasAccess(['members.edit']);
        });

        Gate::define('members-destroy', function ($user) {
            return $user->hasAccess(['members.destroy']);
        });

        /**
         * Gender Policies.
         *
         */
        Gate::define('genders-create', function ($user) {
            return $user->hasAccess(['genders.create']);
        });

        Gate::define('genders-show', function ($user) {
            return $user->hasAccess(['genders.show']);
        });

        Gate::define('genders-edit', function ($user) {
            return $user->hasAccess(['genders.edit']);
        });

        Gate::define('genders-destroy', function ($user) {
            return $user->hasAccess(['genders.destroy']);
        });

        /**
         * Patrimonial Status Policies.
         *
         */
        Gate::define('patrimonial_statuses-index', function ($user) {
            return $user->hasAccess(['patrimonial_statuses.index']);
        });

        Gate::define('patrimonial_statuses-create', function ($user) {
            return $user->hasAccess(['patrimonial_statuses.create']);
        });

        Gate::define('patrimonial_statuses-show', function ($user) {
            return $user->hasAccess(['patrimonial_statuses.show']);
        });

        Gate::define('patrimonial_statuses-edit', function ($user) {
            return $user->hasAccess(['patrimonial_statuses.edit']);
        });

        Gate::define('patrimonial_statuses-destroy', function ($user) {
            return $user->hasAccess(['patrimonial_statuses.destroy']);
        });

        /**
         * Patrimonial Types Policies.
         *
         */
        Gate::define('patrimonial_types-index', function ($user) {
            return $user->hasAccess(['patrimonial_types.index']);
        });

        Gate::define('patrimonial_types-create', function ($user) {
            return $user->hasAccess(['patrimonial_types.create']);
        });

        Gate::define('patrimonial_types-show', function ($user) {
            return $user->hasAccess(['patrimonial_types.show']);
        });

        Gate::define('patrimonial_types-edit', function ($user) {
            return $user->hasAccess(['patrimonial_types.edit']);
        });

        Gate::define('patrimonial_types-destroy', function ($user) {
            return $user->hasAccess(['patrimonial_types.destroy']);
        });

        /**
         * Patrimonial Sub-types Policies.
         *
         */
        
        Gate::define('patrimonial_sub_types-index', function ($user) {
            return $user->hasAccess(['patrimonial_sub_types.index']);
        });
        Gate::define('patrimonial_sub_types-create', function ($user) {
            return $user->hasAccess(['patrimonial_sub_types.create']);
        });

        Gate::define('patrimonial_sub_types-show', function ($user) {
            return $user->hasAccess(['patrimonial_sub_types.show']);
        });

        Gate::define('patrimonial_sub_types-edit', function ($user) {
            return $user->hasAccess(['patrimonial_sub_types.edit']);
        });

        Gate::define('patrimonial_sub_types-destroy', function ($user) {
            return $user->hasAccess(['patrimonial_sub_types.destroy']);
        });

        /**
         * Partner Sectors Policies.
         *
         */
        Gate::define('partner_sectors-index', function ($user) {
            return $user->hasAccess(['partner_sectors.index']);
        });

        Gate::define('partner_sectors-create', function ($user) {
            return $user->hasAccess(['partner_sectors.create']);
        });

        Gate::define('partner_sectors-show', function ($user) {
            return $user->hasAccess(['partner_sectors.show']);
        });

        Gate::define('partner_sectors-edit', function ($user) {
            return $user->hasAccess(['partner_sectors.edit']);
        });

        Gate::define('partner_sectors-destroy', function ($user) {
            return $user->hasAccess(['partner_sectors.destroy']);
        });


        /**
         * Patrimonial Brands Policies.
         *
         */
        Gate::define('patrimonial_brands-index', function ($user) {
            return $user->hasAccess(['patrimonial_brands.index']);
        });

        Gate::define('patrimonial_brands-create', function ($user) {
            return $user->hasAccess(['patrimonial_brands.create']);
        });

        Gate::define('patrimonial_brands-show', function ($user) {
            return $user->hasAccess(['patrimonial_brands.show']);
        });

        Gate::define('patrimonial_brands-edit', function ($user) {
            return $user->hasAccess(['patrimonial_brands.edit']);
        });

        Gate::define('patrimonial_brands-destroy', function ($user) {
            return $user->hasAccess(['patrimonial_brands.destroy']);
        });

        /**
         * Patrimonial Models Policies.
         *
         */
        Gate::define('patrimonial_models-index', function ($user) {
            return $user->hasAccess(['patrimonial_models.index']);
        });

        Gate::define('patrimonial_models-create', function ($user) {
            return $user->hasAccess(['patrimonial_models.create']);
        });

        Gate::define('patrimonial_models-show', function ($user) {
            return $user->hasAccess(['patrimonial_models.show']);
        });

        Gate::define('patrimonial_models-edit', function ($user) {
            return $user->hasAccess(['patrimonial_models.edit']);
        });

        Gate::define('patrimonial_models-destroy', function ($user) {
            return $user->hasAccess(['patrimonial_models.destroy']);
        });

        /**
         * Patrimonial Moviment Types Policies.
         *
         */
        Gate::define('patrimonial_requests-index', function ($user) {
            return $user->hasAccess(['patrimonial_requests.index']);
        });

        Gate::define('patrimonial_requests-create', function ($user) {
            return $user->hasAccess(['patrimonial_requests.create']);
        });

        Gate::define('patrimonial_requests-show', function ($user) {
            return $user->hasAccess(['patrimonial_requests.show']);
        });

        Gate::define('patrimonial_requests-confirm', function ($user) {
            return $user->hasAccess(['patrimonial_requests.confirm']);
        });

        Gate::define('patrimonial_requests-destroy', function ($user) {
            return $user->hasAccess(['patrimonial_requests.destroy']);
        });

        /**
         * Patrimonial Policies.
         *
         */
        Gate::define('patrimonials-search', function ($user) {
            return $user->hasAccess(['patrimonials.search']);
        });

        Gate::define('patrimonials-create', function ($user) {
            return $user->hasAccess(['patrimonials.create']);
        });

        Gate::define('patrimonials-show', function ($user) {
            return $user->hasAccess(['patrimonials.show']);
        });

        Gate::define('patrimonials-edit', function ($user) {
            return $user->hasAccess(['patrimonials.edit']);
        });

        Gate::define('patrimonials-destroy', function ($user) {
            return $user->hasAccess(['patrimonials.destroy']);
        });

        Gate::define('patrimonials-copy', function ($user) {
            return $user->hasAccess(['patrimonials.copy']);
        });

        /**
         * Patrimonial Files Policies.
         *
         */
        Gate::define('patrimonial_files-upload', function ($user) {
            return $user->hasAccess(['patrimonial_files.upload']);
        });

        Gate::define('patrimonial_files-download', function ($user) {
            return $user->hasAccess(['patrimonial_files.download']);
        });

        Gate::define('patrimonial_files-destroy', function ($user) {
            return $user->hasAccess(['patrimonial_files.destroy']);
        });

        
        /**
         * Material Units Policies.
         *
         */
         Gate::define('material_units-index', function ($user) {
            return $user->hasAccess(['material_units.index']);
        });

         Gate::define('material_units-create', function ($user) {
            return $user->hasAccess(['material_units.create']);
        });

        Gate::define('material_units-show', function ($user) {
            return $user->hasAccess(['material_units.show']);
        });

        Gate::define('material_units-edit', function ($user) {
            return $user->hasAccess(['material_units.edit']);
        });

        Gate::define('material_units-destroy', function ($user) {
            return $user->hasAccess(['material_units.destroy']);
        });

        /**
         * Materials Policies.
         *
         */
        Gate::define('materials-index', function ($user) {
            return $user->hasAccess(['materials.index']);
        });

        Gate::define('materials-create', function ($user) {
            return $user->hasAccess(['materials.create']);
        });

        Gate::define('materials-show', function ($user) {
            return $user->hasAccess(['materials.show']);
        });

        Gate::define('materials-edit', function ($user) {
            return $user->hasAccess(['materials.edit']);
        });

        Gate::define('materials-destroy', function ($user) {
            return $user->hasAccess(['materials.destroy']);
        });

        /**
         * Providers Policies.
         *
         */
        Gate::define('providers-index', function ($user) {
            return $user->hasAccess(['providers.index']);
        });

        Gate::define('providers-create', function ($user) {
            return $user->hasAccess(['providers.create']);
        });

        Gate::define('providers-show', function ($user) {
            return $user->hasAccess(['providers.show']);
        });

        Gate::define('providers-edit', function ($user) {
            return $user->hasAccess(['providers.edit']);
        });

        Gate::define('providers-destroy', function ($user) {
            return $user->hasAccess(['providers.destroy']);
        });

        /**
         * Meeting Types Policies.
         *
         */
        Gate::define('meeting_types-index', function ($user) {
            return $user->hasAccess(['meeting_types.index']);
        });

        Gate::define('meeting_types-create', function ($user) {
            return $user->hasAccess(['meeting_types.create']);
        });

        Gate::define('meeting_types-show', function ($user) {
            return $user->hasAccess(['meeting_types.show']);
        });

        Gate::define('meeting_types-edit', function ($user) {
            return $user->hasAccess(['meeting_types.edit']);
        });

        Gate::define('meeting_types-destroy', function ($user) {
            return $user->hasAccess(['meeting_types.destroy']);
        });

        /**
         * Meeting Policies.
         *
         */
        Gate::define('meetings-index', function ($user) {
            return $user->hasAccess(['meetings.index']);
        });

        Gate::define('meetings-create', function ($user) {
            return $user->hasAccess(['meetings.create']);
        });

        Gate::define('meetings-show', function ($user) {
            return $user->hasAccess(['meetings.show']);
        });

        Gate::define('meetings-edit', function ($user) {
            return $user->hasAccess(['meetings.edit']);
        });

        Gate::define('meetings-destroy', function ($user) {
            return $user->hasAccess(['meetings.destroy']);
        });

         /**
         * Meeting Members Policies.
         *
         */
        Gate::define('meetings_members-index', function ($user) {
            return $user->hasAccess(['meeting_members.index']);
        });

        Gate::define('meeting_members-create', function ($user) {
            return $user->hasAccess(['meeting_members.create']);
        });

        #Gate::define('meeting_members-show', function ($user) {
        #    return $user->hasAccess(['meeting_members.show']);
        #});

        Gate::define('meeting_members-edit', function ($user) {
            return $user->hasAccess(['meeting_members.edit']);
        });

        Gate::define('meeting_members-destroy', function ($user) {
            return $user->hasAccess(['meeting_members.destroy']);
        });

        
        /**
         * Meeting Partners Policies.
         *
         */
        Gate::define('meetings_partners-index', function ($user) {
            return $user->hasAccess(['meeting_partners.index']);
        });

        Gate::define('meeting_partners-create', function ($user) {
            return $user->hasAccess(['meeting_partners.create']);
        });

        #Gate::define('meeting_partners-show', function ($user) {
        #    return $user->hasAccess(['meeting_partners.show']);
        #});

        Gate::define('meeting_partners-edit', function ($user) {
            return $user->hasAccess(['meeting_partners.edit']);
        });

        Gate::define('meeting_partners-destroy', function ($user) {
            return $user->hasAccess(['meeting_partners.destroy']);
        });

        /**
         * Meeting Employeess Policies.
         *
         */
        Gate::define('meetings_employees-index', function ($user) {
            return $user->hasAccess(['meeting_employees.index']);
        });

        Gate::define('meeting_employees-create', function ($user) {
            return $user->hasAccess(['meeting_employees.create']);
        });

        #Gate::define('meeting_employees-show', function ($user) {
        #    return $user->hasAccess(['meeting_employees.show']);
        #});

        Gate::define('meeting_employees-edit', function ($user) {
            return $user->hasAccess(['meeting_employees.edit']);
        });

        Gate::define('meeting_employees-destroy', function ($user) {
            return $user->hasAccess(['meeting_employees.destroy']);
        });


        /**
         * Payment Statuses Policies.
         *
         */
        Gate::define('payment_statuses-create', function ($user) {
            return $user->hasAccess(['payment_statuses.create']);
        });

        Gate::define('payment_statuses-show', function ($user) {
            return $user->hasAccess(['payment_statuses.show']);
        });

        Gate::define('payment_statuses-edit', function ($user) {
            return $user->hasAccess(['payment_statuses.edit']);
        });

        Gate::define('payment_statuses-destroy', function ($user) {
            return $user->hasAccess(['payment_statuses.destroy']);
        });

        /**
         * Accounting Accounts Policies.
         *
         */
        Gate::define('accounting_accounts-index', function ($user) {
            return $user->hasAccess(['accounting_accounts.index']);
        });

        Gate::define('accounting_accounts-create', function ($user) {
            return $user->hasAccess(['accounting_accounts.create']);
        });

        Gate::define('accounting_accounts-show', function ($user) {
            return $user->hasAccess(['accounting_accounts.show']);
        });

        Gate::define('accounting_accounts-edit', function ($user) {
            return $user->hasAccess(['accounting_accounts.edit']);
        });

        Gate::define('accounting_accounts-destroy', function ($user) {
            return $user->hasAccess(['accounting_accounts.destroy']);
        });

        /**
         * Management Units Policies.
         *
         */
        Gate::define('management_units-index', function ($user) {
            return $user->hasAccess(['management_units.index']);
        });

        Gate::define('management_units-create', function ($user) {
            return $user->hasAccess(['management_units.create']);
        });

        Gate::define('management_units-show', function ($user) {
            return $user->hasAccess(['management_units.show']);
        });

        Gate::define('management_units-edit', function ($user) {
            return $user->hasAccess(['management_units.edit']);
        });

        Gate::define('management_units-destroy', function ($user) {
            return $user->hasAccess(['management_units.destroy']);
        });


        /**
         * Company Positions Policies.
         *
         */
        Gate::define('company_positions-index', function ($user) {
            return $user->hasAccess(['company_positions.index']);
        });

        Gate::define('company_positions-create', function ($user) {
            return $user->hasAccess(['company_positions.create']);
        });

        Gate::define('company_positions-show', function ($user) {
            return $user->hasAccess(['company_positions.show']);
        });

        Gate::define('company_positions-edit', function ($user) {
            return $user->hasAccess(['company_positions.edit']);
        });

        Gate::define('company_positions-destroy', function ($user) {
            return $user->hasAccess(['company_positions.destroy']);
        });

         /**
         * Company Positions Policies.
         *
         */
        Gate::define('company_responsibilities-index', function ($user) {
            return $user->hasAccess(['company_responsibilities.index']);
        });

        Gate::define('company_responsibilities-create', function ($user) {
            return $user->hasAccess(['company_responsibilities.create']);
        });

        Gate::define('company_responsibilities-show', function ($user) {
            return $user->hasAccess(['company_responsibilities.show']);
        });

        Gate::define('company_responsibilities-edit', function ($user) {
            return $user->hasAccess(['company_responsibilities.edit']);
        });

        Gate::define('company_responsibilities-destroy', function ($user) {
            return $user->hasAccess(['company_responsibilities.destroy']);
        });


         /**
         * Company Sectors Policies.
         *
         */
        Gate::define('company_sectors-index', function ($user) {
            return $user->hasAccess(['company_sectors.index']);
        });

        Gate::define('company_sectors-create', function ($user) {
            return $user->hasAccess(['company_sectors.create']);
        });

        Gate::define('company_sectors-show', function ($user) {
            return $user->hasAccess(['company_sectors.show']);
        });

        Gate::define('company_sectors-edit', function ($user) {
            return $user->hasAccess(['company_sectors.edit']);
        });

        Gate::define('company_sectors-destroy', function ($user) {
            return $user->hasAccess(['company_sectors.destroy']);
        });

        /**
         * Company Sub Sectors Policies.
         *
         */
        Gate::define('company_sub_sectors-index', function ($user) {
            return $user->hasAccess(['company_sub_sectors.index']);
        });

        Gate::define('company_sub_sectors-create', function ($user) {
            return $user->hasAccess(['company_sub_sectors.create']);
        });

        Gate::define('company_sub_sectors-show', function ($user) {
            return $user->hasAccess(['company_sub_sectors.show']);
        });

        Gate::define('company_sub_sectors-edit', function ($user) {
            return $user->hasAccess(['company_sub_sectors.edit']);
        });

        Gate::define('company_sub_sectors-destroy', function ($user) {
            return $user->hasAccess(['company_sub_sectors.destroy']);
        });

        /**
         * Employee Policies.
         *
         */
        Gate::define('employees-search', function ($user) {
            return $user->hasAccess(['employees.search']);
        });

        Gate::define('employees-create', function ($user) {
            return $user->hasAccess(['employees.create']);
        });

        Gate::define('employees-show', function ($user) {
            return $user->hasAccess(['employees.show']);
        });

        Gate::define('employees-edit', function ($user) {
            return $user->hasAccess(['employees.edit']);
        });

        Gate::define('employees-destroy', function ($user) {
            return $user->hasAccess(['employees.destroy']);
        });

        /**
         * Employee Movements Policies.
         *
         */
        Gate::define('employees-start_movement', function ($user) {
            return $user->hasAccess(['employees.start_movement']);
        });

        Gate::define('employees-edit_movement', function ($user) {
            return $user->hasAccess(['employees.edit_movement']);
        });

        /**
         * 
        /**
         * Employee Movements Policies.
         *
         */
        Gate::define('employees-start_movement', function ($user) {
            return $user->hasAccess(['employees.start_movement']);
        });

        Gate::define('employees-edit_movement', function ($user) {
            return $user->hasAccess(['employees.edit_movement']);
        });

        /**
         * Partner Policies.
         *
         */
        Gate::define('partners-index', function ($user) {
            return $user->hasAccess(['partners.index']);
        });

        Gate::define('partners-search', function ($user) {
            return $user->hasAccess(['partners.search']);
        });

        Gate::define('partners-create', function ($user) {
            return $user->hasAccess(['partners.create']);
        });

        Gate::define('partners-show', function ($user) {
            return $user->hasAccess(['partners.show']);
        });

        Gate::define('partners-edit', function ($user) {
            return $user->hasAccess(['partners.edit']);
        });

        Gate::define('partners-destroy', function ($user) {
            return $user->hasAccess(['partners.destroy']);
        });
    }
}
