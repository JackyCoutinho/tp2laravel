@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<hr>
<h1>@lang('lang.text_file_index_title')</h1>
<div class="mb-3 mt-3">
    <a href="{{route('file.create')}}">@lang('lang.text_file_index_add')</a>
</div>
<div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>@lang('lang.text_file_index_table_id')</th>
                <th>@lang('lang.text_file_index_table_name')</th>
                <th>@lang('lang.text_file_index_table_user')</th>
                <th>@lang('lang.text_file_index_table_date')</th>
                <th>@lang('lang.text_file_index_table_show')</th>
                <th>@lang('lang.text_file_index_table_update')</th>
                <th>@lang('lang.text_file_index_table_delete')</th>
            </tr>
        </thead>
        @foreach($files as $file)
        <tbody>
            <tr>
                <td>{{$file->id}}</td>
                <td>{{$file->nom}}</td>
                <td>
                    @foreach($users as $user)
                    {{ $file->user_id == $user->id ? $user->email : '' }}
                    @endforeach
                </td>
                <td>{{$file->created_at}}</td>
                <td>
                    <a class="btn btn-success" href="{{ asset('storage/' . $file->chemain) }}">@lang('lang.text_file_index_table_show')</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{route('file.edit', ['file' => $file])}}">@lang('lang.text_file_index_table_update')</a>
                </td>
                <td>
                    <form method="post" action="{{route('file.destroy', ['file' => $file])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="@lang('lang.text_file_index_table_delete')" />
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="text-center">
        {{ $files->links() }}
    </div>
</div>

@endsection