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

        <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Offer Name')}}</th>
            <!-- <th scope="col">{{__('messages.Offer Name_en')}}</th> -->
            <th scope="col">{{__('messages.Offer Price')}}</th>
            <th scope="col">{{__('messages.Offer Details')}}</th>
            <th scope="col">{{__('messages.Offer Operation')}}</th>
          </tr>
        </thead>
        <tbody>

        @if(Session::has('success'))

            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>

        @endif
        @if(Session::has('error'))

            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>

        @endif

          @foreach ($offers as $offer)

          <tr>
            <th scope="row">{{$offer -> id}}</th>
            <td>{{$offer -> name}}</td>
            <td>{{$offer -> price}}</td>
            <td>{{$offer -> details}}</td>
              <td>
                  <img style="width: 50px; height: 50px;" src="{{asset('images/offers/'.$offer->photo)}}">
              </td>
              <td class="td-actions">
                  <a href="{{route('offers.edit', ['id' => $offer -> id])}}" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                      <i class="material-icons">edit</i>
                  </a>
              </td>
              <td class="td-actions">
                  <a href="{{route('offers.delete' , ['id' => $offer -> id])}}" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                      <i class="material-icons">close</i>
                  </a>
              </td>
          </tr>

          @endforeach;

        </tbody>
      </table>
    </body>
</html>
