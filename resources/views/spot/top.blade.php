@extends('layouts.app')
@section('title', 'TOP')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>お出かけルート検索</h2>
                <div class="form-group row border p-2">
                    {{-- <form method="post" action="{{ route('spot.index') }}"> --}}
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
                            <label class="col-md-2">エリア(エリア)</label>
                            <div class=col-md-5>
                                <input type="text" class="col-md-8" name="area_city" value="{{ $area_city }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">季節</label>
                            <div class="col-md-3">
                                {{Form::select('season', ['' => '選択してください', '0' => '春', '1' => '夏','2' => '秋', '3' => '冬', '4' => 'いつでも'], $season, ['class' => 'form-control'])}}
                            </div>
                            <label class="col-md-2">天気</label>
                            <div class="col-md-3">
                                {{Form::select('weather', ['' => '選択してください', '0' => '晴れ', '1' => '雨','2' => '曇り', '3' => '雪', '4' => 'いつでも'], $weather, ['class' => 'form-control'])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">時間帯</label>
                            <div class="col-md-5">
                                <input type="time" name="start_time_zone" value="{{ $start_time_zone }}">
                                <span>～</span>
                                <input type="time" name="end_time_zone" value="{{ $end_time_zone }}">
                            </div>
                        </div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>新着お出かけスポット</h2>
                <div class="form-group row border p-2">
                    <div class="col-md-6">
                        <div class="caption mx-auto">
                            <div class="image">
                                @if ($headline->image_path)
                                    <img src="{{ secure_asset('storage/image/' . $headline->image_path) }}">
                                @endif
                            </div>
                            <div class="title p-2">
                                <h3>{{ Str::limit($headline->spot_name, 70) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="body mx-auto">{{ Str::limit($headline->summary, 650) }})</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>授乳室・おむつ替えスポット</h2>
                <div class="form-group row border p-2">
                    <div id="map" style="height:500px">
                        <script src="{{ asset('/js/setLocation.js') }}"></script>
                        <script src="{{ asset('/js/result.js') }}"></script>
                        <script src="https://maps.googleapis.com/maps/api/jslanguage=ja&region=JP&key=AIzaSyBrAYTpz9zu0CARYKdQNyYxjuICkA5ajI&callback=initMap" async defer></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>子連れで行けるおすすめ飲食店</h2>
                <div class="form-group row border p-2">
                    
                </div>
            </div>
        </div>
    </div>
@endsection