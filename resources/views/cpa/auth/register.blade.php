@extends('layouts.cpa')

@section('title', '会員登録画面')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">会員登録画面</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cpa.register') }}">
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
                            <label for="cpa_no" class="col-md-4 col-form-label text-md-right">CPA_No</label>

                            <div class="col-md-6">
                                <input id="cpa_no" type="string" class="form-control @error('cpa_no') is-invalid @enderror" name="cpa_no" value="{{ old('cpa_no') }}" required autocomplete="cpa_no">

                                @error('cpa_no')
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
                            <label for="ffs" class="col-md-4 col-form-label text-md-right">得意な会計領域</label>

                            <div class="col-md-6">
                                <input id="ffs" type="string" class="form-control @error('ffs') is-invalid @enderror" name="ffs" value="{{ old('ffs') }}" required autocomplete="ffs">

                                @error('ffs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                     
                         <div class="form-group row">
                            <label for="introduction" class="col-md-4 col-form-label text-md-right">自己紹介</label>

                            <div class="col-md-6">
                                <textarea id="introduction" class="form-control @error('introduction') is-invalid @enderror" name="introduction" rows="10" required autocomplete="introduction">{{ old('introduction') }}</textarea>

                                @error('introduction')
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