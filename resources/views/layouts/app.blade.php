<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} - @yield('title')</title>
    <!--Bootstrap CSS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            @php $locale = session()->get('locale') @endphp
            <a class="navbar-brand" href="{{route('home')}}">@lang('lang.text_hello') {{Auth::user() ? Auth::user()->name :
				'Guest'}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @guest
                    <a class="nav-link" href="{{route('user.create')}}">@lang('lang.text_nav_registration')</a>
                    <a class="nav-link" href="{{route('login')}}">@lang('lang.text_nav_login')</a>
                    @else
                    <a class="nav-link" href="{{route('etudiant.index')}}">@lang('lang.text_nav_student_list')</a>
                    <a class="nav-link" href="{{route('ville.index')}}">@lang('lang.text_nav_city_list')</a>
                    <a class="nav-link" href="{{route('forum.index')}}">@lang('lang.text_nav_forum_list')</a>
                    <a class="nav-link" href="{{route('file.index')}}">@lang('lang.text_nav_file_list')</a>
                    <a class="nav-link" href="{{route('logout')}}">@lang('lang.text_nav_logout')</a>
                    @endguest

                    <a class="nav-link @if($locale=='en') bg-secondary @endif" href="{{route('lang', 'en')}}">@lang('lang.text_nav_english')</a>
                    <a class="nav-link @if($locale=='fr') bg-secondary @endif" href="{{route('lang', 'fr')}}">@lang('lang.text_nav_french')</a>
                    <a class="nav-link @if($locale=='pt') bg-secondary @endif" href="{{route('lang', 'pt')}}">@lang('lang.text_nav_portuguese')</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-4">
                <!-- <h1 class="display-3 mt-5">
                    {{ config('app.name')}}
                </h1> -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(!$errors->isEmpty())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</body>
<!--Bootstrap JS CDN-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

</html>