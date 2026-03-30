<div id="toasts"></div>
<!-- <script src="../common.js"></script> -->
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
