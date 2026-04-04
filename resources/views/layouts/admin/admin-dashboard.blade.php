
@extends('layouts.admin.admin')

@section('content')
<div class="layout-admin">
  <div id="admin-sidebar-placeholder"
     data-active="movies/index"
     data-dashboard-url="{{ route('admin.dashboard') }}"
     data-movies-index-url="{{ route('admin.allMovies') }}"
     data-movies-create-url="{{ route('admin.moviesPage') }}">
  </div>

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
@endsection