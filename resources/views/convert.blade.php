<?php

declare(strict_types=1);
?>
@extends('media::layouts.master')

@section('content')
    <h1>Media conversion</h1>

    <p>Module: {{ config('media.name') }}</p>

    <p>Media: {{ $id }}</p>
@endsection
