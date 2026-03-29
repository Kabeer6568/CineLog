<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Movies — CineLog</title>
<link rel="stylesheet" href="../common.css">
<style>
.hero {
  margin-bottom: 2.5rem;
  padding: 3rem 0 2rem;
  position: relative;
}
.hero::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(232,201,126,0.05), transparent);
  pointer-events: none;
}
.hero-title { font-size: clamp(2rem,5vw,3.5rem); font-style: italic; margin-bottom: 0.5rem; }
.hero-sub { font-size: 0.9rem; color: var(--text-muted); }

.genre-scroll {
  display: flex; gap: 0.5rem; overflow-x: auto; padding-bottom: 0.5rem;
  scrollbar-width: none; margin-bottom: 1.5rem;
}
.genre-scroll::-webkit-scrollbar { display: none; }

.sort-row { display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; }
.sort-row select { width: auto; min-width: 160px; }
.results-count { font-size: 0.78rem; color: var(--text-dim); margin-left: auto; }
</style>
</head>
<body>
<div class="layout-user">

  <!-- HEADER -->
  <header class="user-header">
    <a href="../user/movies-index.html" class="logo">Cine<span>Log</span></a>
    <div class="header-search">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      <input type="text" placeholder="Search movies…" id="search-input">
    </div>
    <nav class="user-nav">
      <a href="movies-index.html" class="active">Movies</a>
      <a href="favorites-index.html">Favorites</a>
    </nav>
  </header>

  <main class="main-content">

    <!-- HERO -->
    <div class="hero fu">
      <p class="ph-eyebrow">Browse</p>
      <h1 class="hero-title">Discover Films</h1>
      <p class="hero-sub">Explore our curated collection of movies across every genre.</p>
    </div>

    <!-- GENRE CHIPS -->
    <div class="genre-scroll fu fu1">
      <button class="chip active">All</button>
      <button class="chip">Action</button>
      <button class="chip">Drama</button>
      <button class="chip">Comedy</button>
      <button class="chip">Thriller</button>
      <button class="chip">Sci-Fi</button>
      <button class="chip">Horror</button>
      <button class="chip">Romance</button>
      <button class="chip">Documentary</button>
      <button class="chip">Animation</button>
    </div>

    <!-- SORT ROW -->
    <div class="sort-row fu fu2">
      <select>
        <option>Sort: Latest</option>
        <option>Sort: Rating ↓</option>
        <option>Sort: Title A–Z</option>
        <option>Sort: Year ↓</option>
      </select>
      <span class="results-count">Showing 24 of 138 films</span>
    </div>

    <!-- GRID -->
    <div class="movie-grid fu fu3" id="movie-grid">

      <!-- cards × 12 -->
      <div class="movie-card" onclick="location.href='movies-show.html'">
        <div class="movie-poster">
          <div class="movie-poster-ph">🎬</div>
          <span class="movie-badge">★ 8.4</span>
          <div class="movie-overlay">
            <button class="btn btn-primary btn-sm btn-icon" onclick="event.stopPropagation(); toggleFav(this,1)" title="Favorite">♡</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation(); location.href='movies-show.html'">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Oppenheimer</div>
          <div class="movie-meta"><span>2023</span><span>Drama</span></div>
        </div>
      </div>

      <div class="movie-card" onclick="location.href='movies-show.html'">
        <div class="movie-poster">
          <div class="movie-poster-ph">🎭</div>
          <span class="movie-badge">★ 7.9</span>
          <div class="movie-overlay">
            <button class="btn btn-primary btn-sm btn-icon" onclick="event.stopPropagation(); toggleFav(this,2)" title="Favorite">♡</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation(); location.href='movies-show.html'">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Poor Things</div>
          <div class="movie-meta"><span>2023</span><span>Comedy</span></div>
        </div>
      </div>

      <div class="movie-card" onclick="location.href='movies-show.html'">
        <div class="movie-poster">
          <div class="movie-poster-ph">🌌</div>
          <span class="movie-badge">★ 9.0</span>
          <div class="movie-overlay">
            <button class="btn btn-primary btn-sm btn-icon" onclick="event.stopPropagation(); toggleFav(this,3)" title="Favorite">♡</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Dune: Part Two</div>
          <div class="movie-meta"><span>2024</span><span>Sci-Fi</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🕵️</div>
          <span class="movie-badge">★ 8.1</span>
          <div class="movie-overlay">
            <button class="btn btn-primary btn-sm btn-icon" onclick="event.stopPropagation(); toggleFav(this,4)">♡</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Killers of the Flower Moon</div>
          <div class="movie-meta"><span>2023</span><span>Crime</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🤖</div>
          <span class="movie-badge">★ 7.6</span>
          <div class="movie-overlay">
            <button class="btn btn-primary btn-sm btn-icon" onclick="event.stopPropagation(); toggleFav(this,5)">♡</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">The Creator</div>
          <div class="movie-meta"><span>2023</span><span>Sci-Fi</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🌊</div>
          <span class="movie-badge">★ 8.7</span>
          <div class="movie-overlay">
            <button class="btn btn-primary btn-sm btn-icon" onclick="event.stopPropagation(); toggleFav(this,6)">♡</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Past Lives</div>
          <div class="movie-meta"><span>2023</span><span>Romance</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🏆</div>
          <span class="movie-badge">★ 7.4</span>
          <div class="movie-overlay">
            <button class="btn btn-primary btn-sm btn-icon" onclick="event.stopPropagation(); toggleFav(this,7)">♡</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Barbie</div>
          <div class="movie-meta"><span>2023</span><span>Comedy</span></div>
        </div>
      </div>

      <div class="movie-card">
        <div class="movie-poster">
          <div class="movie-poster-ph">🔮</div>
          <span class="movie-badge">★ 8.3</span>
          <div class="movie-overlay">
            <button class="btn btn-primary btn-sm btn-icon" onclick="event.stopPropagation(); toggleFav(this,8)">♡</button>
            <button class="btn btn-secondary btn-sm" onclick="event.stopPropagation()">View</button>
          </div>
        </div>
        <div class="movie-info">
          <div class="movie-title">Zone of Interest</div>
          <div class="movie-meta"><span>2024</span><span>Drama</span></div>
        </div>
      </div>

    </div>

    <!-- PAGINATION -->
    <div class="pagination fu">
      <button class="pg-btn" disabled>←</button>
      <button class="pg-btn active">1</button>
      <button class="pg-btn">2</button>
      <button class="pg-btn">3</button>
      <span style="color:var(--text-dim);font-size:.8rem;">…</span>
      <button class="pg-btn">6</button>
      <button class="pg-btn">→</button>
    </div>

  </main>
</div>

<div id="toasts"></div>
<script src="../common.js"></script>
<script>
  initChips('.chip');
  initSearch('#search-input', '.movie-card', '.movie-title');
</script>
</body>
</html>
