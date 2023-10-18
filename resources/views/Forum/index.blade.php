@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<hr>
<div class="row">
	<div class="col-md-8">
		<p>@lang('lang.text_forum_index_header_message')</p>
	</div>
	<div class="col-md-4">
		<a href="{{ route('forum.create')}}" class='btn btn-primary'>@lang('lang.text_forum_index_create')</a>
	</div>
</div>
<div class="row mt-3">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>@lang('lang.text_forum_index_article_header')</h4>
			</div>
			<div class="card-body">

				<ul>
					@forelse($articles as $article)
					<li><a href="{{route('forum.show', $article->id)}}">{{ $article->title }}</a></li>
					@empty
					<li class='text-danger'>@lang('lang.text_forum_index_article_message')</li>
					@endforelse
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
