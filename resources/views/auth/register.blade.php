@extends('layout.default')

@section('content')
    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">
            <H1 class="panel-heading">
                Register
            </H1>

            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Username</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <div class="alert callout">
                                    <p>{{ $errors->first('name') }}.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Email Address</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <div class="alert callout">
                                    <p class="alert">{{ $errors->first('email') }}.</p>
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

                    <button class="small button" name="Send" type="submit">Register</button><br>
                </form>
            </div>
        </div>
    </div>
@endsection
