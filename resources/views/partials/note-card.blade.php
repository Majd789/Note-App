<div class="col-md-12 mb-4">
    <div class="d-flex flex-row card card-custom">
        <a class="p-2" style="text-decoration: none;" href="{{ route('note.show', $note) }}">
            <div class="card-body">
                <h5 class="card-title">{{ $note->title }}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($note->body, 200) }}</p>
            </div>
        </a>
        <div class="ms-auto p-2">
            <form action="{{ route('note.favorite', $note) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link p-0 border-0" title="Toggle favorite" aria-label="Toggle favorite">
                    <i class="favorite-icon fa fa-star" style="color: {{ $note->favorite ? 'yellow' : '#9ca3af' }}"></i>
                </button>
            </form>
        </div>
    </div>
</div>
