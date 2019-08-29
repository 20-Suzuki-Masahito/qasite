@extends('layouts.app')

@section('title', '質問投稿画面')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <h2>質問投稿</h2>
                <form action="{{ action('Member\QuesController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="field">会計領域</label>
                        <div class="col-md-4">
                            <select name="field">
                                <option value='' disabled selected style='display:none;'>選択してください</option>
                              @foreach(config('field') as $fields => $field)
                                <option value="{{ $fields }}">{{ $field['label'] }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">題名</label>
                        <div class="col-md-10">
                            <input type="string" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">質問の内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20" placeholder="質問の内容を記入してください。">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="file">ファイル</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="file">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="col-md-8 offset-md-4">
                        <input type="submit" class="btn btn-primary" value="投稿" style="margin-right:20px;">
                        <input type="reset" class="btn btn-primary" value="リセット" style="margin-left:20px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection