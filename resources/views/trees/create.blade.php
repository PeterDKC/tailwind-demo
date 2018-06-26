@extends('layouts.app')

@section('content')

    <h1>Add a Tree</h1>

    {{ Form::open(['route' => 'trees.store']) }}

    <div>
        <label for="name">Common Name</label>
        <input type="text" name="name" id="name" placeholder="Yellow Delicious">
        @include('partials.forms.errors', ['field' => 'name'])
    </div>

    <div>
        <label for="species">Species</label>
        <input type="text" name="species" id="species" placeholder="Malus Domestica">
        @include('partials.forms.errors', ['field' => 'species'])
    </div>

    <div>
        <label for="genus">Genus</label>
        <select name="genus" id="genus" placeholder="Amelanchier">
            @foreach (App\Tree::getEnum('genus') as $genus)
                <option value="{{ $genus }}">{{ $genus }}</option>
            @endforeach
        </select>
        @include('partials.forms.errors', ['field' => 'genus'])
    </div>

    <div>
        <label for="family">Family</label>
        <select name="family" id="family" placeholder="Caprifoliaceae">
            @foreach (App\Tree::getEnum('family') as $family)
                <option value="{{ $family }}">{{ $family }}</option>
            @endforeach
        </select>
        @include('partials.forms.errors', ['field' => 'family'])
    </div>

    <div>
        <label for="habitat">Habitat</label>
        @foreach (App\Tree::getEnum('habitat') as $habitat)
            <p>
                <input type="radio" name="habitat" value="{{ $habitat }}">
                <span>{{ $habitat }}</span>
            </p>
        @endforeach
        @include('partials.forms.errors', ['field' => 'habitat'])
    </div>

    <div>
        <label for="notes">Notes</label>
        <textarea name="notes" rows="5" cols="40" resize="true" placeholder="Any additional notes."></textarea>
        @include('partials.forms.errors', ['field' => 'notes'])
    </div>

    <div>
        <button type="submit">
            <i class="mdi mdi-content-save"></i>
            <span>Save</span>
        </button>
    </div>

    {{ Form::close() }}

@endsection
