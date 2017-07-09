@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ redirect()->getUrlGenerator()->previous() }}"><- go back</a>
    <div>
         <h2>
            Categories
            <a href="{{ route('categories.create')}}" class="btn btn-default">Create</a>
        </h2>
    </div>

    <div>
        @foreach ($categories as $cat)
            <div> 
                <span>#{{ $cat->order }}</span>

                 {{ $cat->name }}
 
                @if($cat->is_active)<span>(Active)</span>
                @endif 

                <a style="font-size: 20px; color: red;" class="glyphicon glyphicon-pencil" 
                href="{{ route('categories.edit', $cat->id)}}"></a>
            </div>
        @endforeach
    </div>
</div>
@endsection
