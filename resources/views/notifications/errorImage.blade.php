@if($errors->has('image'))
@foreach($errors->get('image') as $error)
<div class="alert alert-danger">{{ $error }}</div>
@endforeach
@endif