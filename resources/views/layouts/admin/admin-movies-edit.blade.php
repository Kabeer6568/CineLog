@extends('layouts.admin.admin')

@section('content')


  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Catalog</p>
        <h1>Edit Movie</h1>
      </div>
      <div class="ph-actions">
        <a href="{{ route('admin.allMovies') }}" class="btn btn-ghost">← Back</a>
      </div>
    </div>

    <div class="edit-badge fu">✎ Editing: <strong>{{ $movie->title }} ({{ $movie->release_year }})</strong></div>

    <form class="form-layout fu fu1" action="{{ route('admin.editMovie', $movie->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <!-- MAIN FORM -->
      <div>
        <div class="card">
          <div class="card-body">
            <div class="section-title">Basic Information</div>
            <div class="form-grid">
              <div class="form-row">
                <div class="form-group">
                  <label>Title *</label>
                  <input type="text" name="title" value="{{ old('title', $movie->title) }}">
                </div>
                <div class="form-group">
                  <label>Original Title</label>
                  <input type="text" name="original_title" value="{{ old('original_title', $movie->original_title) }}" placeholder="If different from title">
                </div>
              </div>
              <div class="form-group">
                <label>Overview *</label>
                <textarea name="overview">{{ old('overview', $movie->overview) }}</textarea>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Release Year *</label>
                  <input type="number" name="release_year" value="{{ old('release_year', $movie->release_year) }}">
                </div>
                <div class="form-group">
                  <label>Runtime (minutes)</label>
                  <input type="number" name="runtime" value="{{ old('runtime', $movie->runtime) }}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Director *</label>
                  <input type="text" name="director" value="{{ old('director', $movie->director) }}">
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" name="country" value="{{ old('country', $movie->country) }}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Language</label>
                  <input type="text" name="language" value="{{ old('language', $movie->language) }}">
                </div>
                <div class="form-group">
                  <label>Budget (USD)</label>
                  <input type="number" name="budget" value="{{ old('budget', $movie->budget) }}">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Genres</div>
            <div class="chips" id="genre-chips">
              @foreach(['Action','Drama','Sci-Fi','Comedy','Thriller','Horror','Romance','Documentary','Animation','Crime'] as $genre)
                <button type="button" class="chip {{ $movie->genre === $genre ? 'active' : '' }}" onclick="selectGenre(this)">{{ $genre }}</button>
              @endforeach
            </div>
            <input type="hidden" name="genre" id="genre-value" value="{{ $movie->genre }}">
          </div>
        </div>

        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Cast</div>
            <div class="form-row" style="margin-bottom:.75rem">
              <input type="text" placeholder="Search actor…" id="actor-search">
              <button type="button" class="btn btn-secondary" onclick="addActor()">Add</button>
            </div>
            <div class="tags-wrap" id="actor-tags">
              @foreach(explode(',', $movie->cast) as $actor)
                @if(trim($actor))
                  <span class="actor-tag">{{ trim($actor) }} <button type="button" onclick="this.parentElement.remove()">×</button></span>
                @endif
              @endforeach
            </div>
            <input type="hidden" name="cast" id="cast-value" value="{{ $movie->cast }}">
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </div>

      <!-- SIDEBAR -->
      <div>
        <div class="sidebar-form-block">
          <h4>Poster</h4>
          <div class="poster-preview">
            @if($movie->poster)
              <img src="{{ asset('storage/' . $movie->poster) }}" style="width:100%;border-radius:6px">
            @else
              🎬
            @endif
          </div>
          <input type="file" name="poster" accept="image/*" style="margin-top:.75rem">
        </div>

        <div class="sidebar-form-block">
          <h4>Publishing</h4>
          <div class="form-group">
            <label>Status</label>
            <select name="status">
              <option value="published" {{ $movie->status === 'published' ? 'selected' : '' }}>Published</option>
              <option value="draft" {{ $movie->status === 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
          </div>
        </div>

        <div class="sidebar-form-block">
          <h4>Ratings</h4>
          <div class="form-group" style="margin-bottom:.75rem">
            <label>IMDb Score</label>
            <input type="number" name="imdb_score" step="0.1" min="0" max="10" value="{{ old('imdb_score', $movie->imdb_score) }}">
          </div>
          <div class="form-group">
            <label>Content Rating</label>
            <select name="content_rating">
              <option value="">Select…</option>
              @foreach(['G','PG','PG-13','R','NC-17'] as $rating)
                <option {{ $movie->content_rating === $rating ? 'selected' : '' }}>{{ $rating }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="sidebar-form-block" style="background:var(--surface2)">
          <h4>Metadata</h4>
          <div style="font-size:.75rem;color:var(--text-dim);display:grid;gap:.4rem">
            <div>Created: <span style="color:var(--text-muted)">{{ $movie->created_at?->format('M d, Y') }}</span></div>
            <div>Updated: <span style="color:var(--text-muted)">{{ $movie->updated_at?->format('M d, Y') }}</span></div>
            <div>ID: <span style="color:var(--text-muted);font-family:monospace">{{ $movie->id }}</span></div>
          </div>
        </div>
      </div>
    </form>
  </main>
</div>
<div id="toasts"></div>

<script>
  function selectGenre(el) {
    document.querySelectorAll('#genre-chips .chip').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('genre-value').value = el.textContent.trim();
  }

  function addActor() {
    const val = document.getElementById('actor-search').value.trim();
    if (!val) return;
    const tag = document.createElement('span');
    tag.className = 'actor-tag';
    tag.innerHTML = `${val} <button type="button" onclick="this.parentElement.remove()">×</button>`;
    document.getElementById('actor-tags').appendChild(tag);
    document.getElementById('actor-search').value = '';
  }

  document.querySelector('form').addEventListener('submit', function () {
    const cast = [...document.querySelectorAll('#actor-tags .actor-tag')]
      .map(t => t.textContent.replace('×', '').trim()).join(',');
    document.getElementById('cast-value').value = cast;
  });
</script>
@endsection