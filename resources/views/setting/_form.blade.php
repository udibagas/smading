{!! Form::model($setting, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method, 'files' => true]) !!}

    <div class="form-group{{ $errors->has('parameter') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-parameter">Parameter <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('parameter', $setting->parameter, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Parameter']) }}

            @if ($errors->has('parameter'))
                <span class="help-block">
                    <strong>{{ $errors->first('parameter') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $setting->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Description']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Value <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('value', $setting->value, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Value']) }}

            @if ($errors->has('value'))
                <span class="help-block">
                    <strong>{{ $errors->first('value') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="{{url('setting')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
