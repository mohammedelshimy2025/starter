<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Mohamed And Sohila</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</nav>


<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <h1 class="text-center title m-b-md" style="font-weight:bold; margin-top:50px; font-size:70px; color:#555;">{{__('messages.Add Your Offer')}}</h1>
            @if(Session::has('success'))

                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>

            @endif
            <form method="POST" action="{{route('offers.update' , ['id' => $offer -> id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="text-center mt-5">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Upload Image</label>
                            <input type="file" class="form-control" name="photo">
                            @error('photo')
                            <span class="form-text text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('messages.offer name_ar require')}}</label>
                            <input type="text" class="form-control" name="name_ar" value="{{$offer -> name_ar}}">
                            @error('name_ar')
                            <span class="form-text text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('messages.Offer Name_en')}}</label>
                            <input type="text" class="form-control" name="name_en" value="{{$offer -> name_en}}">
                            @error('name_en')
                            <span class="form-text text-danger" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">{{__('messages.Offer Price')}}</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="price" value="{{$offer -> price}}">
                            </div>
                            @error('price')
                            <span class="form-text text-danger" role="alert">
                                      <strong>{{$message}}</strong>
                                  </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">{{__('messages.Offer Details_ar')}}</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="details_ar" value="{{$offer -> details_ar}}">
                            </div>
                            @error('details_ar')
                            <span class="form-text text-danger" role="alert">
                                      <strong>{{$message}}</strong>
                                  </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">{{__('messages.Offer Details_en')}}</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="details_en" value="{{$offer -> details_en}}">
                            </div>
                            @error('details_en')
                            <span class="form-text text-danger" role="alert">
                                      <strong>{{$message}}</strong>
                                  </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 col-sm-push-2">
                                <input type="submit" id="submit" class="btn btn-primary" value="{{__('messages.Save Offer')}}">
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>


    </div>
</div>
</body>
</html>
