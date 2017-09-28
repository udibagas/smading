{!! Form::model($user, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', $user->name, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Name']) }}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-email">Email <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('email', $user->email, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Email']) }}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-password">Password <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::password('password', ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Password']) }}

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-password_confirmation">Password Confirmation <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::password('password_confirmation', ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Password Confirmation']) }}

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <label for="role" class="control-label col-md-3 col-sm-3 col-xs-12">Role <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('role',
                \App\User::getRole(),
                $user->role, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Role --'
                ]
            ) }}

            @if ($errors->has('role'))
                <span class="help-block">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="{{url('user')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
