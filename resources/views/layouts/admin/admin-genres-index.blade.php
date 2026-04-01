
@extends('layouts.admin.admin')

@section('content')
<div class="layout-admin">
  <div id="admin-sidebar-placeholder" data-active="genres/index"></div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Taxonomy</p>
        <h1>Genres</h1>
        <p>Manage the genre taxonomy for all movies.</p>
      </div>
      <div class="ph-actions">
        <a href="admin-genres-create.html" class="btn btn-primary">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          Add Genre
        </a>
      </div>
    </div>

    <!-- SUMMARY STATS -->
    <div class="stat-grid fu fu1" style="grid-template-columns:repeat(3,1fr);max-width:500px;margin-bottom:2rem">
      <div class="stat-card">
        <div class="stat-label">Total Genres</div>
        <div class="stat-value">18</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Most Used</div>
        <div class="stat-value" style="font-size:1.2rem;padding-top:.2rem">Drama</div>
        <div class="stat-sub">36 films</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Empty Genres</div>
        <div class="stat-value" style="color:var(--red)">2</div>
        <div class="stat-sub">No films linked</div>
      </div>
    </div>

    <!-- FILTER -->
    <div class="filter-bar fu fu2" style="margin-bottom:1.25rem">
      <input type="text" placeholder="Search genres…" id="search-input" style="max-width:240px">
    </div>

    <!-- GENRE CARDS -->
    <div class="genre-card-grid fu fu3" id="genre-grid">
      <div class="genre-card">
        <div class="genre-card-top">
          <div class="genre-icon">🎭</div>
          <div class="genre-actions">
            <a href="admin-genres-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
            <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete Drama genre?', () => toast('Deleted','success'))">🗑</button>
          </div>
        </div>
        <div>
          <div class="genre-name">Drama</div>
          <div class="genre-meta">36 films</div>
          <div class="genre-bar-bg"><div class="genre-bar-fill" style="width:78%"></div></div>
        </div>
      </div>
      <div class="genre-card">
        <div class="genre-card-top">
          <div class="genre-icon">💥</div>
          <div class="genre-actions">
            <a href="admin-genres-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
            <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
          </div>
        </div>
        <div>
          <div class="genre-name">Action</div>
          <div class="genre-meta">25 films</div>
          <div class="genre-bar-bg"><div class="genre-bar-fill" style="width:55%"></div></div>
        </div>
      </div>
      <div class="genre-card">
        <div class="genre-card-top">
          <div class="genre-icon">😂</div>
          <div class="genre-actions">
            <a href="admin-genres-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
            <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
          </div>
        </div>
        <div>
          <div class="genre-name">Comedy</div>
          <div class="genre-meta">19 films</div>
          <div class="genre-bar-bg"><div class="genre-bar-fill" style="width:42%"></div></div>
        </div>
      </div>
      <div class="genre-card">
        <div class="genre-card-top">
          <div class="genre-icon">🚀</div>
          <div class="genre-actions">
            <a href="admin-genres-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
            <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
          </div>
        </div>
        <div>
          <div class="genre-name">Sci-Fi</div>
          <div class="genre-meta">16 films</div>
          <div class="genre-bar-bg"><div class="genre-bar-fill" style="width:35%"></div></div>
        </div>
      </div>
      <div class="genre-card">
        <div class="genre-card-top">
          <div class="genre-icon">🔪</div>
          <div class="genre-actions">
            <a href="admin-genres-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
            <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
          </div>
        </div>
        <div>
          <div class="genre-name">Thriller</div>
          <div class="genre-meta">13 films</div>
          <div class="genre-bar-bg"><div class="genre-bar-fill" style="width:28%"></div></div>
        </div>
      </div>
      <div class="genre-card">
        <div class="genre-card-top">
          <div class="genre-icon">👻</div>
          <div class="genre-actions">
            <a href="admin-genres-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
            <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
          </div>
        </div>
        <div>
          <div class="genre-name">Horror</div>
          <div class="genre-meta">9 films</div>
          <div class="genre-bar-bg"><div class="genre-bar-fill" style="width:20%"></div></div>
        </div>
      </div>
      <div class="genre-card">
        <div class="genre-card-top">
          <div class="genre-icon">❤️</div>
          <div class="genre-actions">
            <a href="admin-genres-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
            <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
          </div>
        </div>
        <div>
          <div class="genre-name">Romance</div>
          <div class="genre-meta">11 films</div>
          <div class="genre-bar-bg"><div class="genre-bar-fill" style="width:24%"></div></div>
        </div>
      </div>
      <div class="genre-card" style="border-style:dashed;opacity:.6">
        <div class="genre-card-top">
          <div class="genre-icon">📽</div>
          <div class="genre-actions">
            <a href="admin-genres-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
            <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
          </div>
        </div>
        <div>
          <div class="genre-name">Neo-Noir</div>
          <div class="genre-meta" style="color:var(--red)">0 films</div>
          <div class="genre-bar-bg"><div class="genre-bar-fill" style="width:0%"></div></div>
        </div>
      </div>
    </div>

  </main>
</div>
<div id="toasts"></div>

<script>
  const inp = document.getElementById('search-input');
  inp.addEventListener('input', () => {
    const q = inp.value.toLowerCase();
    document.querySelectorAll('.genre-card').forEach(c => {
      const name = c.querySelector('.genre-name').textContent.toLowerCase();
      c.style.display = !q || name.includes(q) ? '' : 'none';
    });
  });
</script>
@endsection