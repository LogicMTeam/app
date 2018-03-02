@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/ens') }}">En</a> :
@endsection
@section("contentheader_description", $en->$view_col)
@section("section", "Ens")
@section("section_url", url(config('laraadmin.adminRoute') . '/ens'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Ens Edit : ".$en->$view_col)

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
				{!! Form::model($en, ['route' => [config('laraadmin.adminRoute') . '.ens.update', $en->id ], 'method'=>'PUT', 'id' => 'en-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'c1')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/ens') }}">Cancel</a></button>
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
	$("#en-edit-form").validate({
		
	});
});
</script>
@endpush
