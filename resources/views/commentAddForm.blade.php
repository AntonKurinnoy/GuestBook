<form method="POST" action="{{ route('addComment') }}">
    @csrf

    <input type="hidden" name="user" value="{{ Auth::id() }}">

    <div class="form-group row">
        <div class="col-md-8">
            <textarea id="comment" name="comment" class="form-control" placeholder="write a comment..." rows="3" required></textarea>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary" {{ (Auth::user()->blocked) ? "disabled" : "" }}>
                {{ __('Add') }}
            </button>
        </div>
    </div>
</form>