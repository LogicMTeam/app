@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/000s') }}">000</a> :
@endsection
@section("contentheader_description", $000->$view_col)
@section("section", "000s")
@section("section_url", url(config('laraadmin.adminRoute') . '/000s'))
@section("sub_section", "Edit")

@section("htmlheader_title", "000s Edit : ".$000->$view_col)

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
				{!! Form::model($000, ['route' => [config('laraadmin.adminRoute') . '.000s.update', $000->id ], 'method'=>'PUT', 'id' => '000-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, '000')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/000s') }}">Cancel</a></button>
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
	$("#000-edit-form").validate({
		
	});
});
</script>
@endpush
