@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/overviews') }}">Overview</a> :
@endsection
@section("contentheader_description", $overview->$view_col)
@section("section", "Overviews")
@section("section_url", url(config('laraadmin.adminRoute') . '/overviews'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Overviews Edit : ".$overview->$view_col)

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
				{!! Form::model($overview, ['route' => [config('laraadmin.adminRoute') . '.overviews.update', $overview->id ], 'method'=>'PUT', 'id' => 'overview-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/overviews') }}">Cancel</a></button>
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
	$("#overview-edit-form").validate({
		
	});
});
</script>
@endpush
