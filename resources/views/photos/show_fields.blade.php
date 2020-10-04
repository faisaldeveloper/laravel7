<!-- Photo Name Field -->
<div class="form-group">
    {!! Form::label('photo_name', 'Name:') !!}
    <p>{{ $photo->photo_name }}</p>
</div>

<!-- Photo Description Field -->
<div class="form-group">
    {!! Form::label('photo_description', 'Description:') !!}
    <p>{{ $photo->photo_description }}</p>
</div>

<!-- Album Id Field -->
<div class="form-group">
    {!! Form::label('album_name', 'Album Name:') !!}
    <p>{{ $photo->album->album_name }}</p>
</div>

<!-- Photo Path Field -->
<div class="form-group center">
    {!! Form::label('photo_path', 'Photo:') !!}
    @if (strpos($photo->photo_path, '/') == true)
    <p><img src="{{ $photo->photo_path }}" width="550" height="400" alt="image" /></p>
    @else
    <p><img src="{{ asset('images/'.$photo->photo_path) }}" width="550" height="400" alt="image" /></p>
    @endif
</div>



