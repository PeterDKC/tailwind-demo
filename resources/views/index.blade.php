@extends('layouts.app')

@section('content')

    <h1>Trees</h1>

    <div>
        <a href="{{ route('trees.create') }}">
            <i class="mdi mdi-library-plus"></i>
            <span>Add a Tree</span>
        </a>
    </div>

    @foreach ($trees as $tree)
        <div>
            <p>
                {{ $tree->name }}
                ({{ $tree->species }})
            </p>

            <div>Genus {{ $tree->genus }}</div>
            <div>Family {{ $tree->family }}</div>
            <div>Notes {{ $tree->notes }}</div>

            <div>
                <a href="{{ route('trees.edit', ['tree' => $tree]) }}">
                    <i class="mdi mdi-pencil"></i>
                    <span>Edit</span>
                </a>
                ||
                {{ Form::model($tree, ['method' => 'delete', 'route' => ['trees.destroy', 'tree' => $tree]])}}
                    <button>
                        <i class="mdi mdi-delete"></i>
                        <span>Delete</span>
                    </button>
                {{ Form::close() }}
            </div>
        </div>
    @endforeach

@endsection
