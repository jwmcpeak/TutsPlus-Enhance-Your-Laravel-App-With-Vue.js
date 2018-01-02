{!! csrf_field() !!}

@if (!$errors->isEmpty())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $message)
    
        <li>{{$message}}</li>

        @endforeach
    </ul>

</div>

@endif

<pages-form-fields :model='{!! json_encode($model) !!}' :order-pages='{!! json_encode($orderPages) !!}' />







