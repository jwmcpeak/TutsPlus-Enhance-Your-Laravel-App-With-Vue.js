@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Page</h1>
    @if (!$errors->isEmpty())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $message)
        
            <li>{{$message}}</li>

            @endforeach
        </ul>

    </div>

    @endif

    <pages-form 
        action-url="{{ route('pages.update', ['page' => $model->id]) }}"
        csrf-token="{{ csrf_token() }}"
        method-field="PUT"
        :model='{!! json_encode($model) !!}' 
        :order-pages='{!! json_encode($orderPages) !!}' />
</div>


@endsection