@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1>@lang('lang.text_city_index_title')</h1>
<div class="mb-3 mt-3">
    <a href="{{route('ville.create')}}">@lang('lang.text_city_index_add')</a>
</div>
<div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>@lang('lang.text_city_index_table_id')</th>
                <th>@lang('lang.text_city_index_table_name')</th>
                <th>@lang('lang.text_city_index_table_show')</th>
                <th>@lang('lang.text_city_index_table_update')</th>
                <th>@lang('lang.text_city_index_table_delete')</th>
            </tr>
        </thead>
        @foreach($villes as $ville)
        <tbody>
            <tr>
                <td>{{$ville->id}}</td>
                <td>{{$ville->nom}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('ville.show', ['ville' => $ville])}}">@lang('lang.text_city_index_table_show')</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{route('ville.edit', ['ville' => $ville])}}">@lang('lang.text_city_index_table_update')</a>
                </td>
                <td>
                    <form method="post" action="{{route('ville.destroy', ['ville' => $ville])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="@lang('lang.text_city_index_table_delete')" />
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>

@endsection