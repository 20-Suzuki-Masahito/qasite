@extends('layouts.app')

@section('title', '会員登録画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">会員登録画面</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="string" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('messages.Gender') }}</label>

                            <div class="col-md-6 form-inline">
                                <div class="radio" style="margin-right:10px;">
                                    <label for="man"><input id="man" type="radio" name="gender" value="男性">男性</label>
                                </div>
                                <div class="radio" style="margin:0,10px,0;">
                                    <label for="woman"><input id="woman" type="radio" name="gender" value="女性">女性</label>
                                </div>
                                <div class="radio" style="margin-left:10px;">
                                    <label for="someone"><input id="someone" type="radio" name="gender" value="その他">その他</label>
                                </div>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert" style="display:inline;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('messages.Birthday') }}</label>

                            <div class="col-md-6" style="margin-top:8px;">
                                {{Form::selectRange('birthday', 1901, 2019, '', ['placeholder' => '','required' => 'required'])}}年
                                {{Form::selectRange('birthday', 1, 12, '', ['placeholder' => '','required' => 'required'])}}月
                                {{Form::selectRange('birthday', 1, 31, '', ['placeholder' => '','required' => 'required'])}}日

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert" style="display:inline;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="profession" class="col-md-4 col-form-label text-md-right">{{ __('messages.Profession') }}</label>

                            <div class="col-md-6">
                                <input id="profession" type="string" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession">

                                @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="purpose" class="col-md-4 col-form-label text-md-right">{{ __('messages.Purpose') }}</label>

                            <div class="col-md-6 form-inline">
                                <div class="radio" style="margin-right:10px;">
                                    <label for="job"><input id="job" type="radio" name="purpose" value="仕事" checked>仕事</label>
                                </div>
                                <div class="radio" style="margin:0,10px,0;">
                                    <label for="study"><input id="study" type="radio" name="purpose" value="勉強">勉強</label>
                                </div>
                                <div class="radio" style="margin-left:10px;">
                                    <label for="other"><input id="other" type="radio" name="purpose" value="その他">その他</label>
                                </div>

                                @error('purpose')
                                    <span class="invalid-feedback" role="alert" style="display:inline;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <textarea id="purpose" class="form-control @error('purpose') is-invalid @enderror" name="purpose" rows="10" required autocomplete="purpose" placeholder="目的がその他の場合に記入してください。" disabled>{{ old('purpose') }}</textarea>
                                
                                @error('purpose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-right:10px;">
                                    {{ __('messages.Register') }}
                                </button>
                                <button type="reset" class="btn btn-primary" style="margin-left:10px;">
                                    {{ __('messages.Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection