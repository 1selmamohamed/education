@if(count($errors) > 0)
    @foreach( $errors->all() as $error)
        <ul class="list-group">
            <li class="list-group-item list-group-item-danger"> {{ $error }}</li>
        </ul>
    @endforeach
    <br>
@endif
