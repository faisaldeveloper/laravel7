<!-- Album Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('album_name', 'Album Name:') !!}
    {!! Form::text('album_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Album Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('album_description', 'Album Description:') !!}
    {!! Form::text('album_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('albums.index') }}" class="btn btn-default">Cancel</a>
</div>
