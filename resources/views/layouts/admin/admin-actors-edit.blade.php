@extends('layouts.admin.admin')

@section('content')
<div class="layout-admin">
  <div id="admin-sidebar-placeholder"
     data-active="actors/index"
     data-dashboard-url="{{ route('admin.dashboard') }}"
     data-movies-index-url="{{ route('admin.allMovies') }}"
     data-movies-create-url="{{ route('admin.moviesPage') }}"
     data-actors-index-url="{{ route('admin.allActors') }}"
     data-actors-create-url="{{ route('admin.createActorPage') }}">
  </div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">People</p>
        <h1>Edit Actor</h1>
      </div>
      <div class="ph-actions">
        <a href="{{ route('admin.allActors') }}" class="btn btn-ghost">← Back</a>
      </div>
    </div>

    <div class="edit-badge fu">✎ Editing: <strong>{{ $actor->first_name }} {{ $actor->last_name }}</strong></div>

    <form class="form-layout fu fu1" action="{{ route('admin.editActor', $actor->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <div>
        <div class="card">
          <div class="card-body">
            <div class="section-title">Personal Details</div>
            <div class="form-grid">
              <div class="form-row">
                <div class="form-group">
                  <label>First Name *</label>
                  <input type="text" name="first_name" value="{{ old('first_name', $actor->first_name) }}">
                </div>
                <div class="form-group">
                  <label>Last Name *</label>
                  <input type="text" name="last_name" value="{{ old('last_name', $actor->last_name) }}">
                </div>
              </div>
              <div class="form-group">
                <label>Biography</label>
                <textarea name="bio">{{ old('bio', $actor->bio) }}</textarea>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Date of Birth</label>
                  <input type="date" name="dob" value="{{ old('dob', $actor->dob) }}">
                </div>
                <div class="form-group">
                  <label>Nationality</label>
                  <input type="text" name="nationality" value="{{ old('nationality', $actor->nationality) }}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Place of Birth</label>
                  <input type="text" name="pob" value="{{ old('pob', $actor->pob) }}">
                </div>
                <div class="form-group">
                  <label>Known For</label>
                  <input type="text" name="known_for" value="{{ old('known_for', $actor->known_for) }}">
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
              <button type="button" class="btn btn-secondary" onclick="addFilm()">Link</button>
            </div>
            <div class="tags-wrap" id="film-tags">
              @if($actor->film)
                @foreach(explode(',', $actor->film) as $film)
                  <span class="film-tag">{{ trim($film) }} <button type="button" onclick="this.parentElement.remove()">×</button></span>
                @endforeach
              @endif
            </div>
            <input type="hidden" name="film" id="film-value">
          </div>
        </div>

        <div style="display:flex;gap:.75rem;justify-content:space-between;align-items:center;margin-top:1.5rem">
          <button type="button" class="btn btn-danger btn-sm" onclick="confirmAction('Delete this actor?', () => toast('Deleted','success'))">Delete Actor</button>
          <div style="display:flex;gap:.6rem">
            <a href="{{ route('admin.allActors') }}" class="btn btn-secondary">Discard</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
      </div>

      <div>
        <div class="sidebar-form-block">
          <h4>Photo</h4>
          <div class="photo-preview" onclick="document.getElementById('photo-input').click()">
            @if($actor->photo)
              <img src="{{ asset('storage/' . $actor->photo) }}" style="width:100%;border-radius:8px">
            @else
              👤
            @endif
          </div>
          <input type="file" name="photo" id="photo-input" accept="image/*" style="display:none">
          <p style="font-size:.72rem;color:var(--text-dim);text-align:center">Square image recommended</p>
        </div>

        <div class="sidebar-form-block">
          <h4>Social Links</h4>
          <div class="form-group" style="margin-bottom:.75rem">
            <label>IMDb</label>
            <input type="url" name="imdb" value="{{ old('imdb', $actor->imdb ?? '') }}" placeholder="https://imdb.com/name/...">
          </div>
          <div class="form-group">
            <label>Wikipedia</label>
            <input type="url" name="wikipedia" value="{{ old('wikipedia', $actor->wikipedia ?? '') }}" placeholder="https://en.wikipedia.org/...">
          </div>
        </div>

        <div class="sidebar-form-block" style="background:var(--surface2)">
          <h4>Metadata</h4>
          <div style="font-size:.75rem;color:var(--text-dim);display:grid;gap:.4rem">
            <div>Added: <span style="color:var(--text-muted)">{{ $actor->created_at?->format('M d, Y') }}</span></div>
            <div>ID: <span style="color:var(--text-muted);font-family:monospace">{{ $actor->id }}</span></div>
          </div>
        </div>
      </div>
    </form>
  </main>
</div>
<div id="toasts"></div>

<script>
  function addFilm() {
    const val = document.getElementById('film-search').value.trim();
    if (!val) return;
    const t = document.createElement('span');
    t.className = 'film-tag';
    t.innerHTML = `${val} <button type="button" onclick="this.parentElement.remove()">×</button>`;
    document.getElementById('film-tags').appendChild(t);
    document.getElementById('film-search').value = '';
  }

  document.querySelector('form').addEventListener('submit', function () {
    const films = [...document.querySelectorAll('#film-tags .film-tag')]
      .map(t => t.textContent.replace('×', '').trim()).join(',');
    document.getElementById('film-value').value = films;
  });
</script>
@endsection