@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-box card">
                    <div class="col-md-8 text-center mx-auto">{{ __('messages.login') }}</div>

                    <div class="login-body card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('messages.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.login') }}
                                    </button>
                                </div>
                                 <a class="btn btn-link" href="{{ url('password/request') }}">
                                    パスワードを忘れた方はこちら
                                 </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 border p-2 m-4">
                <h4>無料のユーザー登録で、次のサービスがご利用いただけます。</h4>
                    <li>お出かけスポットのレビュー</li>
                    <li>お出かけスポット、お出かけコースのお気に入り登録</li>
                    <li>お子様情報反映によるお出かけコース検索時の最適化</li>
                <div class="col-md-12 text-center p-4">
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('register') }}'">{{ __('ユーザー登録(無料)はこちらから') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection