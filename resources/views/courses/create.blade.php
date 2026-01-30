@extends('layouts.app')

@section('content')
    <div class="container-xl py-4">
        <h1 class="text-primary">Create New Course</h1>
        <div class="d-flex align-items-center justify-content-center">
            <form action="{{ route("courses.store") }}" method="post" class="col-5">
                @csrf
                <label class="form-label mt-3">Name<span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control">

                <label class="form-label mt-3">Season<span class="text-danger">*</span></label>
                <input type="text" name="season" class="form-control">

                <label class="form-label mt-3">Description</label>
                <input type="text" name="description" class="form-control">

                <button class="btn btn-primary w-100 mt-4">Submit</button>
            </form>
        </div>
    </div>
@endsection