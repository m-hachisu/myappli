@extends('layouts.admin')
@section('title', 'スポットの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>スポット編集画面</h2>
                <form action="{{ route('admin.spot.update') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="spot_name" value="{{ $spot_form->spot_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="summary" rows="5">{{ $spot_form->summary }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">季節</label>
                        <div class="col-md-2">
                            <select name="season">
                                <option value="">選択してください</option>
                                <option value="0">春</option>
                                <option value="1">夏</option>
                                <option value="2">秋</option>
                                <option value="3">冬</option>
                                <option value="4">いつでも</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">天気</label>
                            <div class="col-md-6">
                                <select name="weather">
                                    <option value="">選択してください</option>
                                    <option value="0">晴</option>
                                    <option value="1">雨</option>
                                    <option value="2">曇り</option>
                                    <option value="3">雪</option>
                                    <option value="4">いつでも</option>
                                </select>
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
                        <div class=col-md-2>
                            <select type="text" class="form-control" name="prefecture_id" required>
                                <option disabled style='display:none;' @if (empty($post->prefecture_id)) selected @endif>選択してください</option>
                                @foreach($prefectures as $pref)
                                    <option value="{{ $pref->id }}" @if (isset($post->prefecture_id) && ($post->prefecture_id === $pref->id)) selected @endif>{{ $pref->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">エリア(エリア)</label>
                        <div class=col-md-3>
                            <input type="text" class="col-md-8" name="area_city" value="{{ old('area_city') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">種別</label>
                        <div class="col-md-2">
                            <select name="kinds">
                                <option value="">選択してください</option>
                                <option value="0">お出かけスポット</option>
                                <option value="1">授乳室・おむつ替えスポット</option>
                                <option value="2">飲食店</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像添付</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ 
                            </div>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection