@if($errors->has('title'))
@foreach($errors->get('title') as $error)
<div class="alert alert-danger">{{ $error }}</div>
@endforeach
@endif