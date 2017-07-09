@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ redirect()->getUrlGenerator()->previous() }}"><- go back</a>

    <div>
         <h2>
            Advertisments
            <a href="{{ route('adverts.create')}}" class="btn btn-default">Create</a>
        </h2>
    </div>

<table class="table">
 
</table>
    <div>
        @foreach ($adverts as $add)
            <div> 
                <span>#{{ $add->number }} </span>

                <a href="{{ route('adverts.show', $add->id)}}">{{ $add->title }}</a>

                -Category: {{ $add->category->name}}
                ({{ $add->created_at}})

                @if($add->is_active)<span>(Active)</span>
                @endif

                <a style="font-size: 20px; color: red;" class="glyphicon glyphicon-pencil" 
                href="{{ route('adverts.edit', $add->id)}}"></a>
            </div>
        @endforeach
    </div>
</div>
@endsection


