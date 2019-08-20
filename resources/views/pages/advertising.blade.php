@extends('main')
@section('title')
    <?php
          $city = \App\City::find($advertising->city_id);
          $district = \App\District::find($advertising->district_id);
    ?>
    {{ $advertising->name . ' - ' . $city->name . ' - ' . $district->name }}
@endsection
@section('head_left_icon')
    <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="material-icons mdc-icon-button bold-font btn-left-side" data-mdc-ripple-is-unbounded="true" style="color: black;margin-top: 7px;margin-right: 15px;position: absolute;left: 10px">arrow_back</a>
@endsection
@section('content')
    {{ $advertising }}
@endsection