@extends('layout.default')

@section('content')
    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">
            <div class="panel-heading">Reset Password</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                    {!! csrf_field() !!}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                            @if ($errors->has('email'))
                                <div class="alert callout">
                                    <p>{{ $errors->first('email') }}.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <div class="alert callout">
                                    <p>{{ $errors->first('password') }}.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <div class="alert callout">
                                    <p>{{ $errors->first('password_confirmation') }}.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-refresh"></i>Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
