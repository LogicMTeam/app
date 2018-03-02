@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/tên_tiếng_anhs') }}">Tên Tiếng Anh</a> :
@endsection
@section("contentheader_description", $tên_tiếng_anh->$view_col)
@section("section", "Tên Tiếng Anhs")
@section("section_url", url(config('laraadmin.adminRoute') . '/tên_tiếng_anhs'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Tên Tiếng Anhs Edit : ".$tên_tiếng_anh->$view_col)

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
				{!! Form::model($tên_tiếng_anh, ['route' => [config('laraadmin.adminRoute') . '.tên_tiếng_anhs.update', $tên_tiếng_anh->id ], 'method'=>'PUT', 'id' => 'tên_tiếng_anh-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'c1')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/tên_tiếng_anhs') }}">Cancel</a></button>
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
	$("#tên_tiếng_anh-edit-form").validate({
		
	});
});
</script>
@endpush
