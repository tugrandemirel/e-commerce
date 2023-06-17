@extends('layouts.app')
@section('title', $page->title.' | '.config('app.name'))
@section('meta_keywords', $page->meta_keywords)
@section('meta_description', $page->meta_description)
@section('content')
    {!! $page->content !!}
@endsection

