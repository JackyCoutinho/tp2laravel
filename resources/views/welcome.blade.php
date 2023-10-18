@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<div class="jumbotron text-center">
	<h1 class="display-4">@lang('lang.text_welcome_title')</h1>
	<p class="lead">@lang('lang.text_welcome_subtitle')</p>
	<hr class="my-4">
	<p>@lang('lang.text_welcome_message')</p>
	<a href="{{route('etudiant.index')}}" class="btn btn-outline-primary">@lang('lang.text_welcome_access_students')</a>
	<a href="{{route('ville.index')}}" class="btn btn-outline-primary">@lang('lang.text_welcome_access_cities')</a>
	<a href="{{route('forum.index')}}" class="btn btn-outline-primary">@lang('lang.text_welcome_access_forum')</a>
	<a href="{{route('file.index')}}" class="btn btn-outline-primary">@lang('lang.text_welcome_access_files')</a>
</div>

@endsection
