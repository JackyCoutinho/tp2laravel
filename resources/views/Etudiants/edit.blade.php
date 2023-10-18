@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1>@lang('lang.text_student_edit_title')</h1>
<form class="row g-3" method="post" action="{{route('etudiant.update', ['etudiant' => $etudiant])}}">
	@csrf
	@method('put')
	<div>
		<label for="nom" id="nom" class="form-label">@lang('lang.text_student_edit_form_label_name')</label>
		<input type="text" class="form-control" name="nom" placeholder="Nom" value="{{$etudiant->nom}}">
	</div>
	<div>
		<label for="adresse" id="adresse" class="form-label">@lang('lang.text_student_edit_form_label_address')</label>
		<input type="text" class="form-control" name="adresse" placeholder="Adresse" value="{{$etudiant->adresse}}">
	</div>
	<div class="col-md-6">
		<label for="phone" id="phone" class="form-label">@lang('lang.text_student_edit_form_label_phone')</label>
		<input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$etudiant->phone}}">
	</div>
	<div class="col-md-6">
		<label for="email" id="email" class="form-label">@lang('lang.text_student_edit_form_label_email')</label>
		<input type="text" class="form-control" name="email" placeholder="Email" value="{{$etudiant->email}}">
	</div>
	<div class="col-md-6">
		<label for="datedenaissance" id="datedenaissance"
			class="form-label">@lang('lang.text_student_edit_form_label_dob')</label>
		<input type="text" class="form-control" name="datedenaissance" placeholder="Date de Naissance"
			value="{{$etudiant->datedenaissance}}">
	</div>
	<div class="col-md-6">
		<label for="ville_id" id="ville_id" class="form-label">@lang('lang.text_student_edit_form_label_city')</label>
		<select id="ville_id" name="ville_id" class="form-select">
			@foreach($villes as $ville)
			<option value="{{$ville->id}}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>{{$ville->nom}}
			</option>
			@endforeach
		</select>
	</div>
	<div>
		<input type="submit" class="btn btn-primary" value="@lang('lang.text_student_edit_form_button_submit')">
	</div>
</form>

@endsection
