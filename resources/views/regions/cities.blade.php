<div class="box box-info">
  <div class="box-header with-border collapsed-box">
    <h3 class="box-title">CIDADES</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-plus"></i>
      </button>
    </div>
  </div>
  <div class="box-body" style="display: none;">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        </thead>
        <tbody>
          @foreach($cities as $city)
            <tr>
              <td>{{ $city->description }} / {{ $city->state->code }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
