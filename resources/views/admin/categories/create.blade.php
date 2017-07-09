@extends('layouts.app')

@section('content')
    <div class="container">
    <a href="{{ redirect()->getUrlGenerator()->previous() }}"><- go back</a>
        <h2>Create new Category</h2>
            <form action="{{ route('categories.store') }}" method="post">
            {{ csrf_field() }}

            <div class="panel panel-default">
            <div class="panel-body"> {{ $errors->first('name') }}
            Category name
            </div>
            <div class="panel-footer"><input type="text" name="name" value="{{old('name')}}"></div>
            </div>
            
            <div class="panel panel-default">
            <div class="panel-body"> {{ $errors->first('order') }}
            Category order number
            </div>
            <div class="panel-footer"><input type="number" name="order" value="{{old('order')}}"></div>
            </div>

            <div class="panel panel-default">
            <div class="panel-body"> {{ $errors->first('status') }} 
            Category Status
            </div>
            <div class="panel-footer">
                {!! Form::hidden('is_active', 0) !!}
                {!! Form::checkbox('is_active', 1) !!}</div>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div>
@endsection

