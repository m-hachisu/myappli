@extends('layouts.front')
@section('title', 'スポットの詳細')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>スポット詳細</h2>
                <div class="row">
                    <div class="posts col-md-8 mx-auto mt-3">
                            <div class="post">
                                <div class="row">
                                    <div class="text col-md-6">
                                        <div class="spot_name">
                                            {{ $spot_form->spot_name }}
                                        </div>
                                        <div class="summary mt-3">
                                            {{ $spot_form->summary }}
                                        </div>
                                    </div>
                                    <div class="image col-md-6 text-right mt-4">
                                        @if ($spot_form->image_path)
                                            <img src="{{ secure_asset('storage/image/' . $spot_form->image_path) }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr color="#c0c0c0">
                    </div>
                    <div class="text col-md-4">
                        <a href="{{ route('spot.show') }}">TOPへ戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection