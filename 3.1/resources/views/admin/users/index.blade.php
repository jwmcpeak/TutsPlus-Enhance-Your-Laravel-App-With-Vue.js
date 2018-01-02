@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
    @endif

    <user-list
        current-user-id="{{ Auth::user()->id }}"
        :model='{{ json_encode($model) }}' />

    {{ $model->links() }}
</div>


@endsection
