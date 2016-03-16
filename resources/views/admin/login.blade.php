@include('admin.partials._header', ['title' => "Администрирование - Вход"])

<p>&nbsp;</p>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Администрирование - Вход</div>
				<div class="panel-body">
                    @include('admin.partials._status')
                    @include('admin.partials._errors')
					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
						{!! csrf_field() !!}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
									<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Пароль</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Запомнить меня
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-sign-in"></i> Вход</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@include('admin.partials._flash')
@include('admin.partials._footer')