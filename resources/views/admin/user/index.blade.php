@extends('layouts.admin')
@section('title', '登録済みユーザーの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ユーザー一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.spot.index') }}" role="button" class="btn btn-primary">スポット一覧</a>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">ユーザー名</th>
                                <th width="50%">メールアドレス</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}" onClick='return confirm("削除しますか？");'>削除</a>
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