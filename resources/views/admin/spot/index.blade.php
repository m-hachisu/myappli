@extends('layouts.admin')
@section('title', '登録済みスポットの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>スポット一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.spot.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.spot.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">スポット名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_spot" value="{{ $cond_spot }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">スポット名</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $spot)
                                <tr>
                                    <th>{{ $spot->id }}</th>
                                    <td>{{ Str::limit($spot->spot_name, 100) }}</td>
                                    <td>{{ Str::limit($spot->summary, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.spot.edit', ['id' => $spot->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.spot.delete', ['id' => $spot->id]) }}" onClick='return confirm("削除しますか？");'>削除</a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection