@extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>
            {{ $advert->title }}    <a style="font-size: 20px; color: red;" class="glyphicon glyphicon-pencil" 
                href="{{ route('adverts.edit', $advert->id)}}"></a>
        </h1>
        <h3>
            {{ $advert->description }}
        </h3>
        <div>
            Advertisment number #{{ $advert->number  }}
        </div>
        <div>
            Author - {{ $advert->author  }}
        </div>
        <div>
            Category - {{ $advert->category->name  }}
        </div>
        <div>
            Date - {{ $advert->created_at  }}
        </div>
        
    </div>
    @endsection