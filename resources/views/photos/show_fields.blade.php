<!-- Photo Name Field -->
<div class="form-group">
    {!! Form::label('photo_name', 'Photo Name:') !!}
    <p>{{ $photo->photo_name }}</p>
</div>

<!-- Photo Description Field -->
<div class="form-group">
    {!! Form::label('photo_description', 'Photo Description:') !!}
    <p>{{ $photo->photo_description }}</p>
</div>

<!-- Photo Path Field -->
<div class="form-group">
    {!! Form::label('photo_path', 'Photo Path:') !!}
    <p>{{ $photo->photo_path }}</p>
</div>

<!-- Album Id Field -->
<div class="form-group">
    {!! Form::label('album_name', 'Album Name:') !!}
    <p>{{ $photo->album->album_name }}</p>
</div>

