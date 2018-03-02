@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/gui_bao_caos') }}">Gui bao cao</a> :
@endsection
@section("contentheader_description", $gui_bao_cao->$view_col)
@section("section", "Gui bao caos")
@section("section_url", url(config('laraadmin.adminRoute') . '/gui_bao_caos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Gui bao caos Edit : ".$gui_bao_cao->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($gui_bao_cao, ['route' => [config('laraadmin.adminRoute') . '.gui_bao_caos.update', $gui_bao_cao->id ], 'method'=>'PUT', 'id' => 'gui_bao_cao-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/gui_bao_caos') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#gui_bao_cao-edit-form").validate({
		
	});
});
</script>
@endpush
