{!! Form::model($monitoringGroup, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span> </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', $monitoringGroup->name, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Name']) }}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $monitoringGroup->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Description']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Icon </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('icon', $monitoringGroup->icon, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Icon']) }}

            @if ($errors->has('icon'))
                <span class="help-block">
                    <strong>{{ $errors->first('icon') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="/gedung" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
