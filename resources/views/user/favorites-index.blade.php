<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Favorites — CineLog</title>
<link rel="stylesheet" href="../common.css">
<style>
.fav-summary {
  display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
  gap: 1rem; margin-bottom: 2.5rem;
}
.fav-stat {
  background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg);
  padding: 1rem 1.2rem;
}
.fav-stat .val { font-family: var(--font-display); font-size: 1.8rem; color: var(--text); line-height: 1; }
.fav-stat .lbl { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-dim); margin-top: 0.3rem; }

.list-view .movie-card {
  display: grid; grid-template-columns: 60px 1fr auto;
  gap: 1rem; align-items: center;
  border-radius: var(--radius);
  padding: 0.5rem;
}
.list-view .movie-poster { width: 60px; height: 90px; border-radius: var(--radius); flex-shrink: 0; aspect-ratio: unset; }
.list-view .movie-overlay { display: none; }
.list-view .movie-info { padding: 0; }
.list-view .movie-title { font-size: 0.9rem; white-space: normal; }

.view-toggle { display: flex; gap: 0.3rem; }
.view-btn {
  width: 30px; height: 30px; border-radius: var(--radius); border: 1px solid var(--border);
  background: transparent; color: var(--text-dim); cursor: pointer; display: flex;
  align-items: center; justify-content: center; transition: all .15s; font-size: 0.85rem;
}
.view-btn.active { background: var(--accent-dim); border-color: var(--accent); color: var(--accent); }
</style>
</head>
<body>
<div class="layout-user">

  <header class="user-header">
    <a href="movies-index.html" class="logo">Cine<span>Log</span></a>
    <div class="header-search">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      <input type="text" placeholder="Search favorites…" id="search-input">
    </div>
    <nav class="user-nav">
      <a href="movies-index.html">Movies</a>
      <a href="favorites-index.html" class="active">Favorites</a>
    </nav>
  </header>

  <main class="main-content">

    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">My Collection</p>
        <h1>Favorites</h1>
        <p>Films you've saved to watch and revisit.</p>
      </div>
      <div class="ph-actions">
        <div class="view-toggle">
          <button class="view-btn active" id="grid-btn" onclick="setView('grid')" title="Grid view">⊞</button>
          <button class="view-btn" id="list-btn" onclick="setView('list')" title="List view">☰</button>
        </div>
      </div>
    </div>

    <!-- STATS -->
    <div class="fav-summary fu fu1">
      <div class="fav-stat"><div class="val">24</div><div class="lbl">Saved</div></div>
      <div class="fav-stat"><div class="val">18</div><div class="lbl">Watched</div></div>
      <div class="fav-stat"><div class="val">6</div><div class="lbl">Unwatched</div></div>
      <div class="fav-stat" style="border-color: var(--accent); background: var(--accent-dim);">
        <div class="val" style="color:var(--accent)">4.1</div><div class="lbl">Avg Rating</div>
      </div>
    </div>

    <!-- FILTER BAR -->
    <div class="filter-bar fu fu2">
      <input type="text" placeholder="Filter…" id="search-input" style="display:none">
      <div class="chips">
        <button class="chip active">All</button>
        <button class="chip">Watched</button>
        <button class="chip">Unwatched</button>
        <button class="chip">Top Rated</button>
      </div>
      <select style="width:auto;min-width:140px;margin-left:auto">
        <option>Sort: Added ↓</option>
        <option>Sort: Rating ↓</option>
        <option>Sort: Year ↓</option>
        <option>Sort: Title A–Z</option>
      </select>
    </div>

    <!-- GRID -->
    <div class="movie-grid fu fu3" id="favorites-grid">

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🎬</div>
          <span class="movie-badge">★ 8.4</span>
          <div class="movie-overlay">
            <button class="btn btn-danger btn-sm btn-icon" onclick="event.stopPropagation(); removeFav(this)" title="Remove">♥</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation(); location.href='movies-show.html'">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Oppenheimer</div>
          <div class="movie-meta"><span>2023</span><span style="color:var(--green)">✓</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🌌</div>
          <span class="movie-badge">★ 9.0</span>
          <div class="movie-overlay">
            <button class="btn btn-danger btn-sm btn-icon" onclick="event.stopPropagation(); removeFav(this)">♥</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Dune: Part Two</div>
          <div class="movie-meta"><span>2024</span><span style="color:var(--green)">✓</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🌊</div>
          <span class="movie-badge">★ 8.7</span>
          <div class="movie-overlay">
            <button class="btn btn-danger btn-sm btn-icon" onclick="event.stopPropagation(); removeFav(this)">♥</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Past Lives</div>
          <div class="movie-meta"><span>2023</span><span style="color:var(--text-dim)">Unwatched</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🕵️</div>
          <span class="movie-badge">★ 8.1</span>
          <div class="movie-overlay">
            <button class="btn btn-danger btn-sm btn-icon" onclick="event.stopPropagation(); removeFav(this)">♥</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Killers of the Flower Moon</div>
          <div class="movie-meta"><span>2023</span><span style="color:var(--green)">✓</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🔮</div>
          <span class="movie-badge">★ 8.3</span>
          <div class="movie-overlay">
            <button class="btn btn-danger btn-sm btn-icon" onclick="event.stopPropagation(); removeFav(this)">♥</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Zone of Interest</div>
          <div class="movie-meta"><span>2024</span><span style="color:var(--text-dim)">Unwatched</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🎭</div>
          <span class="movie-badge">★ 7.9</span>
          <div class="movie-overlay">
            <button class="btn btn-danger btn-sm btn-icon" onclick="event.stopPropagation(); removeFav(this)">♥</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Poor Things</div>
          <div class="movie-meta"><span>2023</span><span style="color:var(--green)">✓</span></div>
        </div>
      </div>

    </div>

  </main>
</div>

<div id="toasts"></div>
<script src="../common.js"></script>
<script>
  initChips('.chip');

  function setView(v) {
    const grid = document.getElementById('favorites-grid');
    document.getElementById('grid-btn').classList.toggle('active', v === 'grid');
    document.getElementById('list-btn').classList.toggle('active', v === 'list');
    grid.classList.toggle('list-view', v === 'list');
    if (v === 'list') grid.style.gridTemplateColumns = '1fr';
    else grid.style.gridTemplateColumns = '';
  }

  function removeFav(btn) {
    const card = btn.closest('.movie-card');
    card.style.transition = 'opacity .3s, transform .3s';
    card.style.opacity = '0'; card.style.transform = 'scale(0.95)';
    setTimeout(() => card.remove(), 300);
    toast('Removed from favorites', 'info');
  }
</script>
</body>
</html>
