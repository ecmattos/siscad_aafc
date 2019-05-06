<?php 

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =
        [
            
            [
                'display_name'   => 'Administração - Banco: Inclusão',
                'name'           => 'banks.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Banco: Alteração',
                'name'           => 'banks.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Banco: Exclusão',
                'name'           => 'banks.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Banco: Consulta',
                'name'           => 'banks.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Desligamento - Motivo: Inclusão',
                'name'           => 'member_status_reasons.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Desligamento - Motivo: Alteração',
                'name'           => 'member_status_reasons.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Desligamento - Motivo: Exclusão',
                'name'           => 'member_status_reasons.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Desligamento - Motivo: Consulta',
                'name'           => 'member_status_reasons.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Sexo: Inclusão',
                'name'           => 'genders.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sexo: Alteração',
                'name'           => 'genders.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sexo: Exclusão',
                'name'           => 'genders.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sexo: Consulta',
                'name'           => 'genders.show',
                'description'    => ''
            ],


            [
                'display_name'   => 'Administração - Regiões',
                'name'           => 'regions.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Regiões: Inclusão',
                'name'           => 'regions.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Regiões: Alteração',
                'name'           => 'regions.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Regiões: Exclusão',
                'name'           => 'regions.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Regiões: Consulta',
                'name'           => 'regions.show',
                'description'    => ''
            ],


            [
                'display_name'   => 'Administração - Estados',
                'name'           => 'states.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Estados: Inclusão',
                'name'           => 'states.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Estados: Alteração',
                'name'           => 'states.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Estados: Exclusão',
                'name'           => 'states.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Estados: Consulta',
                'name'           => 'states.show',
                'description'    => ''
            ],


            [
                'display_name'   => 'Administração - Cidades',
                'name'           => 'cities.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Cidades: Inclusão',
                'name'           => 'cities.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Cidades: Alteração',
                'name'           => 'cities.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Cidades: Exclusão',
                'name'           => 'cities.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Cidades: Consulta',
                'name'           => 'cities.show',
                'description'    => ''
            ],


            [
                'display_name'   => 'Administração - Planos: Inclusão',
                'name'           => 'plans.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Planos: Alteração',
                'name'           => 'plans.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Planos: Exclusão',
                'name'           => 'plans.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Planos: Consulta',
                'name'           => 'plans.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Planos: Pesquisa',
                'name'           => 'plans.index',
                'description'    => ''
            ],


            [
                'display_name'   => 'Administração - Sócios - Situações: Inclusão',
                'name'           => 'member_statuses.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sócios - Situações: Alteração',
                'name'           => 'member_statuses.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sócios - Situações: Exclusão',
                'name'           => 'member_statuses.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sócios - Situações: Consulta',
                'name'           => 'member_statuses.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sócios - Situações: Pesquisa',
                'name'           => 'member_statuses.index',
                'description'    => ''
            ],


            [
                'display_name'  => 'Sócios: Inclusão',
                'name'  		=> 'members.create',
                'description'	=> ''
            ],
            [
                'display_name'   => 'Sócios: Alteração',
                'name'           => 'members.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Sócios: Exclusão',
                'name'           => 'members.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Sócios: Consulta',
                'name'           => 'members.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Sócios: Pesquisa',
                'name'           => 'members.search',
                'description'    => ''
            ],

            [
                'display_name'   => 'Parceiros: Inclusão',
                'name'           => 'partners.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Parceiros: Alteração',
                'name'           => 'partners.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Parceiros: Exclusão',
                'name'           => 'partners.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Parceiros: Consulta',
                'name'           => 'partners.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Parceiros: Pesquisa',
                'name'           => 'dashboard.partners',
                'description'    => ''
            ],
            [
                'display_name'   => 'Parceiros: Pesquisa',
                'name'           => 'partners.search',
                'description'    => ''
            ],
            [
                'display_name'   => 'Parceiros: Relatórios',
                'name'           => 'dashboard.partners_reports',
                'description'    => ''
            ],
            [
                'display_name'   => 'Parceiros: Etiquetas',
                'name'           => 'dashboard.partners_labels',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Parceiros - Setores',
                'name'           => 'partner_sectors.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Parceiros - Setores: Inclusão',
                'name'           => 'partner_sectors.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Parceiros - Setores: Alteração',
                'name'           => 'partner_sectors.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Parceiros - Setores: Exclusão',
                'name'           => 'partner_sectors.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Parceiros - Setores: Consulta',
                'name'           => 'partner_sectors.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Parceiros - Tipo: Inclusão',
                'name'           => 'partner_types.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Parceiros - Tipo: Alteração',
                'name'           => 'partner_types.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Parceiros - Tipo: Exclusão',
                'name'           => 'partner_types.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Parceiros - Tipo: Consulta',
                'name'           => 'partner_types.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Usuários: Inclusão',
                'name'           => 'users.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Usuários: Alteração',
                'name'           => 'users.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Usuários: Exclusão',
                'name'           => 'users.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Usuários: Consulta',
                'name'           => 'users.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Usuários',
                'name'           => 'users.index',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Grupos Usuários: Inclusão',
                'name'           => 'roles.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Grupos Usuários: Alteração',
                'name'           => 'roles.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Grupos Usuários: Exclusão',
                'name'           => 'roles.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Grupos Usuários: Consulta',
                'name'           => 'roles.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Grupos Usuários',
                'name'           => 'roles.index',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Empresa - Cargos: Inclusão',
                'name'           => 'company_positions.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Cargos: Alteração',
                'name'           => 'company_positions.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Cargos: Exclusão',
                'name'           => 'company_positions.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Cargos: Consulta',
                'name'           => 'company_positions.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Cargos',
                'name'           => 'company_positions.index',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Empresa - Funções: Inclusão',
                'name'           => 'company_responsibilities.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Funções: Alteração',
                'name'           => 'company_responsibilities.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Funções: Exclusão',
                'name'           => 'company_responsibilities.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Funções: Consulta',
                'name'           => 'company_responsibilities.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Funções',
                'name'           => 'company_responsibilities.index',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Empresa - Setores',
                'name'           => 'company_sectors.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Setores: Inclusão',
                'name'           => 'company_sectors.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Setores: Alteração',
                'name'           => 'company_sectors.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Setores: Exclusão',
                'name'           => 'company_sectors.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Setores: Consulta',
                'name'           => 'company_sectors.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Empresa - Sub-setores',
                'name'           => 'company_sub_sectors.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Sub-setores: Inclusão',
                'name'           => 'company_sub_sectors.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Sub-setores: Alteração',
                'name'           => 'company_sub_sectors.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Sub-setores: Exclusão',
                'name'           => 'company_sub_sectors.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Empresa - Sub-setores: Consulta',
                'name'           => 'company_sub_sectors.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Sócios: Relatórios',
                'name'           => 'dashboard.members_reports',
                'description'    => ''
            ],
            [
                'display_name'   => 'Sócios: Etiquetas',
                'name'           => 'dashboard.members_labels',
                'description'    => ''
            ],
            [
                'display_name'   => 'Sócios: Pesquisa',
                'name'           => 'dashboard.members',
                'description'    => ''
            ],
            
            [
                'display_name'   => 'Administração - Pagamentos - Situação: Inclusão',
                'name'           => 'payment_statuses.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Situação: Alteração',
                'name'           => 'payment_statuses.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Situação: Exclusão',
                'name'           => 'payment_statuses.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Situação: Consulta',
                'name'           => 'payment_statuses.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Pagamentos - Finalidade: Inclusão',
                'name'           => 'payment_reasons.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Finalidade: Alteração',
                'name'           => 'payment_reasons.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Finalidade: Exclusão',
                'name'           => 'payment_reasons.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Finalidade: Consulta',
                'name'           => 'payment_reasons.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Pagamentos - Método: Inclusão',
                'name'           => 'payment_methods.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Método: Alteração',
                'name'           => 'payment_methods.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Método: Exclusão',
                'name'           => 'payment_methods.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Pagamentos - Método: Consulta',
                'name'           => 'payment_methods.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Patrimônios - Situações: Pesquisa',
                'name'           => 'patrimonial_statuses.index',
                'description'    => ''
            ],
            

            [
                'display_name'   => 'Administração - Tipos de Patrimônios: Pesquisa',
                'name'           => 'patrimonial_types.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Tipos de Patrimônios: Inclusão',
                'name'           => 'patrimonial_types.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Tipos de Patrimônios: Alteração',
                'name'           => 'patrimonial_types.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Tipos de Patrimônios: Exclusão',
                'name'           => 'patrimonial_types.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Tipos de Patrimônios: Consulta',
                'name'           => 'patrimonial_types.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Sub-tipos de Patrimônios: Pesquisa',
                'name'           => 'patrimonial_sub_types.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sub-tipos de Patrimônios: Inclusão',
                'name'           => 'patrimonial_sub_types.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sub-tipos de Patrimônios: Alteração',
                'name'           => 'patrimonial_sub_types.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sub-tipos de Patrimônios: Exclusão',
                'name'           => 'patrimonial_sub_types.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sub-tipos de Patrimônios: Consulta',
                'name'           => 'patrimonial_sub_types.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Marcas de Patrimônios',
                'name'           => 'patrimonial_brands.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Marcas de Patrimônios: Inclusão',
                'name'           => 'patrimonial_brands.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Marcas de Patrimônios: Alteração',
                'name'           => 'patrimonial_brands.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Marcas de Patrimônios: Exclusão',
                'name'           => 'patrimonial_brands.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Marcas de Patrimônios: Consulta',
                'name'           => 'patrimonial_brands.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Modelos de Patrimônios: Inclusão',
                'name'           => 'patrimonial_models.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Modelos de Patrimônios: Inclusão',
                'name'           => 'patrimonial_models.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Modelos de Patrimônios: Alteração',
                'name'           => 'patrimonial_models.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Modelos de Patrimônios: Exclusão',
                'name'           => 'patrimonial_models.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Modelos de Patrimônios: Consulta',
                'name'           => 'patrimonial_models.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Setores de Patrimônios: Inclusão',
                'name'           => 'patrimonial_sectors.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Setores de Patrimônios: Alteração',
                'name'           => 'patrimonial_sectors.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Setores de Patrimônios: Exclusão',
                'name'           => 'patrimonial_sectors.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Setores de Patrimônios: Consulta',
                'name'           => 'patrimonial_sectors.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Sub-setores de Patrimônios: Inclusão',
                'name'           => 'patrimonial_sub_sectors.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sub-setores de Patrimônios: Alteração',
                'name'           => 'patrimonial_sub_sectors.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sub-setores de Patrimônios: Exclusão',
                'name'           => 'patrimonial_sub_sectors.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Sub-setores de Patrimônios: Consulta',
                'name'           => 'patrimonial_sub_sectors.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Funcionários',
                'name'           => 'employees.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Funcionários: Inclusão',
                'name'           => 'employees.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Funcionários: Alteração',
                'name'           => 'employees.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Funcionários: Exclusão',
                'name'           => 'employees.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Funcionários: Consulta',
                'name'           => 'employees.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Funcionários - Movimentação: Inclusão',
                'name'           => 'employees.start_movement',
                'description'    => ''
            ],
            [
                'display_name'   => 'Funcionários - Movimentação: Alteração',
                'name'           => 'employees.edit_movement',
                'description'    => ''
            ],

            [
                'display_name'   => 'Unidades Gestoras',
                'name'           => 'management_units.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Unidades Gestoras: Inclusão',
                'name'           => 'management_units.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Unidades Gestoras: Alteração',
                'name'           => 'management_units.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Unidades Gestoras: Exclusão',
                'name'           => 'management_units.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Unidades Gestoras: Consulta',
                'name'           => 'management_units.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Fornecedores',
                'name'           => 'providers.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Fornecedores: Inclusão',
                'name'           => 'providers.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Fornecedores: Alteração',
                'name'           => 'providers.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Fornecedores: Exclusão',
                'name'           => 'providers.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Fornecedores: Consulta',
                'name'           => 'providers.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios: Inclusão',
                'name'           => 'patrimonials.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios: Alteração',
                'name'           => 'patrimonials.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios: Exclusão',
                'name'           => 'patrimonials.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios: Consulta',
                'name'           => 'patrimonials.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios: Cópia',
                'name'           => 'patrimonials.copy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios - Requisições: Inclusão',
                'name'           => 'patrimonial_requests.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios - Requisições: Pesquisa',
                'name'           => 'patrimonial_requests.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios - Requisições: Cancelamento',
                'name'           => 'patrimonial_requests.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios - Requisições: Consulta',
                'name'           => 'patrimonial_requests.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios - Requisições: Autorização',
                'name'           => 'patrimonial_requests.confirm',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios: Pesquisa',
                'name'           => 'patrimonials.search',
                'description'    => ''
            ],

            [
                'display_name'   => 'Administração - Financeiro - Contabilidade - Plano de Contas',
                'name'           => 'accounting_accounts.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Financeiro - Contabilidade - Plano de Contas: Inclusão',
                'name'           => 'accounting_accounts.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Financeiro - Contabilidade - Plano de Contas: Alteração',
                'name'           => 'accounting_accounts.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Financeiro - Contabilidade - Plano de Contas: Exclusão',
                'name'           => 'accounting_accounts.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Administração - Financeiro - Contabilidade - Plano de Contas: Consulta',
                'name'           => 'accounting_accounts.show',
                'description'    => ''
            ],
            [
                'display_name'   => 'Eventos',
                'name'           => 'meetings.index',
                'description'    => ''
            ],
            [
                'display_name'   => 'Eventos: Inclusão',
                'name'           => 'meetings.create',
                'description'    => ''
            ],
            [
                'display_name'   => 'Eventos: Alteração',
                'name'           => 'meetings.edit',
                'description'    => ''
            ],
            [
                'display_name'   => 'Eventos: Exclusão',
                'name'           => 'meetings.destroy',
                'description'    => ''
            ],
            [
                'display_name'   => 'Eventos: Consulta',
                'name'           => 'meetings.show',
                'description'    => ''
            ],

            [
                'display_name'   => 'Patrimônios - Arquivos: Inclusão',
                'name'           => 'patrimonial_files.upload',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios - Arquivos: Download',
                'name'           => 'patrimonial_files.download',
                'description'    => ''
            ],
            [
                'display_name'   => 'Patrimônios - Arquivos: Exclusão',
                'name'           => 'patrimonial_files.destroy',
                'description'    => ''
            ],
        ];
    
        foreach ($permissions as $permission)
        {
            \SisCad\Entities\Permission::create($permission);
        }
    }
}
