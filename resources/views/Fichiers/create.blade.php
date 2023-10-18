@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<h1 class="mb-4">@lang('lang.text_file_create_title')</h1>

<form action="{{ url('file') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<button type="submit">@lang('lang.text_file_create_button_send')</button>
</form>

@endsection
