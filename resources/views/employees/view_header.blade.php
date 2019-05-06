<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{!! route('employees.search_results_back') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Funcionários</b></a></li>
    <li class="breadcrumb-item"><b>CONSULTA</b></li>

    <div class="btn-group btn-group-sm pull-right">
      <a href="{!! route('employees.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('employees.edit', ['id' => $employee->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('employees.search') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="{!! route('employees.destroy', ['id' => $employee->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>