@extends('main_views.pms_view')
@section('title', 'Dashboard')
@section('content')
    Hallo {{ Auth::user()->name }}
@endsection
