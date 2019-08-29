@extends('layouts.cpa')

@section('title', '回答記入画面')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>回答記入</h2>
                <form action="{{ action('Cpa\AnswerController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="field">会計領域</label>
                        <div class="col-md-10">
                            <p>{{ $question->field }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">題名</label>
                        <div class="col-md-10">
                            <p>{{ $question->title }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="question_body">質問の内容</label>
                        <div class="col-md-10">
                            <p>{{ $question->body }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">回答</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20" placeholder="回答を記入してください。">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    
                    {{ csrf_field() }}
                    <div class="col-md-8 offset-md-4">
                        <input type="submit" class="btn btn-primary" value="回答" style="margin-right:20px;">
                        <input type="reset" class="btn btn-primary" value="リセット" style="margin-left:20px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection