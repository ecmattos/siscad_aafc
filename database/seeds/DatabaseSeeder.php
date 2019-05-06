<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountTypeTableSeeder::class);
        $this->call(AccountBalanceTypeTableSeeder::class);
        $this->call(AccountCoverageTypeTableSeeder::class);
        $this->call(AccountingAccountTableSeeder::class);

        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserStatusTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);

        $this->call(StateTableSeeder::class);
        #$this->call(CityTableSeeder::class);
        $this->call(PlanTableSeeder::class);

        $this->call(MemberStatusTableSeeder::class);
        $this->call(MemberStatusReasonTableSeeder::class);

        $this->call(EmployeeStatusTableSeeder::class);
        $this->call(EmployeeStatusReasonTableSeeder::class);

        $this->call(GenderTableSeeder::class);

        $this->call(PartnerTypeTableSeeder::class);

        $this->call(PatrimonialStatusTableSeeder::class);
        #$this->call(PatrimonialTypeTableSeeder::class);
        #$this->call(PatrimonialSubTypeTableSeeder::class);

        $this->call(CompanySectorTableSeeder::class);
        $this->call(CompanySubSectorTableSeeder::class);
        $this->call(CompanyPositionTableSeeder::class);
        $this->call(CompanyResponsibilityTableSeeder::class);

        $this->call(PatrimonialBrandTableSeeder::class);
        $this->call(PatrimonialModelTableSeeder::class);
        $this->call(PatrimonialMovementTypeTableSeeder::class);

        $this->call(PatrimonialRequestStatusTableSeeder::class);

        $this->call(PaymentStatusTableSeeder::class);
        $this->call(PaymentReasonTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);

        $this->call(MeetingTypeTableSeeder::class);
        $this->call(MaterialUnitTableSeeder::class);
    }
}
