<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Add Genre — CineLog Admin</title>
<link rel="stylesheet" href="../common.css">
</head>
<body>
<div class="layout-admin">
  <div id="admin-sidebar-placeholder" data-active="genres/create"></div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Taxonomy</p>
        <h1>Add Genre</h1>
      </div>
      <div class="ph-actions">
        <a href="admin-genres-index.html" class="btn btn-ghost">← Back</a>
      </div>
    </div>

    <div class="form-layout fu fu1">
      <div>
        <div class="card">
          <div class="card-body">
            <div class="section-title">Genre Details</div>
            <div class="form-grid">
              <div class="form-row">
                <div class="form-group">
                  <label>Genre Name *</label>
                  <input type="text" placeholder="e.g. Neo-Noir" id="genre-name-input" oninput="updatePreview()">
                </div>
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" placeholder="auto-generated" id="slug-input" style="color:var(--text-dim)">
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea placeholder="Describe this genre…"></textarea>
              </div>
            </div>
          </div>
        </div>

        <!-- PREVIEW -->
        <div class="card" style="margin-top:1.25rem">
          <div class="card-body">
            <div class="section-title">Preview</div>
            <p style="font-size:.8rem;color:var(--text-dim);margin-bottom:.75rem">How this genre appears to users:</p>
            <div id="preview-container">
              <span class="badge badge-neutral" id="preview-badge">Genre Name</span>
            </div>
            <div style="margin-top:1rem">
              <span class="chip" id="preview-chip">Genre Name</span>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:.75rem;justify-content:flex-end;margin-top:1.5rem">
          <a href="admin-genres-index.html" class="btn btn-ghost">Cancel</a>
          <button class="btn btn-primary" onclick="toast('Genre created!','success'); setTimeout(() => location.href='admin-genres-index.html',1200)">Create Genre</button>
        </div>
      </div>

      <!-- SIDEBAR -->
      <div>
        <div class="sidebar-form-block">
          <h4>Icon</h4>
          <div class="icon-grid" id="icon-grid">
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
            <div style="width:24px;height:24px;border-radius:50%;background:#e8c97e;cursor:pointer;border:2px solid var(--accent)" onclick="setColor(this,'#e8c97e')"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#58b076;cursor:pointer" onclick="setColor(this,'#58b076')"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#d95f5f;cursor:pointer" onclick="setColor(this,'#d95f5f')"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#6b8fe0;cursor:pointer" onclick="setColor(this,'#6b8fe0')"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#c97ee8;cursor:pointer" onclick="setColor(this,'#c97ee8')"></div>
            <div style="width:24px;height:24px;border-radius:50%;background:#e89a7e;cursor:pointer" onclick="setColor(this,'#e89a7e')"></div>
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
  function setColor(el, color) {
    document.querySelectorAll('.sidebar-form-block div[style*="border-radius:50%"]').forEach(d => d.style.border='none');
    el.style.border = `2px solid ${color}`;
  }
</script>
</body>
</html>
