/* admin-nav.js — inject sidebar HTML */
function getAdminSidebar(active) {
  const links = {
    dashboard: 'admin-dashboard.html',
    'movies/index': 'admin-movies-index.html',
    'movies/create': 'admin-movies-create.html',
    'actors/index': 'admin-actors-index.html',
    'actors/create': 'admin-actors-create.html',
    'genres/index': 'admin-genres-index.html',
    'genres/create': 'admin-genres-create.html',
  };

  function link(label, href, icon, key) {
    const a = key === active ? 'active' : '';
    return `<a href="${href}" class="sidebar-link ${a}">${icon}<span>${label}</span></a>`;
  }

  const html = `
  <aside class="admin-sidebar">
    <div class="sidebar-logo">Cine<span>Log</span> <small style="font-family:var(--font-body);font-size:.65rem;color:var(--text-dim);font-style:normal;margin-left:.2rem">Admin</small></div>

    <div class="sidebar-group">
      ${link('Dashboard', 'admin-dashboard.html', svg('grid'), 'dashboard')}
    </div>

    <div class="sidebar-group">
      <span class="sidebar-group-label">Movies</span>
      ${link('All Movies', 'admin-movies-index.html', svg('film'), 'movies/index')}
      ${link('Add Movie', 'admin-movies-create.html', svg('plus'), 'movies/create')}
    </div>

    <div class="sidebar-group">
      <span class="sidebar-group-label">Actors</span>
      ${link('All Actors', 'admin-actors-index.html', svg('users'), 'actors/index')}
      ${link('Add Actor', 'admin-actors-create.html', svg('plus'), 'actors/create')}
    </div>

    <div class="sidebar-group">
      <span class="sidebar-group-label">Genres</span>
      ${link('All Genres', 'admin-genres-index.html', svg('tag'), 'genres/index')}
      ${link('Add Genre', 'admin-genres-create.html', svg('plus'), 'genres/create')}
    </div>

    <div class="sidebar-footer">
      <div class="avatar">A</div>
      <div class="sf-text">
        <strong>Admin</strong>
        <span>Super Admin</span>
      </div>
    </div>
  </aside>`;

  return html;
}

function svg(name) {
  const icons = {
    grid: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>`,
    film: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="17" x2="22" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/></svg>`,
    users: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>`,
    tag: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>`,
    plus: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>`,
  };
  return icons[name] || '';
}

document.addEventListener('DOMContentLoaded', () => {
  const placeholder = document.getElementById('admin-sidebar-placeholder');
  if (placeholder) {
    const active = placeholder.dataset.active || '';
    placeholder.outerHTML = getAdminSidebar(active);
  }
});
