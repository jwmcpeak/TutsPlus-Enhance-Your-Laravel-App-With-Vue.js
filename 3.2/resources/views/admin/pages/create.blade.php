@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create New</h1>
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
        action-url="{{ route('pages.store') }}"
        csrf-token="{{ csrf_token() }}"
        :model='{!! json_encode($model) !!}' 
        :order-pages='{!! json_encode($orderPages) !!}' />
</div>


@endsection
