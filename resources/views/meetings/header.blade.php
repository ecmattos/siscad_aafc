<h1>EVENTOS</h1>
    
    <ol class="breadcrumb">
        <div class="btn-group-horizontal">
        <a href="{!! route('meetings.edit', ['id' => $meeting->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
        <a href="{!! route('meetings.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
        <a href="{!! route('meetings') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        <a href="{!! route('meetings.attendance_list_reports', ['id' => $meeting->id]) !!}" type="button" class="btn btn-sm btn-default" rel="tooltip" title="Lista Presença"><i class="fa fa-print"></i></a>

        <a href="javascript:;" onclick="onDestroy('{!! route('meetings.destroy', ['id' => $meeting->id]) !!}')" id="link_delete" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
        </div>
    </ol>