{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'スポットの新規作成'を埋め込む --}}
@section('title', 'スポットの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>スポット登録画面</h2>
                <form action="{{ route('admin.spot.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">スポット名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="spot_name" value="{{ old('spot_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="summary" rows="5">{{ old('summary') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">季節</label>
                        <div class="col-md-3">
                            {{Form::select('season', ['' => '選択してください', '0' => '春', '1' => '夏','2' => '秋', '3' => '冬', '4' => 'いつでも'], '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">天気</label>
                            <div class="col-md-3">
                                {{Form::select('weather', ['' => '選択してください', '0' => '晴れ', '1' => '雨','2' => '曇り', '3' => '雪', '4' => 'いつでも'], '', ['class' => 'form-control'])}}
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">対象年齢</label>
                        <div class="col-md-2">
                            <input type="number" class="col-md-5" name="target_start_age">
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="col-md-5" name="target_end_age">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">時間帯</label>
                        <div class="col-md-2">
                            <input type="time" name="start_time_zone">
                        </div>
                        <div class="col-md-2">
                            <input type="time" name="end_time_zone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">滞在時間</label>
                        <div class="col-md-10">
                            <input type="number" class="" name="stay_time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">エリア(県)</label>
                        <div class=col-md-3>
                            <select type="text" class="form-control" name="prefecture_id" required>
                                <option disabled style='display:none;' @if (empty($spot->prefecture_id)) selected @endif>選択してください</option>
                                @foreach($prefectures as $pref)
                                    <option value="{{ $pref->id }}" @if (isset($spot->prefecture_id) && ($spot->prefecture_id === $pref->id)) selected @endif>{{ $pref->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">エリア(エリア)</label>
                        <div class=col-md-3>
                            <input type="text" class="col-md-12" name="area_city" value="{{ old('area_city') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">種別</label>
                        <div class="col-md-3">
                            {{Form::select('kinds', ['' => '選択してください', '0' => 'お出かけスポット', '1' => '授乳室・おむつ替えスポット','2' => '飲食店'], '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像添付</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
                <div>
                     <a href="{{ route('admin.spot.index') }}">一覧へ戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection