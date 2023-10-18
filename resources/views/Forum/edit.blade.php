@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<div class="row">
	<div class="col-12 text-center pt-2">
		<h1 class="display-one">
			@lang('lang.text_forum_edit_title')
		</h1>
	</div> <!--/col-12-->
</div><!--/row-->
<hr>
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<form method="post">
				@method('put')
				@csrf
				<div class="card-header">
					@lang('lang.text_forum_edit_form')
				</div>
				<div class="card-body">
					<div class="control-grup col-12">
						<label for="title">@lang('lang.text_forum_edit_form_title')</label>
						<input type="text" id="title" name="title" class="form-control"
							value="{{$forumArticle->title}}">
					</div>
					<div class="control-grup col-12">
						<label for="message">@lang('lang.text_forum_edit_form_message')</label>
						<textarea class="form-control" id="message" name="body">{{$forumArticle->body}}</textarea>
					</div>
					<div class="control-grup col-6">
						<label for="langue_id" class="form-label">@lang('lang.text_forum_edit_form_language')</label>
						<select id="langue_id" name="langue_id" class="form-select">
							@foreach($langues as $langue)
							<option value="{{$langue->id}}" {{$forumArticle->langue_id == $langue->id ? 'selected' : ''
								}}>{{$langue->langue}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="card-footer">
					<input type="submit" class="btn btn-success" value="@lang('lang.text_forum_edit_form_submit')">
				</div>
			</form>
		</div>
	</div>
</div>
{{-- <div>
	{{ $abc }}
</div> --}}
@endsection
