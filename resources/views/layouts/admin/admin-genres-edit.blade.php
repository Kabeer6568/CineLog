<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Edit Genre — CineLog Admin</title>
<link rel="stylesheet" href="../common.css">
</head>
<body>
<div class="layout-admin">
  <div id="admin-sidebar-placeholder" data-active="genres/index"></div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Taxonomy</p>
        <h1>Edit Genre</h1>
      </div>
      <div class="ph-actions">
        <button class="btn btn-danger btn-sm" onclick="confirmAction('Delete Drama genre? This will unlink 36 movies.', () => { toast('Genre deleted','success'); setTimeout(() => location.href='admin-genres-index.html',1000); })">Delete</button>
        <a href="admin-genres-index.html" class="btn btn-ghost">← Back</a>
      </div>
    </div>

    <div class="edit-badge fu">✎ Editing: <strong>Drama</strong> — 36 films linked</div>

    <div class="form-layout fu fu1">
      <div>
        <div class="card">
          <div class="card-body">
            <div class="section-title">Genre Details</div>
            <div class="form-grid">
              <div class="form-row">
                <div class="form-group">
                  <label>Genre Name *</label>
                  <input type="text" value="Drama" id="genre-name-input" oninput="updatePreview()">
                </div>
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" value="drama" id="slug-input">
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea>Drama films are serious presentations or stories with settings or life situations that portray realistic characters in conflict with either themselves, others, or forces of nature.</textarea>
              </div>
            </div>
          </div>
        </div>

        <!-- PREVIEW -->
        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Preview</div>
            <span class="badge badge-neutral" id="preview-badge">Drama</span>
            <div style="margin-top:.75rem">
              <span class="chip active" id="preview-chip">Drama</span>
            </div>
          </div>
        </div>

        <!-- LINKED MOVIES -->
        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Linked Films <span style="font-size:.8rem;font-style:normal;font-family:var(--font-body);color:var(--text-dim)">(36)</span></div>
            <div class="movie-link"><div class="movie-link-icon">🎬</div><span style="color:var(--text)">Oppenheimer</span><span style="margin-left:auto;font-size:.7rem">2023</span></div>
            <div class="movie-link"><div class="movie-link-icon">🌊</div><span style="color:var(--text)">Past Lives</span><span style="margin-left:auto;font-size:.7rem">2023</span></div>
            <div class="movie-link"><div class="movie-link-icon">🔮</div><span style="color:var(--text)">Zone of Interest</span><span style="margin-left:auto;font-size:.7rem">2024</span></div>
            <div style="text-align:center;padding:.6rem 0">
              <a href="admin-movies-index.html" style="font-size:.75rem;color:var(--accent)">View all 36 films →</a>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:.75rem;justify-content:space-between;align-items:center;margin-top:1.5rem">
          <button class="btn btn-danger btn-sm" onclick="confirmAction('Delete Drama genre?', () => toast('Deleted','success'))">Delete Genre</button>
          <div style="display:flex;gap:.6rem">
            <a href="admin-genres-index.html" class="btn btn-ghost">Cancel</a>
            <button class="btn btn-primary" onclick="toast('Genre updated!','success'); setTimeout(() => location.href='admin-genres-index.html',1200)">Save Changes</button>
          </div>
        </div>
      </div>

      <div>
        <div class="sidebar-form-block">
          <h4>Icon</h4>
          <div class="icon-grid">
            <div class="icon-opt selected" onclick="selectIcon(this)">🎭</div>
            <div class="icon-opt" onclick="selectIcon(this)">💥</div>
            <div class="icon-opt" onclick="selectIcon(this)">😂</div>
            <div class="icon-opt" onclick="selectIcon(this)">🚀</div>
            <div class="icon-opt" onclick="selectIcon(this)">🔪</div>
            <div class="icon-opt" onclick="selectIcon(this)">👻</div>
            <div class="icon-opt" onclick="selectIcon(this)">❤️</div>
            <div class="icon-opt" onclick="selectIcon(this)">🕵️</div>
            <div class="icon-opt" onclick="selectIcon(this)">🎬</div>
            <div class="icon-opt" onclick="selectIcon(this)">📽</div>
            <div class="icon-opt" onclick="selectIcon(this)">🌍</div>
            <div class="icon-opt" onclick="selectIcon(this)">🎵</div>
          </div>
        </div>

        <div class="sidebar-form-block">
          <h4>Color Accent</h4>
          <div style="display:flex;gap:.5rem;flex-wrap:wrap">
            <div style="width:24px;height:24px;border-radius:50%;background:#e8c97e;cursor:pointer;border:2px solid var(--accent)"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#58b076;cursor:pointer"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#d95f5f;cursor:pointer"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#6b8fe0;cursor:pointer"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#c97ee8;cursor:pointer"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#e89a7e;cursor:pointer"></div>
          </div>
        </div>

        <div class="sidebar-form-block" style="background:var(--surface2)">
          <h4>Metadata</h4>
          <div style="font-size:.75rem;color:var(--text-dim);display:grid;gap:.4rem">
            <div>Films: <span style="color:var(--accent)">36</span></div>
            <div>Created: <span style="color:var(--text-muted)">Jan 1, 2024</span></div>
            <div>ID: <span style="color:var(--text-muted);font-family:monospace">gen_0001</span></div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<div id="toasts"></div>
<script src="../common.js"></script>
<script src="admin-nav.js"></script>
<script>
  function selectIcon(el) {
    document.querySelectorAll('.icon-opt').forEach(i => i.classList.remove('selected'));
    el.classList.add('selected');
  }
  function updatePreview() {
    const val = document.getElementById('genre-name-input').value || 'Genre Name';
    document.getElementById('preview-badge').textContent = val;
    document.getElementById('preview-chip').textContent = val;
    document.getElementById('slug-input').value = val.toLowerCase().replace(/\s+/g,'-').replace(/[^a-z0-9-]/g,'');
  }
</script>
</body>
</html>
