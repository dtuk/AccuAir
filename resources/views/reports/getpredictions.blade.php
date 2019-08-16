@extends('layouts.master')

@section('content')


    <form action="/reports/predictco" method="post" id="report-form">
        @csrf
        <input id="lat" type="text" name="date" placeholder="{{ date('Y-m-d H:i:s') }}">
        <input type="submit" class="btn btn-primary">
    </form>



@endsection
