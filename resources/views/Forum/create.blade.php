@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1>@lang('lang.text_forum_create_header')</h1>
<form class="row g-3" method="post" action="{{route('forum.store')}}">
	@csrf
	@method('post')
	<div>
		<label for="title" id="title" class="form-label">@lang('lang.text_forum_create_title')</label>
		<input type="text" class="form-control" name="title" placeholder="Title">
	</div>
	<div>
		<label for="body" id="body" class="form-label">@lang('lang.text_forum_create_body')</label>
		<textarea class="form-control" name="body" rows="5"></textarea>
	</div>
	<div class="col-md-6">
		<label for="langue_id" id="langue_id" class="form-label">@lang('lang.text_forum_create_language')</label>
		<select id="langue_id" name="langue_id" class="form-select">
			@foreach($langues as $langue)
			<option value="{{$langue->id}}">{{$langue->langue}}</option>
			@endforeach
		</select>
	</div>
	<div>
		<input type="submit" class="btn btn-primary" value="@lang('lang.text_forum_create_send')">
	</div>
</form>

@endsection
