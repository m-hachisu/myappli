@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>操作一覧</h2>
        <div class=index-console>
            <div class="col-md-8">
                <a href="{{ route('admin.spot.index') }}">スポット登録一覧</a>
            </div>
            <div class="col-md-8">
                <a href="{{ route('admin.user.index') }}">ユーザー登録一覧</a>
            </div>
        </div>
    </div>
</div>
@endsection
