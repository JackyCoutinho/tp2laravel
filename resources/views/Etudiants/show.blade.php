@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1>@lang('lang.text_student_show_title')</h1>
<div class="mb-3">
	<table class="table">
		<thead class="table-dark">
			<tr>
				<th>@lang('lang.text_student_show_table_id')</th>
				<th>@lang('lang.text_student_show_table_name')</th>
				<th>@lang('lang.text_student_show_table_address')</th>
				<th>@lang('lang.text_student_show_table_phone')</th>
				<th>@lang('lang.text_student_show_table_email')</th>
				<th>@lang('lang.text_student_show_table_dob')</th>
				<th>@lang('lang.text_student_show_table_city')</th>
				<th>@lang('lang.text_student_show_table_update')</th>
				<th>@lang('lang.text_student_show_table_delete')</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$etudiant->id}}</td>
				<td>{{$etudiant->nom}}</td>
				<td>{{$etudiant->adresse}}</td>
				<td>{{$etudiant->phone}}</td>
				<td>{{$etudiant->email}}</td>
				<td>{{$etudiant->datedenaissance}}</td>
				<td>{{$etudiant->ville_id}}</td>
				<td>
					<a class="btn btn-warning"
						href="{{route('etudiant.edit', ['etudiant' => $etudiant])}}">@lang('lang.text_student_show_table_update')</a>
				</td>
				<td>
					<form method="post" action="{{route('etudiant.destroy', ['etudiant' => $etudiant])}}">
						@csrf
						@method('delete')
						<input type="submit" class="btn btn-danger"
							value="@lang('lang.text_student_show_table_delete')" />
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>

@endsection
