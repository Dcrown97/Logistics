@if ($message = Session::get('success'))
<div class = 'alert'>
    
    <strong>{{$message}}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class = 'alert'>
    
    <strong>{{$message}}</strong>
</div>
@endif

@if ($errors->any())
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif
