@extends('layouts.cpa')

@section('title', '投稿済みの質問一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>質問一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!--<a href="{{ action('Member\QuesController@add') }}" role="button" class="btn btn-primary">新規投稿</a>-->
            </div>
            <div class="col-md-8">
                <form action="{{ action('Cpa\AnswerController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2 col offset-4">会計領域</label>
                        <div class="col-md-4">
                            <select name="cond_field">
                                <option value='' disabled selected style='display:none;'>選択してください</option>
                              @foreach(config('field') as $fields => $field)
                                <option value="{{ $fields }}">{{ $field['label'] }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <table class="table table-light table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="10%">投稿者</th>
                            <th width="10%">最終更新日</th>
                            <th width="10%">会計領域</th>
                            <th width="20%">質問の題名</th>
                            <th width="40%">質問の内容</th>
                            <th width="10%">回答</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($answers as $answer)
                            <tr>
                                <td>{{ str_limit($answer->user->name, 50) }}</td>
                                <td>{{ str_limit($answer->updated_at->format('Y/m/d'), 50) }}</td>
                                <td>{{ str_limit($answer->field, 50) }}</td>
                                <td>{{ str_limit($answer->title, 100) }}</td>
                                <td>{{ str_limit($answer->body, 250) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('Cpa\AnswerController@add', ['id' => $answer->id]) }}">回答</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection