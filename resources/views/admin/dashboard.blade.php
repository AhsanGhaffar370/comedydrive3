@extends('admin/layout/layout')

@section('page_title','| Home')

@section('content')

<h1>Welcome {{auth()->user()->name}}</h1>

@endsection

