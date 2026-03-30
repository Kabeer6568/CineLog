
@extends('layouts.user.user')

@section('content')

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

@endsection