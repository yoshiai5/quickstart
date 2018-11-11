{{-- 親ページを呼ぶ --}}
@extends('layouts.app')

{{-- 親ページへの挿入内容 --}}
@section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>


    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        {{-- テンプレートのロードを行う --}}
        @include('common.errors')

        <!-- 新タスクフォーム -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- タスク名 -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">タスク</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- タスク追加ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i> タスク追加
                    </button>
                </div>
            </div>
        </form>
    </div>
            </div>

    <!-- TODO: 現在のタスク -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                現在のタスク
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- タスク名 -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <!-- 削除ボタン -->
                                <td>
                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                        {{-- HTMLフォームはGETとPOST HTTP動詞のみを許している為、フォームのDELETEリクエストは下記で指定。 --}}
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                            {{-- フォームのDELETEリクエスト定義。下記を作成する --}}
                                            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> 削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
        </div>
    </div>
@endsection
