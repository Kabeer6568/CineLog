
@extends('layouts.admin.admin')

@section('content')
<div class="layout-admin">
  <div id="admin-sidebar-placeholder" data-active="actors/create"></div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">People</p>
        <h1>Add Actor</h1>
      </div>
      <div class="ph-actions">
        <a href="admin-actors-index.html" class="btn btn-ghost">← Back</a>
      </div>
    </div>

    <div class="form-layout fu fu1">
      <!-- MAIN -->
      <div>
        <div class="card">
          <div class="card-body">
            <div class="section-title">Personal Details</div>
            <div class="form-grid">
              <div class="form-row">
                <div class="form-group">
                  <label>First Name *</label>
                  <input type="text" placeholder="First name">
                </div>
                <div class="form-group">
                  <label>Last Name *</label>
                  <input type="text" placeholder="Last name">
                </div>
              </div>
              <div class="form-group">
                <label>Biography</label>
                <textarea placeholder="Brief biography of the actor…"></textarea>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Date of Birth</label>
                  <input type="date">
                </div>
                <div class="form-group">
                  <label>Nationality</label>
                  <input type="text" placeholder="e.g. American, British">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Place of Birth</label>
                  <input type="text" placeholder="City, Country">
                </div>
                <div class="form-group">
                  <label>Known For</label>
                  <input type="text" placeholder="e.g. Acting, Directing">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Filmography</div>
            <div class="form-row" style="margin-bottom:.75rem">
              <input type="text" placeholder="Search and link movies…" id="film-search">
              <button class="btn btn-secondary" onclick="addFilm()">Link</button>
            </div>
            <div class="tags-wrap" id="film-tags">
              <span class="film-tag">Oppenheimer <button onclick="this.parentElement.remove()">×</button></span>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:.75rem;justify-content:flex-end;margin-top:1.5rem">
          <button class="btn btn-secondary" onclick="toast('Saved as draft','success')">Save Draft</button>
          <button class="btn btn-primary" onclick="toast('Actor added!','success'); setTimeout(() => location.href='admin-actors-index.html', 1200)">Add Actor</button>
        </div>
      </div>

      <!-- SIDEBAR -->
      <div>
        <div class="sidebar-form-block">
          <h4>Photo</h4>
          <div class="photo-upload" onclick="toast('File picker not connected','info')">👤</div>
          <p style="font-size:.72rem;color:var(--text-dim);text-align:center">Square image recommended</p>
        </div>

        <div class="sidebar-form-block">
          <h4>Social Links</h4>
          <div class="form-group" style="margin-bottom:.75rem">
            <label>IMDb</label>
            <input type="url" placeholder="https://imdb.com/name/...">
          </div>
          <div class="form-group">
            <label>Wikipedia</label>
            <input type="url" placeholder="https://en.wikipedia.org/...">
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<div id="toasts"></div>
<script>
  function addFilm() {
    const val = document.getElementById('film-search').value.trim();
    if (!val) return;
    const t = document.createElement('span');
    t.className = 'film-tag';
    t.innerHTML = `${val} <button onclick="this.parentElement.remove()">×</button>`;
    document.getElementById('film-tags').appendChild(t);
    document.getElementById('film-search').value = '';
  }
</script>
@endsection