@extends('layouts.app')

@section('content')
    <div class="container">
    <a href="{{ redirect()->getUrlGenerator()->previous() }}"><- go back</a>
        <h2>Edit Category</h2>
            <form action="{{ route('categories.update', $category->id) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">

            <div class="panel panel-default">
            <div class="panel-body"> {{ $errors->first('name') }}
            Category name
            </div>
            <div class="panel-footer"><input type="text" name="name" value="{{ $category->name }}"></div>
            </div>
            
            <div class="panel panel-default">
            <div class="panel-body"> {{ $errors->first('order') }}
            Category order number
            </div>
            <div class="panel-footer"><input type="number" name="order" value="{{ $category->order }}"></div>
            </div>

            <div class="panel panel-default">
            <div class="panel-body"> {{ $errors->first('status') }} 
            Category Status
            </div>
            <div class="panel-footer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" @if ($category->is_active==1) checked 
                @endif></div>
            </div>

            <button type="save" class="btn btn-default">Save</button>
            </form>
    </div>
@endsection