@extends('head')

@section('content')
    <div class="wrapper">
        <div class="my-3">
            <a href="{{ route('home') }}" class="text-decoration-none text-black">
                <i class="bi bi-arrow-left-circle">back</i>
            </a>
            <img src="{{ asset('storage/' . $detail['image']) }}" alt="" class="img-thumbnail mt-3">
            <p class="text-muted mt-4">
                {{ $detail['task'] }}
            </p>
        </div>
        <div class="button">
            <a href="{{ route('edit', $detail['id']) }}" class="edit-btn btn bg-grey text-dark border-secondary">Edit</a>
        </div>
    </div>
@endsection
