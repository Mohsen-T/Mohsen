@extends('admin.layout.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-red-sunglo">
					<i class="icon-settings font-red-sunglo"></i>
					<span class="caption-subject bold uppercase">General Settings</span>
				</div>
			</div>
			<div class="portlet-body form">
				<form role="form" method="POST" action="{{route('general.update')}}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-4">
							<h4>Website Title</h4>
							<input type="text" class="form-control input-lg" value="{{$general->title}}" name="title" >
						</div>
						<div class="col-md-4">
							<h4>Website Sub-Title</h4>
							<input type="text" class="form-control input-lg" value="{{$general->subtitle}}" name="subtitle" >
						</div>

					</div>

					<div class="row">
						<hr/>
						<div class="col-md-6 col-md-offset-3">
							<button class="btn blue btn-block btn-lg">Update</button>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
</div>
@endsection
