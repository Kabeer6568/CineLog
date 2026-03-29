<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Oppenheimer — CineLog</title>
<link rel="stylesheet" href="../common.css">
<style>
.movie-backdrop {
  width: 100%; height: 280px;
  background: linear-gradient(160deg, #1a1508 0%, #0a0a0a 100%);
  position: relative; overflow: hidden; margin-bottom: 0;
  display: flex; align-items: flex-end;
}
.movie-backdrop::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 60% 80% at 30% 50%, rgba(232,201,126,0.08), transparent);
}
.backdrop-poster {
  position: absolute; right: 0; top: 0; bottom: 0; width: 50%;
  background: linear-gradient(to left, rgba(26,21,8,0.3), rgba(10,10,10,1));
  display: flex; align-items: center; justify-content: flex-end;
  padding-right: 2.5rem;
}
.poster-thumb {
  width: 120px; height: 180px;
  background: var(--surface2); border: 1px solid var(--border);
  border-radius: var(--radius-lg); overflow: hidden;
  display: flex; align-items: center; justify-content: center;
  font-size: 2.5rem; box-shadow: var(--shadow-lg); flex-shrink: 0;
}
.backdrop-content {
  position: relative; z-index: 1;
  padding: 0 clamp(1rem,4vw,2.5rem) 2rem;
}
.movie-genres { display: flex; gap: 0.4rem; margin-bottom: 0.75rem; flex-wrap: wrap; }
.movie-show-title { font-size: clamp(1.8rem,4vw,3rem); font-style: italic; margin-bottom: 0.5rem; }
.movie-meta-row {
  display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;
  font-size: 0.8rem; color: var(--text-muted);
}
.movie-meta-row .sep { color: var(--text-dim); }
.meta-rating { color: var(--accent); font-weight: 600; font-size: 1rem; }

.movie-body { padding: clamp(1.5rem,4vw,2.5rem); }
.movie-layout { display: grid; grid-template-columns: 1fr 300px; gap: 2.5rem; }
.movie-overview { font-size: 0.9rem; color: var(--text-muted); line-height: 1.75; margin-bottom: 1.5rem; }

/* actors */
.cast-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 0.75rem; }
.cast-card {
  background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius);
  padding: 0.75rem 0.5rem; text-align: center;
}
.cast-avatar {
  width: 48px; height: 48px; border-radius: 50%;
  background: var(--surface2); margin: 0 auto 0.5rem;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem;
}
.cast-name { font-size: 0.72rem; font-weight: 500; color: var(--text); }
.cast-role { font-size: 0.66rem; color: var(--text-dim); margin-top: 0.1rem; }

/* sidebar */
.movie-sidebar {}
.sidebar-block {
  background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg);
  padding: 1.25rem; margin-bottom: 1rem;
}
.sidebar-block h4 { font-family: var(--font-body); font-size: 0.72rem; font-weight: 500;
  text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-dim); margin-bottom: 0.9rem; }
.info-row { display: flex; justify-content: space-between; padding: 0.45rem 0; border-bottom: 1px solid var(--border); font-size: 0.8rem; }
.info-row:last-child { border-bottom: none; }
.info-row span:first-child { color: var(--text-dim); }
.info-row span:last-child { color: var(--text); font-weight: 500; }

.star-row { display: flex; gap: 0.3rem; margin-bottom: 0.75rem; }
.star { font-size: 1.2rem; cursor: pointer; color: var(--text-dim); transition: color .1s; }
.star:hover, .star.on { color: var(--accent); }
.user-review-text { font-size: 0.825rem; color: var(--text-muted); }

.actions-row { display: flex; gap: 0.6rem; flex-wrap: wrap; margin-top: 1rem; }
</style>
</head>
<body>
<div class="layout-user">

  <!-- HEADER -->
  <header class="user-header">
    <a href="movies-index.html" class="logo">Cine<span>Log</span></a>
    <nav class="user-nav">
      <a href="movies-index.html" class="active">Movies</a>
      <a href="favorites-index.html">Favorites</a>
    </nav>
  </header>

  <!-- BACKDROP -->
  <div class="movie-backdrop fu">
    <div class="backdrop-poster">
      <div class="poster-thumb">🎬</div>
    </div>
    <div class="backdrop-content">
      <div class="movie-genres">
        <span class="badge badge-gold">Drama</span>
        <span class="badge badge-neutral">History</span>
        <span class="badge badge-neutral">Biography</span>
      </div>
      <h1 class="movie-show-title">Oppenheimer</h1>
      <div class="movie-meta-row">
        <span class="meta-rating">★ 8.4</span>
        <span class="sep">·</span>
        <span>2023</span>
        <span class="sep">·</span>
        <span>3h 0m</span>
        <span class="sep">·</span>
        <span>Christopher Nolan</span>
      </div>
    </div>
  </div>

  <main class="movie-body">
    <div class="movie-layout fu fu1">

      <!-- MAIN -->
      <div>
        <p class="movie-overview">
          The story of J. Robert Oppenheimer's role in the development of the atomic bomb during World War II. As director of the Manhattan Project, Oppenheimer is confronted with the moral and ethical implications of his creation. A gripping portrait of genius, ambition, and the terrible weight of history.
        </p>

        <div class="actions-row">
          <button class="btn btn-primary" onclick="toggleFav(this, 1); this.textContent = this.classList.contains('fav-active') ? '♥  In Favorites' : '♡  Add to Favorites'">♡  Add to Favorites</button>
          <button class="btn btn-secondary" onclick="toast('Marked as watched!', 'success')">✓  Mark Watched</button>
          <a href="movies-index.html" class="btn btn-ghost">← Back</a>
        </div>

        <hr>

        <!-- CAST -->
        <div class="section-title fu fu2">Cast</div>
        <div class="cast-grid fu fu2">
          <div class="cast-card">
            <div class="cast-avatar">👨</div>
            <div class="cast-name">Cillian Murphy</div>
            <div class="cast-role">J.R. Oppenheimer</div>
          </div>
          <div class="cast-card">
            <div class="cast-avatar">👨‍🦳</div>
            <div class="cast-name">Robert Downey Jr.</div>
            <div class="cast-role">Lewis Strauss</div>
          </div>
          <div class="cast-card">
            <div class="cast-avatar">👩</div>
            <div class="cast-name">Emily Blunt</div>
            <div class="cast-role">Kitty Oppenheimer</div>
          </div>
          <div class="cast-card">
            <div class="cast-avatar">🧑</div>
            <div class="cast-name">Matt Damon</div>
            <div class="cast-role">Gen. Groves</div>
          </div>
          <div class="cast-card">
            <div class="cast-avatar">👩‍🦱</div>
            <div class="cast-name">Florence Pugh</div>
            <div class="cast-role">Jean Tatlock</div>
          </div>
          <div class="cast-card">
            <div class="cast-avatar">👱</div>
            <div class="cast-name">Josh Hartnett</div>
            <div class="cast-role">Ernest Lawrence</div>
          </div>
        </div>

      </div>

      <!-- SIDEBAR -->
      <aside class="movie-sidebar fu fu3">

        <!-- YOUR RATING -->
        <div class="sidebar-block">
          <h4>Your Rating</h4>
          <div class="star-row" id="stars">
            <span class="star" onclick="rate(1)">★</span>
            <span class="star" onclick="rate(2)">★</span>
            <span class="star" onclick="rate(3)">★</span>
            <span class="star" onclick="rate(4)">★</span>
            <span class="star" onclick="rate(5)">★</span>
          </div>
          <p class="user-review-text" id="rating-label">Tap to rate</p>
        </div>

        <!-- INFO -->
        <div class="sidebar-block">
          <h4>Details</h4>
          <div class="info-row"><span>Director</span><span>Christopher Nolan</span></div>
          <div class="info-row"><span>Year</span><span>2023</span></div>
          <div class="info-row"><span>Runtime</span><span>3h 0m</span></div>
          <div class="info-row"><span>Country</span><span>USA / UK</span></div>
          <div class="info-row"><span>Language</span><span>English</span></div>
          <div class="info-row"><span>Budget</span><span>$100M</span></div>
          <div class="info-row"><span>Box Office</span><span>$952M</span></div>
        </div>

        <!-- GLOBAL RATING -->
        <div class="sidebar-block">
          <h4>Community</h4>
          <div class="info-row"><span>CineLog Score</span><span style="color:var(--accent)">★ 8.4</span></div>
          <div class="info-row"><span>Total Ratings</span><span>12,481</span></div>
          <div class="info-row"><span>In Favorites</span><span>4,203</span></div>
        </div>

      </aside>
    </div>
  </main>
</div>

<div id="toasts"></div>
<script src="../common.js"></script>
<script>
  let userRating = 0;
  function rate(n) {
    userRating = n;
    document.querySelectorAll('.star').forEach((s, i) => s.classList.toggle('on', i < n));
    document.getElementById('rating-label').textContent = ['','Poor','Fair','Good','Great','Excellent'][n] + ` — ${n}/5`;
    toast(`Rated ${n}/5 stars`, 'success');
  }
</script>
</body>
</html>
