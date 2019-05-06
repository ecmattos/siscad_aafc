@if(Session::has('errors'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h3><i class="icon fa fa-ban"></i> Ops ...</h3>
      @foreach($errors->all() as $error)
        {!! $error !!}
        <br>
      @endforeach
  </div>
@endif

@if(Session::has('flash_message_success'))
  	<div class="alert alert-success" role="alert" align="left">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<b>{{ Session::get('flash_message_success') }}</b>
  	</div>
@endif

@if(Session::has('flash_message_danger'))
  	<div class="alert alert-danger alert-dismissible">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<b>{{ Session::get('flash_message_danger') }}</b>
  	</div>
@endif

@if(Session::has('flash_message_warning'))
  	<div class="alert alert-warning" role="alert" align="center">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		{{ Session::get('flash_message_warning') }}
      <p class="pull-right">
        <a class="btn btn-default" href="#">Link</a>
    </p>
  	</div>
@endif


@if(Session::has('flash_message_patrimonial_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_patrimonial_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('patrimonials.restore', ['id' => $patrimonial->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('patrimonials.show', ['id' => $patrimonial->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_meeting_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_meeting_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('meetings.restore', ['id' => $meeting->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('meetings.show', ['id' => $meeting->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_management_unit_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_management_unit_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('management_units.restore', ['id' => $management_unit->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('management_units.show', ['id' => $management_unit->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_provider_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_provider_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('providers.restore', ['id' => $provider->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('providers.show', ['id' => $provider->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_patrimonial_type_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_patrimonial_type_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('patrimonial_types.restore', ['id' => $patrimonial_type->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('patrimonial_types.show', ['id' => $patrimonial_type->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_patrimonial_sub_type_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_patrimonial_sub_type_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('patrimonial_sub_types.restore', ['id' => $patrimonial_sub_type->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('patrimonial_sub_types.show', ['id' => $patrimonial_sub_type->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_patrimonial_brand_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_patrimonial_brand_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('patrimonial_brands.restore', ['id' => $patrimonial_brand->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('patrimonial_brands.show', ['id' => $patrimonial_brand->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_patrimonial_model_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_patrimonial_model_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('patrimonial_models.restore', ['id' => $patrimonial_model->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('patrimonial_models.show', ['id' => $patrimonial_model->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_material_unit_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_material_unit_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('material_units.restore', ['id' => $material_unit->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('material_units.show', ['id' => $material_unit->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_partner_type_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_partner_type_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('partner_types.restore', ['id' => $partner_type->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('partner_types.show', ['id' => $partner_type->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_partner_sector_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_partner_sector_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('partner_sectors.restore', ['id' => $partner_sector->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('partner_sectors.show', ['id' => $partner_sector->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_company_position_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_company_position_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('company_positions.restore', ['id' => $company_position->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('company_positions.show', ['id' => $company_position->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_company_responsibility_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_company_responsibility_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('company_responsibilities.restore', ['id' => $company_responsibility->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('company_responsibilities.show', ['id' => $company_responsibility->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_company_sector_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_company_sector_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('company_sectors.restore', ['id' => $company_sector->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('company_sectors.show', ['id' => $company_sector->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_company_sub_sector_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_company_sub_sector_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('company_sub_sectors.restore', ['id' => $company_sub_sector->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('company_sub_sectors.show', ['id' => $company_sub_sector->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_city_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_city_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('cities.restore', ['id' => $city->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('cities.show', ['id' => $city->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif