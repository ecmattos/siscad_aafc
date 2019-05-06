<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">ATIVIDADES</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body">
    @foreach($logs as $log)
      @if($log->key == 'created_at' && !$log->oldValue())
        <div class="log log-sm log-success">
          Registro incluído por {{ $log->userResponsible()->name }} {{ $log->created_at->diffForHumans() }}.
        </div>
      @elseif($log->key == 'deleted_at' && $log->newValue() != '')
        <div class="log log-sm log-danger">
          Registro excluído por {{ $log->userResponsible()->name }} {{ $log->created_at->diffForHumans() }}.
        </div>
      @elseif($log->key == 'deleted_at' && $log->oldValue() != '')
        <div class="log log-sm log-success">
          Registro recuperado por {{ $log->userResponsible()->name }} {{ $log->created_at->diffForHumans() }}.
        </div>
      @else
        <div class="log log-sm log-warning">
          {{ $log->userResponsible()->name }} alterou {{ $log->fieldName() }} de {{ $log->oldValue() }} para {{ $log->newValue() }} {{ $log->created_at->diffForHumans() }}.
        </div>
      @endif
    @endforeach
  </div>
</div>
