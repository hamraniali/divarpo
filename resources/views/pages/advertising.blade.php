@extends('main')
@section('title')
    <?php
          $city = \App\City::find($advertising->city_id);
          $district = \App\District::find($advertising->district_id);
    ?>
    {{ $advertising->name . ' - ' . $city->name . ' - ' . $district->name }}
@endsection
@section('content')
    {{ $advertising }}
@endsection