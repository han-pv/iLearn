@extends('layouts.app')


@section('content')
  <div class="container-sm">
    <div>
      <a href="/teachers">Teachers</a>
    </div>
    <div>
      <a href="/students">Students</a>
    </div>

    <h1 class="text-danger">Home Page</h1>

    <h1>Bizin kurslarymyz</h1>
    @foreach ($courses as $course)
      <div class="h4 text-success">{{ $course->id }}{{ $course->name }}</div>
    @endforeach
@endsection