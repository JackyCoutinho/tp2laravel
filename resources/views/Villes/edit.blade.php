@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1 class="mb-4">@lang('lang.text_city_edit_title')</h1>
<form method="post" action="{{route('ville.update', ['ville' => $ville])}}">
	@csrf
	@method('put')
	<div class="mb-3">
		<label for="nom" class="form-label">@lang('lang.text_city_edit_form_label_name')</label>
		<input type="text" lass="form-control" id="nom" name="nom"
			placeholder="@lang('lang.text_city_edit_form_label_name')" value="{{$ville->nom}}">
	</div>
	<div class="mb-3">
		<input type="submit" class="btn btn-primary" value="@lang('lang.text_city_edit_form_button_submit')">
	</div>
</form>

@endsection
