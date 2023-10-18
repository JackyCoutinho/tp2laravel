@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1>@lang('lang.text_student_create_title')</h1>
<form class="row g-3" method="post" action="{{route('etudiant.store')}}">
	@csrf
	@method('post')
	<div>
		<label for="nom" id="nom" class="form-label">@lang('lang.text_student_create_form_label_name')</label>
		<input type="text" class="form-control" name="nom"
			placeholder="@lang('lang.text_student_create_form_label_name')">
	</div>
	<div>
		<label for="adresse" id="adresse"
			class="form-label">@lang('lang.text_student_create_form_label_address')</label>
		<input type="text" class="form-control" name="adresse"
			placeholder="@lang('lang.text_student_create_form_label_address')">
	</div>
	<div class="col-md-6">
		<label for="phone" id="phone" class="form-label">@lang('lang.text_student_create_form_label_phone')</label>
		<input type="text" class="form-control" name="phone"
			placeholder="@lang('lang.text_student_create_form_label_phone')">
	</div>
	<div class="col-md-6">
		<label for="email" id="email" class="form-label">@lang('lang.text_student_create_form_label_email')</label>
		<input type="text" class="form-control" name="email"
			placeholder="@lang('lang.text_student_create_form_label_email')">
	</div>
	<div class="col-md-6">
		<label for="datedenaissance" id="datedenaissance"
			class="form-label">@lang('lang.text_student_create_form_label_dob')</label>
		<input type="text" class="form-control" name="datedenaissance"
			placeholder="@lang('lang.text_student_create_form_label_dob')">
	</div>
	<div class="col-md-6">
		<label for="ville_id" id="ville_id" class="form-label">@lang('lang.text_student_create_form_label_city')</label>
		<select id="ville_id" name="ville_id" class="form-select">
			@foreach($villes as $ville)
			<option value="{{$ville->id}}">{{$ville->nom}}</option>
			@endforeach
		</select>
		<!-- <input type="text" class="form-control"name="ville_id" placeholder="Ville"> -->
	</div>
	<div>
		<input type="submit" class="btn btn-primary" value="@lang('lang.text_student_create_form_button_submit')">
	</div>
</form>

@endsection
