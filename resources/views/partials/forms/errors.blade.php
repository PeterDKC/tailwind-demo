@if ($errors->has($field))
    <div class="error-box">
        @foreach ($errors->get($field) as $error)
            <p class="is-danger">
                <b-icon icon="alert-circle-outline"></b-icon>
                <span>{{ $error }}</span>
            </p>
        @endforeach
    </div>
@endif
