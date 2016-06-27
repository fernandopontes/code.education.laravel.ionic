@if (count($errors) > 0)
    <ul class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif