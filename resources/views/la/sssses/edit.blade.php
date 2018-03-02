@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/sssses') }}">Ssss</a> :
@endsection
@section("contentheader_description", $ssss->$view_col)
@section("section", "Sssses")
@section("section_url", url(config('laraadmin.adminRoute') . '/sssses'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Sssses Edit : ".$ssss->$view_col)

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
				{!! Form::model($ssss, ['route' => [config('laraadmin.adminRoute') . '.sssses.update', $ssss->id ], 'method'=>'PUT', 'id' => 'ssss-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'sss')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/sssses') }}">Cancel</a></button>
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
	$("#ssss-edit-form").validate({
		
	});
});
</script>
@endpush
