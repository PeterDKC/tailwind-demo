@extends('layouts.app')

@section('content')

    <h1 class="main-header">Trees</h1>

    <div class="mb-6">
        <a href="{{ route('trees.create') }}" class="button-green">
            <i class="mdi mdi-library-plus"></i>
            <span>Add a Tree</span>
        </a>
    </div>

    @foreach ($trees as $tree)
        <div class="tree-info">
            <div class="tree-info-header">
                <div>Common name <span>{{ $tree->name }}</span></div>

                <div>Species <span>{{ $tree->species }}</span></div>

                <div>Genus <span>{{ $tree->genus }}</span></div>

                <div>Family <span>{{ $tree->family }}</span></div>
            </div>


            <div class="mb-2">
                <span class="text-blue-light">Notes</span>
            </div>

            <div class="text-grey-darker">
                {{ $tree->notes }}
            </div>


            <div class="py-4">
                <a href="{{ route('trees.edit', ['tree' => $tree]) }}" class="button-blue">
                    <i class="mdi mdi-pencil"></i>
                    <span>Edit</span>
                </a>
                {{ Form::model($tree, ['method' => 'delete', 'route' => ['trees.destroy', 'tree' => $tree], 'class' => 'inline'])}}
                    <button class="button-red">
                        <i class="mdi mdi-delete"></i>
                        <span>Delete</span>
                    </button>
                {{ Form::close() }}
            </div>
        </div>
    @endforeach

@endsection
