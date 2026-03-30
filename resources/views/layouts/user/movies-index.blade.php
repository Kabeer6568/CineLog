
@extends('layouts.user.user')

@section('content')

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
@endsection
<!-- <script src="../common.js"></script>
<script>
  initChips('.chip');
  initSearch('#search-input', '.movie-card', '.movie-title');
</script>
</body>
</html> -->
