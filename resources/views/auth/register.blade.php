@extends('layouts.app')
@section('title', 'TP2-Laravel')
@section('content')

<hr>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <form method="post">
                @csrf
                <div class="card-header text-center">
                    <h3 class="display-5">@lang('lang.text_register')</h3>
                </div>
                <div class="card-body">
                    <div class="control-grup col-12">
                        <label for="name">@lang('lang.text_name')</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                        @if($errors->has('name'))
                        <div class="text-danger mt-2">
                            {{$errors->first('name')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-grup col-12">
                        <label for="email">@lang('lang.text_email')</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-grup col-12">
                        <label for="password">@lang('lang.text_password')</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @if($errors->has('password'))
                        <div class="text-danger mt-2">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid mx-auto">
                        <input type="submit" class="btn btn-success btn-block" value="@lang('lang.text_sign_up')">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection