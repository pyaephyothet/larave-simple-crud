@extends('head')

@section('content')
    <div class="wrapper">
        <div class="my-3">
            <a href="{{ route('show', $edit['id']) }}" class="text-decoration-none text-black">
                <i class="bi bi-arrow-left-circle">back</i>
            </a>
            <form action="{{ route('updatePost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <img src="{{ asset('storage/' . $edit['image']) }}" alt="" class="img-thumbnail mt-3">
                <input type="file" name="postImage" class="mt-3 w-100">
                <textarea class="form-control mt-3" name="updateTask" id="" cols="20" rows="8" required>{{ $edit['task'] }}</textarea>
                <input type="hidden" name="updateID" value="{{ $edit['id'] }}" class="">
                <input type="submit" value="Update" class="update-btn btn bg-grey text-dark border-secondary mt-3">
            </form>
        </div>
    </div>
@endsection
