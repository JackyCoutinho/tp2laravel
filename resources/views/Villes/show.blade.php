@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1>@lang('lang.text_city_show_title')</h1>
<div>
	<table class="table">
		<thead class="table-dark">
			<tr>
				<th>@lang('lang.text_city_show_table_id')</th>
				<th>@lang('lang.text_city_show_table_name')</th>
				<th>@lang('lang.text_city_show_table_update')</th>
				<th>@lang('lang.text_city_show_table_delete')</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$ville->id}}</td>
				<td>{{$ville->nom}}</td>
				<td>
					<a class="btn btn-warning"
						href="{{route('ville.edit', ['ville' => $ville])}}">@lang('lang.text_city_show_table_update')</a>
				</td>
				<td>
					<form method="post" action="{{route('ville.destroy', ['ville' => $ville])}}">
						@csrf
						@method('delete')
						<input type="submit" class="btn btn-danger" value="@lang('lang.text_city_show_table_delete')" />
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>

@endsection
