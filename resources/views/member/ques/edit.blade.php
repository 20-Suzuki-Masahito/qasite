@extends('layouts.app')
@section('title', '質問内容修正')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>質問内容修正</h2>
                <form action="{{ action('Member\QuesController@update') }}" method="post" enctype="multipart/form-data">
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
                              @foreach(config('field') as $fields => $field)
                                <option value="{{ $question_form->field }}">{{ $field['label'] }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">題名</label>
                        <div class="col-md-10">
                            <input type="string" class="form-control" name="title" value="{{ $question_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">質問の内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $question_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="file">ファイル</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="file">
                            <div class="form-text text-info">
                                設定中: {{ $question_form->file_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">ファイルを削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $question_form->id }}">
                            {{ csrf_field() }}
                    <div class="col-md-8 offset-md-4">
                        <input type="submit" class="btn btn-primary" value="修正" style="margin-right:20px;">
                        <input type="button" onclick="history.back()" class="btn btn-primary" value="戻る" style="margin-left:20px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection