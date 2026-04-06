
@extends('layouts.admin.admin')

@section('content')
<div class="layout-admin">
  <div id="admin-sidebar-placeholder"
     data-active="movies/index"
     data-dashboard-url="{{ route('admin.dashboard') }}"
     data-movies-index-url="{{ route('admin.allMovies') }}"
     data-movies-create-url="{{ route('admin.moviesPage') }}">
  </div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Catalog</p>
        <h1>Add Movie</h1>
      </div>
      <div class="ph-actions">
        <a href="admin-movies-index.html" class="btn btn-ghost">← Back</a>
      </div>
    </div>

<form action="{{ route('admin.createMovie') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-layout fu fu1">
  <!-- LEFT: MAIN FORM -->
  <div>
    <div class="card">
      <div class="card-body">
        <div class="section-title">Basic Information</div>
        <div class="form-grid">
          <div class="form-row">
            <div class="form-group">
              <label>Title *</label>
              <input type="text" name="title" placeholder="Movie title">
            </div>
            <div class="form-group">
              <label>Original Title</label>
              <input type="text" name="original_title" placeholder="If different from title">
            </div>
          </div>
          <div class="form-group">
            <label>Overview *</label>
            <textarea name="overview" placeholder="Brief synopsis of the movie…"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Release Year *</label>
              <input type="number" name="release_year" placeholder="2024" min="1900" max="2030">
            </div>
            <div class="form-group">
              <label>Runtime (minutes)</label>
              <input type="number" name="run_time" placeholder="120">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Director *</label>
              <input type="text" name="director" placeholder="Director name">
            </div>
            <div class="form-group">
              <label>Country</label>
              <input type="text" name="country" placeholder="e.g. USA, UK">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Language</label>
              <input type="text" name="language" placeholder="English">
            </div>
            <div class="form-group">
              <label>Budget (USD)</label>
              <input type="number" name="budget" placeholder="100000000">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card" style="margin-top:1.25rem">
      <div class="card-body">
        <div class="section-title">Genres</div>
        <div class="chips" id="genre-chips">
          <button type="button" class="chip" onclick="selectGenre(this)">Action</button>
          <button type="button" class="chip" onclick="selectGenre(this)">Drama</button>
          <button type="button" class="chip active" onclick="selectGenre(this)">Sci-Fi</button>
          <button type="button" class="chip" onclick="selectGenre(this)">Comedy</button>
          <button type="button" class="chip" onclick="selectGenre(this)">Thriller</button>
          <button type="button" class="chip" onclick="selectGenre(this)">Horror</button>
          <button type="button" class="chip" onclick="selectGenre(this)">Romance</button>
          <button type="button" class="chip" onclick="selectGenre(this)">Documentary</button>
          <button type="button" class="chip" onclick="selectGenre(this)">Animation</button>
          <button type="button" class="chip" onclick="selectGenre(this)">Crime</button>
        </div>
        {{-- hidden input gets filled by JS below --}}
        <input type="hidden" name="genre" id="genre-value">
      </div>
    </div>

    <div class="card" style="margin-top:1.25rem">
      <div class="card-body">
        <div class="section-title">Cast</div>
        <div class="form-row" style="margin-bottom:.75rem">
          <input type="text" placeholder="Search actor name…" id="actor-search">
          <button type="button" class="btn btn-secondary" onclick="addActor()">Add Actor</button>
        </div>
        <div class="tags-wrap" id="actor-tags">
          <span class="actor-tag">Cillian Murphy <button type="button" onclick="this.parentElement.remove()">×</button></span>
          <span class="actor-tag">Emily Blunt <button type="button" onclick="this.parentElement.remove()">×</button></span>
          <span class="actor-tag">Robert Downey Jr. <button type="button" onclick="this.parentElement.remove()">×</button></span>
        </div>
        {{-- hidden input gets filled by JS below --}}
        <input type="hidden" name="cast" id="cast-value">
      </div>
    </div>

    <div class="form-actions">
      <!-- <button type="submit" name="status" value="draft" class="btn btn-secondary">Save Draft</button> -->
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>

  <!-- RIGHT: SIDEBAR -->
  <div>
    <!-- POSTER -->
    <div class="sidebar-form-block">
      <h4>Poster</h4>
      <div class="poster-upload" onclick="document.getElementById('poster-input').click()">
        <div class="poster-upload-icon">🖼</div>
        <p>Click to upload poster</p>
        <span>JPG, PNG · 2:3 ratio recommended</span>
      </div>
      <input type="file" name="poster" id="poster-input" accept="image/*" style="display:none">
    </div>

    <!-- STATUS -->
    <div class="sidebar-form-block">
      <h4>Publishing</h4>
      <div class="form-group" style="margin-bottom:.75rem">
        <label>Status</label>
        <select name="status">
          <option value="published">Published</option>
          <option value="draft">Draft</option>
        </select>
      </div>
    </div>

    <!-- RATINGS -->
    <div class="sidebar-form-block">
      <h4>Ratings</h4>
      <div class="form-group" style="margin-bottom:.75rem">
        <label>IMDb Score</label>
        <input type="number" name="imdb_score" step="0.1" min="0" max="10" placeholder="8.4">
      </div>
      <div class="form-group">
        <label>Content Rating</label>
        <select name="content_rating">
          <option value="">Select…</option>
          <option>G</option>
          <option>PG</option>
          <option>PG-13</option>
          <option>R</option>
          <option>NC-17</option>
        </select>
      </div>
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
}
  document.querySelector('form').addEventListener('submit', function () {
  const genres = [...document.querySelectorAll('#genre-chips .chip.active')]
    .map(c => c.textContent.trim()).join(',');
  document.getElementById('genre-value').value = genres;

  const cast = [...document.querySelectorAll('#actor-tags .actor-tag')]
    .map(t => t.textContent.replace('×', '').trim()).join(',');
  document.getElementById('cast-value').value = cast;
});


  function addActor() {
    const val = document.getElementById('actor-search').value.trim();
    if (!val) return;
    const tag = document.createElement('span');
    tag.className = 'actor-tag';
    tag.innerHTML = `${val} <button onclick="this.parentElement.remove()">×</button>`;
    document.getElementById('actor-tags').appendChild(tag);
    document.getElementById('actor-search').value = '';
  }
  function saveDraft() { toast('Saved as draft', 'success'); }
  function publishMovie() { toast('Movie published!', 'success'); setTimeout(() => location.href='admin-movies-index.html', 1200); }
</script>
@endsection