<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Edit Actor — CineLog Admin</title>
<link rel="stylesheet" href="../common.css">
</head>
<body>
<div class="layout-admin">
  <div id="admin-sidebar-placeholder" data-active="actors/index"></div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">People</p>
        <h1>Edit Actor</h1>
      </div>
      <div class="ph-actions">
        <button class="btn btn-danger btn-sm" onclick="confirmAction('Delete Cillian Murphy?', () => { toast('Deleted','success'); setTimeout(() => location.href='admin-actors-index.html',1000); })">Delete</button>
        <a href="admin-actors-index.html" class="btn btn-ghost">← Back</a>
      </div>
    </div>

    <div class="edit-badge fu">✎ Editing: <strong>Cillian Murphy</strong></div>

    <div class="form-layout fu fu1">
      <div>
        <div class="card">
          <div class="card-body">
            <div class="section-title">Personal Details</div>
            <div class="form-grid">
              <div class="form-row">
                <div class="form-group">
                  <label>First Name *</label>
                  <input type="text" value="Cillian">
                </div>
                <div class="form-group">
                  <label>Last Name *</label>
                  <input type="text" value="Murphy">
                </div>
              </div>
              <div class="form-group">
                <label>Biography</label>
                <textarea>Cillian Murphy is an Irish actor. He is known for his versatile roles in both independent films and major Hollywood productions. He gained widespread recognition for his portrayal of J. Robert Oppenheimer in Christopher Nolan's film.</textarea>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Date of Birth</label>
                  <input type="date" value="1976-05-25">
                </div>
                <div class="form-group">
                  <label>Nationality</label>
                  <input type="text" value="Irish">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label>Place of Birth</label>
                  <input type="text" value="Douglas, Cork, Ireland">
                </div>
                <div class="form-group">
                  <label>Known For</label>
                  <input type="text" value="Acting">
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
              <span class="film-tag">Peaky Blinders <button onclick="this.parentElement.remove()">×</button></span>
              <span class="film-tag">A Quiet Place 2 <button onclick="this.parentElement.remove()">×</button></span>
              <span class="film-tag">Batman Begins <button onclick="this.parentElement.remove()">×</button></span>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:.75rem;justify-content:space-between;align-items:center;margin-top:1.5rem">
          <button class="btn btn-danger btn-sm" onclick="confirmAction('Delete this actor?', () => toast('Deleted','success'))">Delete Actor</button>
          <div style="display:flex;gap:.6rem">
            <button class="btn btn-secondary">Discard</button>
            <button class="btn btn-primary" onclick="toast('Changes saved!','success'); setTimeout(() => location.href='admin-actors-index.html',1200)">Save Changes</button>
          </div>
        </div>
      </div>

      <div>
        <div class="sidebar-form-block">
          <h4>Photo</h4>
          <div class="photo-preview">👨</div>
          <div class="photo-preview-actions">
            <button class="btn btn-secondary btn-sm" onclick="toast('File picker not connected','info')">Change</button>
            <button class="btn btn-danger btn-sm" onclick="toast('Photo removed','info')">Remove</button>
          </div>
        </div>

        <div class="sidebar-form-block">
          <h4>Social Links</h4>
          <div class="form-group" style="margin-bottom:.75rem">
            <label>IMDb</label>
            <input type="url" value="https://imdb.com/name/nm0614165">
          </div>
          <div class="form-group">
            <label>Wikipedia</label>
            <input type="url" placeholder="https://en.wikipedia.org/...">
          </div>
        </div>

        <div class="sidebar-form-block" style="background:var(--surface2)">
          <h4>Metadata</h4>
          <div style="font-size:.75rem;color:var(--text-dim);display:grid;gap:.4rem">
            <div>Added: <span style="color:var(--text-muted)">Feb 5, 2024</span></div>
            <div>Films: <span style="color:var(--accent)">12</span></div>
            <div>ID: <span style="color:var(--text-muted);font-family:monospace">act_0011</span></div>
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
</body>
</html>
