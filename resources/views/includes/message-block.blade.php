@if(count($errors) > 0){
    <div class="col-4">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
}
@endif
@if(Session::has('message'))
<div class="col-4">
    {{ Session::get('message') }}
</div>
@endif