@extends('layouts.admin')
@section('content')
    <div class="container">
        {{-- <div>
            <img src="{{ Storage::url($data->bg_image)}}" alt="image">
        </div> --}}
        <div class="form-group mt-5 mx-5">
            <form action="{{route('update')}}" method="POST" enctype="multipart/form-data">
                @csrf
               {{--  {{ method_field('PUT')}} --}}

                <div class="row mb-2">
                    <label for="name" class="col-sm-1 col-form-label">Name:</label>
                    <div class="col-sm-6">
                        <input type="name" name="name" class="form-control" id="name" value="{{ $data['name'] }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="title" class="col-sm-1 col-form-label">Title:</label>
                    <div class="col-sm-6">
                        <input type="title" class="form-control" name="title" id="title" value="{{ $data['title'] }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="image" class="col-sm-1 col-form-label">Image:</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="resume" class="col-sm-1 col-form-label">Resume:</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="resume" name="resume">
                    </div>
                </div>
                
               <div class="text-center col-sm-8">
                <input type="submit" name="submit" class="btn btn-primary mt-2 text-center">
               </div>
            </form>
        </div>
    </div>
@endsection
