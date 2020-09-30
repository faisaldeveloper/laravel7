<!-- Photo Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo_name', 'Photo Name:') !!}
    {!! Form::text('photo_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Photo Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo_description', 'Photo Description:') !!}
    {!! Form::text('photo_description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Photo Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo_path', 'Photo Path:') !!}
    {!! Form::text('photo_path', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Album Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('album_name', 'Album:') !!}
    {!! Form::select('album_id', $albums, null, ['class' => 'form-control']) !!}    
</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('photos.index') }}" class="btn btn-default">Cancel</a>
</div>
