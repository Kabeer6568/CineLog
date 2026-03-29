<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Movies — CineLog Admin</title>
<link rel="stylesheet" href="../common.css">
<style>
.poster-cell { width: 32px; height: 46px; border-radius: 4px; background: var(--surface3); display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
.td-poster { width: 52px; }
.bulk-bar {
  background: var(--surface2); border: 1px solid var(--border); border-radius: var(--radius);
  padding: 0.6rem 1rem; margin-bottom: 1rem;
  display: flex; align-items: center; gap: 1rem; font-size: 0.8rem; color: var(--text-muted);
  display: none;
}
.bulk-bar.visible { display: flex; }
</style>
</head>
<body>
<div class="layout-admin">
  <div id="admin-sidebar-placeholder" data-active="movies/index"></div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Catalog</p>
        <h1>Movies</h1>
        <p>Manage all films in the database.</p>
      </div>
      <div class="ph-actions">
        <a href="admin-movies-create.html" class="btn btn-primary">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          Add Movie
        </a>
      </div>
    </div>

    <!-- FILTER BAR -->
    <div class="filter-bar fu fu1">
      <input type="text" placeholder="Search by title…" id="search-input" style="max-width:260px">
      <div class="chips">
        <button class="chip active">All</button>
        <button class="chip">Published</button>
        <button class="chip">Draft</button>
      </div>
      <select style="width:auto;min-width:130px;margin-left:auto">
        <option>Year: All</option>
        <option>2024</option>
        <option>2023</option>
        <option>2022</option>
      </select>
      <select style="width:auto;min-width:150px">
        <option>Genre: All</option>
        <option>Drama</option>
        <option>Action</option>
        <option>Sci-Fi</option>
      </select>
    </div>

    <!-- BULK BAR -->
    <div class="bulk-bar" id="bulk-bar">
      <span id="bulk-count">0 selected</span>
      <button class="btn btn-danger btn-sm" onclick="toast('Deleted selected items','success')">Delete</button>
      <button class="btn btn-secondary btn-sm" onclick="clearBulk()">Cancel</button>
    </div>

    <!-- TABLE -->
    <div class="table-wrap fu fu2">
      <table>
        <thead>
          <tr>
            <th style="width:36px"><input type="checkbox" id="select-all" onchange="updateBulk()"></th>
            <th class="td-poster">Poster</th>
            <th>Title</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Status</th>
            <th style="width:100px">Actions</th>
          </tr>
        </thead>
        <tbody id="movies-tbody">
          <tr>
            <td><input type="checkbox" class="row-cb" onchange="updateBulk()"></td>
            <td><div class="poster-cell">🎬</div></td>
            <td><span class="td-main">Oppenheimer</span></td>
            <td>2023</td>
            <td><span class="badge badge-neutral">Drama</span></td>
            <td><span style="color:var(--accent)">★ 8.4</span></td>
            <td><span class="badge badge-green">Published</span></td>
            <td>
              <div style="display:flex;gap:.4rem">
                <a href="admin-movies-edit.html" class="btn btn-ghost btn-sm btn-icon" title="Edit">✎</a>
                <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete Oppenheimer?', () => toast('Deleted','success'))" title="Delete">🗑</button>
              </div>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" class="row-cb" onchange="updateBulk()"></td>
            <td><div class="poster-cell">🌌</div></td>
            <td><span class="td-main">Dune: Part Two</span></td>
            <td>2024</td>
            <td><span class="badge badge-neutral">Sci-Fi</span></td>
            <td><span style="color:var(--accent)">★ 9.0</span></td>
            <td><span class="badge badge-green">Published</span></td>
            <td>
              <div style="display:flex;gap:.4rem">
                <a href="admin-movies-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
                <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete Dune: Part Two?', () => toast('Deleted','success'))">🗑</button>
              </div>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" class="row-cb" onchange="updateBulk()"></td>
            <td><div class="poster-cell">🌊</div></td>
            <td><span class="td-main">Past Lives</span></td>
            <td>2023</td>
            <td><span class="badge badge-neutral">Romance</span></td>
            <td><span style="color:var(--accent)">★ 8.7</span></td>
            <td><span class="badge badge-green">Published</span></td>
            <td>
              <div style="display:flex;gap:.4rem">
                <a href="admin-movies-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
                <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete Past Lives?', () => toast('Deleted','success'))">🗑</button>
              </div>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" class="row-cb" onchange="updateBulk()"></td>
            <td><div class="poster-cell">🕵️</div></td>
            <td><span class="td-main">Killers of the Flower Moon</span></td>
            <td>2023</td>
            <td><span class="badge badge-neutral">Crime</span></td>
            <td><span style="color:var(--accent)">★ 8.1</span></td>
            <td><span class="badge badge-green">Published</span></td>
            <td>
              <div style="display:flex;gap:.4rem">
                <a href="admin-movies-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
                <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
              </div>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" class="row-cb" onchange="updateBulk()"></td>
            <td><div class="poster-cell">🤖</div></td>
            <td><span class="td-main">The Creator</span></td>
            <td>2023</td>
            <td><span class="badge badge-neutral">Sci-Fi</span></td>
            <td><span style="color:var(--accent)">★ 7.6</span></td>
            <td><span class="badge badge-red">Draft</span></td>
            <td>
              <div style="display:flex;gap:.4rem">
                <a href="admin-movies-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
                <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
              </div>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox" class="row-cb" onchange="updateBulk()"></td>
            <td><div class="poster-cell">🎭</div></td>
            <td><span class="td-main">Poor Things</span></td>
            <td>2023</td>
            <td><span class="badge badge-neutral">Comedy</span></td>
            <td><span style="color:var(--accent)">★ 7.9</span></td>
            <td><span class="badge badge-green">Published</span></td>
            <td>
              <div style="display:flex;gap:.4rem">
                <a href="admin-movies-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
                <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete?', () => toast('Deleted','success'))">🗑</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- PAGINATION -->
    <div class="pagination fu">
      <button class="pg-btn" disabled>←</button>
      <button class="pg-btn active">1</button>
      <button class="pg-btn">2</button>
      <button class="pg-btn">3</button>
      <button class="pg-btn">→</button>
    </div>
  </main>
</div>
<div id="toasts"></div>
<script src="../common.js"></script>
<script src="admin-nav.js"></script>
<script>
  initChips('.chip');
  initSearch('#search-input', 'tbody tr', '.td-main');

  function updateBulk() {
    const checked = document.querySelectorAll('.row-cb:checked').length;
    const bar = document.getElementById('bulk-bar');
    bar.classList.toggle('visible', checked > 0);
    document.getElementById('bulk-count').textContent = `${checked} selected`;
  }
  function clearBulk() {
    document.querySelectorAll('.row-cb, #select-all').forEach(cb => cb.checked = false);
    document.getElementById('bulk-bar').classList.remove('visible');
  }
</script>
</body>
</html>
