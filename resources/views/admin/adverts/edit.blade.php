@extends('layouts.app')


@section('content')
<div class="container">
<a href="{{ redirect()->getUrlGenerator()->previous() }}"><- go back</a>
<ul>
    @foreach($errors->all() as $error)
    <li>
        {{ $error }}
    </li>
    @endforeach


</ul>
   <form action="{{ route('adverts.update', $adverts->id) }}" method="post" enctype='multipart/form-data'>
    {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="panel panel-default">
        <div class="panel-body">Adertisment Number</div>
        <div class="panel-footer"><input name="number" id="number" type="number" value="{{$adverts->number}}"></div>
        </div> 
        
        <div class="panel panel-default">
        <div class="panel-body">Adertisment Title</div>
        <div class="panel-footer"><input name="title" id="title" type="text" value="{{$adverts->title}}"></div>
        </div> 

        <div class="panel panel-default">
        <div class="panel-body">Adertisment Description</div>
        <div class="panel-footer"><input name="description" id="description" type="text" value="{{$adverts->description}}"></div>
        </div> 

        <div class="panel panel-default">
        <div class="panel-body">Adertisment Author</div>
        <div class="panel-footer"><input name="author" id="author" type="text" value="{{$adverts->author}}"></div>
        </div> 

        <div class="panel panel-default">
        <div class="panel-body">Select Category</div>
        <div class="panel-footer"><select name="category_id" id="category_id" value="0">
                @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"
                    @if (old('category_id') == $cat->id) 
                        selected
                        @endif>
                    {{ $cat->name }}
                </option>
                @endforeach
            </select></div>
        </div> 

        <div class="panel panel-default">
        <div class="panel-body" {{ $errors->first('status') }}>Adertisment Status</div>
        <div class="panel-footer">
                {!! Form::hidden('is_active', 0) !!}
                {!! Form::checkbox('is_active', 1) !!}</div>
        </div>

        <button type="save" class="btn btn-default">Save</button>
</form>
</div>
@endsection
