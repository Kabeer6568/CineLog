
@extends('layouts.user.user')

@section('content')

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

@endsection
<!-- <script src="../common.js"></script>
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
</html> -->
