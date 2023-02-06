@extends('head')

@section('content')
    <div class="container d-flex flex-column align-items-center justify-content-center">
        @if (session('success'))
            <div class="alert-message">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if (session('updatSuccess'))
            <div class="alert-message">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('updatSuccess') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <form action="{{ route('create') }}" method="post" enctype="multipart/form-data"
            class="form p-5 border border-gray-800">
            @csrf
            <h1>todo</h1>
            <div class="mt-3 d-flex align-items-center justify-content-between">
                <div class="d-flex flex-column gap-3">
                    <input type="text" name="postTask" class="task-input" required>
                    <input type="file" name="postImage" class="img-input" required>
                </div>
                <button class="add-btn fs-5 ms-3" type="submit">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>
            <div class="task-area mt-4">
                <ul class="todo-list ps-0">
                    @foreach ($table as $item)
                        <div class="task active"><input class="todo-item" type="text"
                                value="{{ Str::words($item['task'], 6, '...') }}" readonly="readonly"><a
                                href="{{ route('update', $item['id']) }}" class="complete-btn"><i
                                    class="bi bi-file-earmark-break"></i></a><a href="{{ route('delete', $item['id']) }}"
                                class="trash-btn"><i class="bi bi-trash3"></i></a>
                        </div>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
@endsection
