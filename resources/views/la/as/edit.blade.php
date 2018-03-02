@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/as') }}">A</a> :
@endsection
@section("contentheader_description", $a->$view_col)
@section("section", "As")
@section("section_url", url(config('laraadmin.adminRoute') . '/as'))
@section("sub_section", "Edit")

@section("htmlheader_title", "As Edit : ".$a->$view_col)

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
				{!! Form::model($a, ['route' => [config('laraadmin.adminRoute') . '.as.update', $a->id ], 'method'=>'PUT', 'id' => 'a-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'ass')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/as') }}">Cancel</a></button>
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
	$("#a-edit-form").validate({
		
	});
});
</script>
@endpush
