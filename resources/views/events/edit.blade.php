@extends('layouts.app')

@section('content')
    @include('events.partials.form', ['event' => $event])
@endsection
