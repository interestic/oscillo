@extends('layout.default')

        <!-- Main Content -->
@section('content')
    <div class="row">
        <div class="medium-6 medium-centered large-4 large-centered columns">
            <div class="panel-heading">Reset Password</div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <div class="alert callout">
                                    <p>{{ $errors->first('email') }}.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <button class="small button" name="Send" type="submit">send password reset link</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection
