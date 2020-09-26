<!-- Album Name Field -->
<div class="form-group">
    {!! Form::label('album_name', 'Album Name:') !!}
    <p>{{ $album->album_name }}</p>
</div>

<!-- Album Description Field -->
<div class="form-group">
    {!! Form::label('album_description', 'Album Description:') !!}
    <p>{{ $album->album_description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $album->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $album->updated_at }}</p>
</div>

