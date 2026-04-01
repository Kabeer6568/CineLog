
@extends('layouts.admin.admin')

@section('content')
<div class="layout-admin">
  <div id="admin-sidebar-placeholder" data-active="movies/index"></div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Catalog</p>
        <h1>Edit Movie</h1>
      </div>
      <div class="ph-actions">
        <button class="btn btn-danger btn-sm" onclick="confirmAction('Delete Oppenheimer? This cannot be undone.', () => { toast('Deleted','success'); setTimeout(() => location.href='admin-movies-index.html',1000); })">Delete</button>
        <a href="admin-movies-index.html" class="btn btn-ghost">← Back</a>
      </div>
    </div>

    <div class="edit-badge fu">✎ Editing: <strong>Oppenheimer (2023)</strong></div>

    <div class="form-layout fu fu1">
      <!-- MAIN FORM -->
      <div>
        <div class="card">
          <div class="card-body">
            <div class="section-title">Basic Information</div>
            <div class="form-grid">
              <div class="form-row">
                <div class="form-group">
                  <label>Title *</label>
                  <input type="text" value="Oppenheimer">
                </div>
                <div class="form-group">
                  <label>Original Title</label>
                  <input type="text" placeholder="If different from title">
                </div>
              </div>
              <div class="form-group">
                <label>Overview *</label>
                <textarea>The story of J. Robert Oppenheimer's role in the development of the atomic bomb during World War II. As director of the Manhattan Project, Oppenheimer is confronted with the moral and ethical implications of his creation.</textarea>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Release Year *</label>
                  <input type="number" value="2023">
                </div>
                <div class="form-group">
                  <label>Runtime (minutes)</label>
                  <input type="number" value="180">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Director *</label>
                  <input type="text" value="Christopher Nolan">
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" value="USA, UK">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Language</label>
                  <input type="text" value="English">
                </div>
                <div class="form-group">
                  <label>Budget (USD)</label>
                  <input type="number" value="100000000">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Genres</div>
            <div class="chips">
              <button class="chip" onclick="this.classList.toggle('active')">Action</button>
              <button class="chip active" onclick="this.classList.toggle('active')">Drama</button>
              <button class="chip" onclick="this.classList.toggle('active')">Sci-Fi</button>
              <button class="chip" onclick="this.classList.toggle('active')">Comedy</button>
              <button class="chip" onclick="this.classList.toggle('active')">Thriller</button>
              <button class="chip active" onclick="this.classList.toggle('active')">History</button>
              <button class="chip active" onclick="this.classList.toggle('active')">Biography</button>
              <button class="chip" onclick="this.classList.toggle('active')">Crime</button>
            </div>
          </div>
        </div>

        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Cast</div>
            <div class="form-row" style="margin-bottom:.75rem">
              <input type="text" placeholder="Search actor…" id="actor-search">
              <button class="btn btn-secondary" onclick="addActor()">Add</button>
            </div>
            <div class="tags-wrap" id="actor-tags">
              <span class="actor-tag">Cillian Murphy <button onclick="this.parentElement.remove()">×</button></span>
              <span class="actor-tag">Emily Blunt <button onclick="this.parentElement.remove()">×</button></span>
              <span class="actor-tag">Robert Downey Jr. <button onclick="this.parentElement.remove()">×</button></span>
              <span class="actor-tag">Matt Damon <button onclick="this.parentElement.remove()">×</button></span>
              <span class="actor-tag">Florence Pugh <button onclick="this.parentElement.remove()">×</button></span>
            </div>
          </div>
        </div>

        <div class="form-actions">
          <button class="btn btn-danger btn-sm" onclick="confirmAction('Delete this movie?', () => toast('Deleted','success'))">
            Delete Movie
          </button>
          <div style="display:flex;gap:.6rem">
            <button class="btn btn-secondary" onclick="toast('Draft saved','success')">Save Draft</button>
            <button class="btn btn-primary" onclick="saveMovie()">Save Changes</button>
          </div>
        </div>
      </div>

      <!-- SIDEBAR -->
      <div>
        <div class="sidebar-form-block">
          <h4>Poster</h4>
          <div class="poster-preview">
            🎬
            <div class="poster-preview-actions">
              <button class="btn btn-secondary btn-sm" onclick="toast('File picker not connected','info')">Change</button>
              <button class="btn btn-danger btn-sm" onclick="toast('Poster removed','info')">Remove</button>
            </div>
          </div>
        </div>

        <div class="sidebar-form-block">
          <h4>Publishing</h4>
          <div class="form-group" style="margin-bottom:.75rem">
            <label>Status</label>
            <select><option selected>Published</option><option>Draft</option></select>
          </div>
          <div class="form-group">
            <label>Visibility</label>
            <select><option>Public</option><option>Private</option></select>
          </div>
        </div>

        <div class="sidebar-form-block">
          <h4>Ratings</h4>
          <div class="form-group" style="margin-bottom:.75rem">
            <label>IMDb Score</label>
            <input type="number" step="0.1" min="0" max="10" value="8.4">
          </div>
          <div class="form-group">
            <label>Content Rating</label>
            <select>
              <option>G</option><option>PG</option><option selected>PG-13</option><option>R</option>
            </select>
          </div>
        </div>

        <div class="sidebar-form-block" style="background:var(--surface2)">
          <h4>Metadata</h4>
          <div style="font-size:.75rem;color:var(--text-dim);display:grid;gap:.4rem">
            <div>Created: <span style="color:var(--text-muted)">Jan 12, 2024</span></div>
            <div>Updated: <span style="color:var(--text-muted)">Mar 28, 2025</span></div>
            <div>ID: <span style="color:var(--text-muted);font-family:monospace">mov_0042</span></div>
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
  function saveMovie() {
    toast('Changes saved!', 'success');
    setTimeout(() => location.href='admin-movies-index.html', 1200);
  }
</script>
@endsection