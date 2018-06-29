@extends('layouts.app')

@section('content')

    <h1 class="main-header">Add a Tree</h1>

    {{ Form::model($tree, ['method' => 'put', 'route' => ['trees.update', 'tree' => $tree]]) }}

    <div>
        <label for="name">Common Name</label>
        <input type="text" name="name" id="name" placeholder="Yellow Delicious" value="{{ $tree->name }}">
        @include('partials.forms.errors', ['field' => 'name'])
    </div>

    <div>
        <label for="species">Species</label>
        <input type="text" name="species" id="species" placeholder="Malus Domestica" value="{{ $tree->species }}">
        @include('partials.forms.errors', ['field' => 'species'])
    </div>

    <div>
        <label for="genus">Genus</label>
        <select name="genus" id="genus" placeholder="Amelanchier">
            @foreach (App\Tree::getEnum('genus') as $genus)
                <option value="{{ $genus }}"{{ $genus === $tree->genus ? ' selected' : '' }}>{{ $genus }}</option>
            @endforeach
        </select>
        @include('partials.forms.errors', ['field' => 'genus'])
    </div>

    <div>
        <label for="family">Family</label>
        <select name="family" id="family" placeholder="Caprifoliaceae">
            @foreach (App\Tree::getEnum('family') as $family)
                <option value="{{ $family }}"{{ $family === $tree->family ? ' selected' : '' }}>{{ $family }}</option>
            @endforeach
        </select>
        @include('partials.forms.errors', ['field' => 'family'])
    </div>

    <div>
        <label for="habitat">Habitat</label>
        @foreach (App\Tree::getEnum('habitat') as $habitat)
            <p>
                <input type="radio" name="habitat" value="{{ $habitat }}"{{ $habitat === $tree->habitat ? ' checked' : '' }}>
                <span>{{ $habitat }}</span>
            </p>
        @endforeach
        @include('partials.forms.errors', ['field' => 'habitat'])
    </div>

    <div>
        <label for="notes">Notes</label>
        <textarea name="notes" rows="5" cols="40" resize="true" placeholder="Any additional notes." value="{{ $tree->notes }}"></textarea>
        @include('partials.forms.errors', ['field' => 'notes'])
    </div>

    <div>
        <button type="submit">
            <i class="mdi mdi-content-save"></i>
            <span>Update</span>
        </button>
    </div>

    {{ Form::close() }}

@endsection
