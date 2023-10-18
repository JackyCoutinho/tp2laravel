@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')
<hr>
<div class="row">
    <div class="col-12 pt-2">
        <a href="{{ route('forum.index')}}" class="btn btn-outline-primary btn-sm">@lang('lang.text_forum_show_return')</a>
        <h4 class="display-4 mt-5">
            {{ $forumArticle->title }}
        </h4>
        <hr>
        <p>
            {!! $forumArticle->body !!}
        </p>
        <p>
            <strong>@lang('lang.text_forum_show_author'): </strong> {{ $forumArticle->forumHasUser->name }}
        </p>
        <p>
            <strong>@lang('lang.text_forum_show_date_created'): </strong> {{ $forumArticle->created_at }}
        </p>
        <p>
            <strong>@lang('lang.text_forum_show_language'): </strong> {{ $forumArticle->forumHasLangue->langue }}
        </p>
    </div>
</div>
<hr>
<div class="row mb-5">
    <div class="col-6">
        <a href="{{route('forum.edit', $forumArticle->id)}}" class="btn btn-primary">@lang('lang.text_forum_show_update')</a>
    </div>
    <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            @lang('lang.text_forum_show_delete')
        </button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_forum_show_modal_delete')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @lang('lang.text_forum_show_modal_message') {{ $forumArticle->title}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_forum_show_modal_close')</button>
                <form action="{{route('forum.delete', $forumArticle->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="@lang('lang.text_forum_show_modal_delete')" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection