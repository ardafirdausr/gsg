@extends('layouts.app')

@section('content')
<div class="container py-md-3">
	<div class="row my-md-3">
		<div class="col-md-4">
			<img src={{$content->photo}} alt={{$content->title}} width="100%">
		</div>
		<div class="col-md-8">
			<div id="content-title">{{$content->title}}</div>
			<div id="content-creator" class="my-md-3 d-md-flex flex-md-row justify-content-between">
				<small class="text-muted">Seniman : {{$content->creator}}</small>
			</div>
			<div id="content-description" class="mb-md-5">{{$content->description}}</div>
		</div>
	</div>
</div>
<style>
#content-title{
	font-size: 30px;
	font-weight: 60;
}
#content-creator *{
	font-size: 0.9rem;
}
</style>
@endsection