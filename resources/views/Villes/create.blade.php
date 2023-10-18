@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1 class="mb-4">@lang('lang.text_city_create_title')</h1>
<form method="post" action="{{route('ville.store')}}">
	@csrf
	@method('post')
	<div class="mb-3">
		<label for="nom" id="nom" class="form-label">@lang('lang.text_city_create_form_label_name')</label>
		<input type="text" class="form-control" name="nom" placeholder="@lang('lang.text_city_create_form_label_name')">
	</div>
	<div>
		<input type="submit" class="btn btn-primary" value="@lang('lang.text_city_create_form_button_submit')">
	</div>
</form>

@endsection
