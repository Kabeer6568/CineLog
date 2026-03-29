<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dashboard — CineLog Admin</title>
<link rel="stylesheet" href="../common.css">
<style>
.dash-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
.activity-row {
  display: flex; align-items: center; gap: 0.75rem;
  padding: 0.7rem 0; border-bottom: 1px solid var(--border); font-size: 0.82rem;
}
.activity-row:last-child { border-bottom: none; }
.act-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.act-dot.green { background: var(--green); }
.act-dot.gold { background: var(--accent); }
.act-dot.red { background: var(--red); }
.act-text { flex: 1; color: var(--text-muted); }
.act-text strong { color: var(--text); font-weight: 500; }
.act-time { font-size: 0.7rem; color: var(--text-dim); white-space: nowrap; }

.top-movie-row {
  display: flex; align-items: center; gap: 0.75rem;
  padding: 0.6rem 0; border-bottom: 1px solid var(--border);
}
.top-movie-row:last-child { border-bottom: none; }
.tm-num { font-family: var(--font-display); font-style: italic; font-size: 1.2rem; color: var(--text-dim); width: 24px; text-align: center; flex-shrink: 0; }
.tm-poster { width: 30px; height: 44px; background: var(--surface3); border-radius: 3px; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
.tm-info { flex: 1; }
.tm-title { font-size: 0.82rem; font-weight: 500; color: var(--text); }
.tm-genre { font-size: 0.7rem; color: var(--text-dim); }
.tm-score { font-size: 0.8rem; color: var(--accent); font-weight: 600; }

.chart-bar-wrap { margin-top: 0.75rem; }
.chart-row { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.6rem; font-size: 0.75rem; }
.chart-label { width: 70px; color: var(--text-muted); text-align: right; flex-shrink: 0; }
.chart-bar-bg { flex: 1; height: 6px; background: var(--surface3); border-radius: 3px; overflow: hidden; }
.chart-bar-fill { height: 100%; border-radius: 3px; background: var(--accent); transition: width .6s ease; }
.chart-val { width: 30px; color: var(--text-dim); font-size: 0.7rem; }
</style>
</head>
<body>
<div class="layout-admin">
  <div id="admin-sidebar-placeholder" data-active="dashboard"></div>

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Overview</p>
        <h1>Dashboard</h1>
        <p>Welcome back. Here's what's happening on CineLog.</p>
      </div>
      <div class="ph-actions">
        <a href="admin-movies-create.html" class="btn btn-primary">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          Add Movie
        </a>
      </div>
    </div>

    <!-- STATS -->
    <div class="stat-grid fu fu1">
      <div class="stat-card">
        <div class="stat-label">Total Movies</div>
        <div class="stat-value">138</div>
        <div class="stat-delta up">↑ 12 this month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Actors</div>
        <div class="stat-value">412</div>
        <div class="stat-delta up">↑ 8 this month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Total Users</div>
        <div class="stat-value">2.4k</div>
        <div class="stat-delta up">↑ 5% this week</div>
      </div>
      <div class="stat-card" style="border-color:var(--accent);background:var(--accent-dim)">
        <div class="stat-label" style="color:var(--accent)">Favorites Saved</div>
        <div class="stat-value" style="color:var(--accent)">8.1k</div>
        <div class="stat-delta up">↑ 18% this month</div>
      </div>
    </div>

    <!-- MAIN GRID -->
    <div class="dash-grid fu fu2">

      <!-- TOP MOVIES -->
      <div class="card">
        <div class="card-body">
          <div class="section-title">Top Rated Films</div>
          <div class="top-movie-row">
            <span class="tm-num">1</span>
            <div class="tm-poster">🌌</div>
            <div class="tm-info"><div class="tm-title">Dune: Part Two</div><div class="tm-genre">Sci-Fi · 2024</div></div>
            <span class="tm-score">9.0</span>
          </div>
          <div class="top-movie-row">
            <span class="tm-num">2</span>
            <div class="tm-poster">🌊</div>
            <div class="tm-info"><div class="tm-title">Past Lives</div><div class="tm-genre">Romance · 2023</div></div>
            <span class="tm-score">8.7</span>
          </div>
          <div class="top-movie-row">
            <span class="tm-num">3</span>
            <div class="tm-poster">🎬</div>
            <div class="tm-info"><div class="tm-title">Oppenheimer</div><div class="tm-genre">Drama · 2023</div></div>
            <span class="tm-score">8.4</span>
          </div>
          <div class="top-movie-row">
            <span class="tm-num">4</span>
            <div class="tm-poster">🔮</div>
            <div class="tm-info"><div class="tm-title">Zone of Interest</div><div class="tm-genre">Drama · 2024</div></div>
            <span class="tm-score">8.3</span>
          </div>
          <div class="top-movie-row">
            <span class="tm-num">5</span>
            <div class="tm-poster">🕵️</div>
            <div class="tm-info"><div class="tm-title">Killers / Flower Moon</div><div class="tm-genre">Crime · 2023</div></div>
            <span class="tm-score">8.1</span>
          </div>
        </div>
      </div>

      <!-- ACTIVITY -->
      <div class="card">
        <div class="card-body">
          <div class="section-title">Recent Activity</div>
          <div class="activity-row">
            <span class="act-dot green"></span>
            <span class="act-text"><strong>Dune: Part Two</strong> was added to the catalog</span>
            <span class="act-time">2m ago</span>
          </div>
          <div class="activity-row">
            <span class="act-dot gold"></span>
            <span class="act-text">Actor <strong>Zendaya</strong> profile updated</span>
            <span class="act-time">14m ago</span>
          </div>
          <div class="activity-row">
            <span class="act-dot green"></span>
            <span class="act-text">Genre <strong>Neo-noir</strong> created</span>
            <span class="act-time">1h ago</span>
          </div>
          <div class="activity-row">
            <span class="act-dot red"></span>
            <span class="act-text">Movie <strong>Test Draft</strong> deleted</span>
            <span class="act-time">3h ago</span>
          </div>
          <div class="activity-row">
            <span class="act-dot gold"></span>
            <span class="act-text"><strong>Oppenheimer</strong> runtime corrected</span>
            <span class="act-time">5h ago</span>
          </div>
          <div class="activity-row">
            <span class="act-dot green"></span>
            <span class="act-text">Actor <strong>Cillian Murphy</strong> added</span>
            <span class="act-time">1d ago</span>
          </div>
        </div>
      </div>

      <!-- GENRES CHART -->
      <div class="card">
        <div class="card-body">
          <div class="section-title">Movies by Genre</div>
          <div class="chart-bar-wrap">
            <div class="chart-row"><span class="chart-label">Drama</span><div class="chart-bar-bg"><div class="chart-bar-fill" style="width:78%"></div></div><span class="chart-val">36</span></div>
            <div class="chart-row"><span class="chart-label">Action</span><div class="chart-bar-bg"><div class="chart-bar-fill" style="width:55%"></div></div><span class="chart-val">25</span></div>
            <div class="chart-row"><span class="chart-label">Comedy</span><div class="chart-bar-bg"><div class="chart-bar-fill" style="width:40%"></div></div><span class="chart-val">19</span></div>
            <div class="chart-row"><span class="chart-label">Sci-Fi</span><div class="chart-bar-bg"><div class="chart-bar-fill" style="width:34%"></div></div><span class="chart-val">16</span></div>
            <div class="chart-row"><span class="chart-label">Thriller</span><div class="chart-bar-bg"><div class="chart-bar-fill" style="width:28%"></div></div><span class="chart-val">13</span></div>
            <div class="chart-row"><span class="chart-label">Horror</span><div class="chart-bar-bg"><div class="chart-bar-fill" style="width:20%"></div></div><span class="chart-val">9</span></div>
            <div class="chart-row"><span class="chart-label">Other</span><div class="chart-bar-bg"><div class="chart-bar-fill" style="width:44%"></div></div><span class="chart-val">20</span></div>
          </div>
        </div>
      </div>

      <!-- QUICK LINKS -->
      <div class="card">
        <div class="card-body">
          <div class="section-title">Quick Actions</div>
          <div style="display:grid;gap:.5rem">
            <a href="admin-movies-create.html" class="btn btn-secondary" style="justify-content:flex-start">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/></svg>
              Add new movie
            </a>
            <a href="admin-actors-create.html" class="btn btn-secondary" style="justify-content:flex-start">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              Add new actor
            </a>
            <a href="admin-genres-create.html" class="btn btn-secondary" style="justify-content:flex-start">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
              Add new genre
            </a>
            <a href="admin-movies-index.html" class="btn btn-secondary" style="justify-content:flex-start">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
              Manage all movies
            </a>
          </div>
        </div>
      </div>

    </div>
  </main>
</div>
<div id="toasts"></div>
<script src="../common.js"></script>
<script src="admin-nav.js"></script>
</body>
</html>
