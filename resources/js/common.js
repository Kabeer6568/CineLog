/* common.js — CineLog shared utilities */

// ── TOAST ──────────────────────────────────────────────
function toast(msg, type = 'info') {
  let c = document.getElementById('toasts');
  if (!c) { c = document.createElement('div'); c.id = 'toasts'; document.body.appendChild(c); }
  const t = document.createElement('div');
  t.className = `toast ${type}`;
  const icons = { info: '◆', success: '✓', error: '✕' };
  t.innerHTML = `<span>${icons[type] || icons.info}</span> ${msg}`;
  c.appendChild(t);
  setTimeout(() => { t.style.opacity = '0'; t.style.transition = 'opacity .3s'; setTimeout(() => t.remove(), 300); }, 3000);
}

// ── MODAL ──────────────────────────────────────────────
function openModal(id) {
  const m = document.getElementById(id);
  if (m) { m.classList.add('open'); document.body.style.overflow = 'hidden'; }
}
function closeModal(id) {
  const m = document.getElementById(id);
  if (m) { m.classList.remove('open'); document.body.style.overflow = ''; }
}
document.addEventListener('click', e => {
  if (e.target.classList.contains('modal-bg')) {
    e.target.classList.remove('open'); document.body.style.overflow = '';
  }
  if (e.target.closest('.modal-close')) {
    const bg = e.target.closest('.modal-bg');
    if (bg) { bg.classList.remove('open'); document.body.style.overflow = ''; }
  }
});
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    document.querySelectorAll('.modal-bg.open').forEach(m => {
      m.classList.remove('open'); document.body.style.overflow = '';
    });
  }
});

// ── CONFIRM DIALOG ─────────────────────────────────────
function confirmAction(msg, onConfirm) {
  const id = '_confirm_modal';
  let existing = document.getElementById(id);
  if (existing) existing.remove();
  const el = document.createElement('div');
  el.id = id;
  el.className = 'modal-bg open';
  el.innerHTML = `
    <div class="modal" style="max-width:360px">
      <div class="modal-hdr"><h3>Confirm</h3></div>
      <p style="color:var(--text-muted);font-size:.875rem;">${msg}</p>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" onclick="document.getElementById('${id}').remove(); document.body.style.overflow=''">Cancel</button>
        <button class="btn btn-danger btn-sm" id="${id}_ok">Delete</button>
      </div>
    </div>`;
  document.body.appendChild(el);
  document.body.style.overflow = 'hidden';
  document.getElementById(`${id}_ok`).onclick = () => {
    el.remove(); document.body.style.overflow = '';
    onConfirm();
  };
}

// ── CHIP FILTER ────────────────────────────────────────
function initChips(selector, onChange) {
  document.querySelectorAll(selector).forEach(chip => {
    chip.addEventListener('click', () => {
      chip.classList.toggle('active');
      if (onChange) onChange();
    });
  });
}

// ── SEARCH FILTER ──────────────────────────────────────
function initSearch(inputSel, rowSel, keySel) {
  const input = document.querySelector(inputSel);
  if (!input) return;
  input.addEventListener('input', () => {
    const q = input.value.toLowerCase();
    document.querySelectorAll(rowSel).forEach(row => {
      const text = keySel ? row.querySelector(keySel)?.textContent.toLowerCase() : row.textContent.toLowerCase();
      row.style.display = (!q || (text && text.includes(q))) ? '' : 'none';
    });
  });
}

// ── ACTIVE NAV ────────────────────────────────────────
(function highlightNav() {
  const path = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.sidebar-link, .user-nav a').forEach(a => {
    const href = a.getAttribute('href') || '';
    if (href && path.includes(href.replace('.html', ''))) a.classList.add('active');
  });
})();

// ── FAV TOGGLE ────────────────────────────────────────
function toggleFav(btn, movieId) {
  const active = btn.classList.toggle('fav-active');
  btn.textContent = active ? '♥' : '♡';
  btn.style.color = active ? 'var(--red)' : '';
  toast(active ? 'Added to favorites' : 'Removed from favorites', active ? 'success' : 'info');
}

// ── SELECT ALL ────────────────────────────────────────
function initSelectAll() {
  const all = document.getElementById('select-all');
  if (!all) return;
  all.addEventListener('change', () => {
    document.querySelectorAll('.row-cb').forEach(cb => cb.checked = all.checked);
  });
}
document.addEventListener('DOMContentLoaded', initSelectAll);
