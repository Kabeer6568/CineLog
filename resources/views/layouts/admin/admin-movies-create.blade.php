
@extends('layouts.admin.admin')

@section('content')
<div class="layout-admin">
  <div id="admin-sidebar-placeholder"
     data-active="movies/index"
     data-dashboard-url="{{ route('admin.dashboard') }}"
     data-movies-index-url="{{ route('admin.allMovies') }}"
     data-movies-create-url="{{ route('admin.createMovies') }}">
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
                  <input type="text" placeholder="Movie title">
                </div>
                <div class="form-group">
                  <label>Original Title</label>
                  <input type="text" placeholder="If different from title">
                </div>
              </div>
              <div class="form-group">
                <label>Overview *</label>
                <textarea placeholder="Brief synopsis of the movie…"></textarea>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Release Year *</label>
                  <input type="number" placeholder="2024" min="1900" max="2030">
                </div>
                <div class="form-group">
                  <label>Runtime (minutes)</label>
                  <input type="number" placeholder="120">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Director *</label>
                  <input type="text" placeholder="Director name">
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" placeholder="e.g. USA, UK">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Language</label>
                  <input type="text" placeholder="English">
                </div>
                <div class="form-group">
                  <label>Budget (USD)</label>
                  <input type="number" placeholder="100000000">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Genres</div>
            <div class="chips" id="genre-chips">
              <button class="chip" onclick="this.classList.toggle('active')">Action</button>
              <button class="chip" onclick="this.classList.toggle('active')">Drama</button>
              <button class="chip active" onclick="this.classList.toggle('active')">Sci-Fi</button>
              <button class="chip" onclick="this.classList.toggle('active')">Comedy</button>
              <button class="chip" onclick="this.classList.toggle('active')">Thriller</button>
              <button class="chip" onclick="this.classList.toggle('active')">Horror</button>
              <button class="chip" onclick="this.classList.toggle('active')">Romance</button>
              <button class="chip" onclick="this.classList.toggle('active')">Documentary</button>
              <button class="chip" onclick="this.classList.toggle('active')">Animation</button>
              <button class="chip" onclick="this.classList.toggle('active')">Crime</button>
            </div>
          </div>
        </div>

        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Cast</div>
            <div class="form-row" style="margin-bottom:.75rem">
              <input type="text" placeholder="Search actor name…" id="actor-search">
              <button class="btn btn-secondary" onclick="addActor()">Add Actor</button>
            </div>
            <div class="tags-wrap" id="actor-tags">
              <span class="actor-tag">Cillian Murphy <button onclick="this.parentElement.remove()">×</button></span>
              <span class="actor-tag">Emily Blunt <button onclick="this.parentElement.remove()">×</button></span>
              <span class="actor-tag">Robert Downey Jr. <button onclick="this.parentElement.remove()">×</button></span>
            </div>
          </div>
        </div>

        <div class="form-actions">
          <button class="btn btn-secondary" onclick="saveDraft()">Save Draft</button>
          <button class="btn btn-primary" onclick="publishMovie()">Publish Movie</button>
        </div>
      </div>

      <!-- RIGHT: SIDEBAR -->
      <div>
        <!-- POSTER -->
        <div class="sidebar-form-block">
          <h4>Poster</h4>
          <div class="poster-upload" onclick="toast('File picker not connected','info')">
            <div class="poster-upload-icon">🖼</div>
            <p>Click to upload poster</p>
            <span>JPG, PNG · 2:3 ratio recommended</span>
          </div>
        </div>

        <!-- STATUS -->
        <div class="sidebar-form-block">
          <h4>Publishing</h4>
          <div class="form-group" style="margin-bottom:.75rem">
            <label>Status</label>
            <select>
              <option>Draft</option>
              <option>Published</option>
            </select>
          </div>
          <div class="form-group">
            <label>Visibility</label>
            <select>
              <option>Public</option>
              <option>Private</option>
            </select>
          </div>
        </div>

        <!-- RATINGS -->
        <div class="sidebar-form-block">
          <h4>Ratings</h4>
          <div class="form-group" style="margin-bottom:.75rem">
            <label>IMDb Score</label>
            <input type="number" step="0.1" min="0" max="10" placeholder="8.4">
          </div>
          <div class="form-group">
            <label>Content Rating</label>
            <select>
              <option>Select…</option>
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
  </main>
</div>
<div id="toasts"></div>

<script>
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