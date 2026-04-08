
@extends('layouts.admin.admin')

@section('content')



  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Catalog</p>
        <h1>Movies</h1>
        <p>Manage all films in the database.</p>
      </div>
      <div class="ph-actions">
        <a href="admin-movies-create.html" class="btn btn-primary">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          Add Movie
        </a>
      </div>
    </div>

    <!-- FILTER BAR -->
    <div class="filter-bar fu fu1">
      <input type="text" placeholder="Search by title…" id="search-input" style="max-width:260px">
      <div class="chips">
        <button class="chip active">All</button>
        <button class="chip">Published</button>
        <button class="chip">Draft</button>
      </div>
      <select style="width:auto;min-width:130px;margin-left:auto">
        <option>Year: All</option>
        <option>2024</option>
        <option>2023</option>
        <option>2022</option>
      </select>
      <select style="width:auto;min-width:150px">
        <option>Genre: All</option>
        <option>Drama</option>
        <option>Action</option>
        <option>Sci-Fi</option>
      </select>
    </div>

    <!-- BULK BAR -->
    <div class="bulk-bar" id="bulk-bar">
      <span id="bulk-count">0 selected</span>
      <button class="btn btn-danger btn-sm" onclick="toast('Deleted selected items','success')">Delete</button>
      <button class="btn btn-secondary btn-sm" onclick="clearBulk()">Cancel</button>
    </div>

    <!-- TABLE -->
    <div class="table-wrap fu fu2">
      <table>
        <thead>
          <tr>
            <th style="width:36px"><input type="checkbox" id="select-all" onchange="updateBulk()"></th>
            <th class="td-poster">Poster</th>
            <th>Title</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Status</th>
            <th style="width:100px">Actions</th>
          </tr>
        </thead>
        <tbody id="movies-tbody">

        @foreach($movies as $movie)
          <tr>
            <td><input type="checkbox" class="row-cb" onchange="updateBulk()"></td>
            <td><div class="poster-cell">
              <img src="{{ asset('storage/' . $movie->poster) }}" >
            </div></td>
            <td><span class="td-main">{{ $movie->title }}</span></td>
            <td>{{ $movie->release_year }}</td>
            <td><span class="badge badge-neutral">{{ $movie->genre }}</span></td>
            <td><span style="color:var(--accent)">★ {{ $movie->imdb_score }}</span></td>
            <td><span class="badge badge-{{ $movie->status === 'draft' ? 'red' : 'green'}}">{{ $movie->status }}</span></td>
            <td>
              <div style="display:flex;gap:.4rem">
                <a href="{{ route('admin.editMoviePage' , $movie->id) }}" class="btn btn-ghost btn-sm btn-icon" title="Edit">✎</a>
                <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete Oppenheimer?', () => toast('Deleted','success'))" title="Delete">🗑</button>
              </div>
            </td>
          </tr>
          @endforeach

          
          
        </tbody>
      </table>
    </div>

    <!-- PAGINATION -->
    <div class="pagination fu">
      <button class="pg-btn" disabled>←</button>
      <button class="pg-btn active">1</button>
      <button class="pg-btn">2</button>
      <button class="pg-btn">3</button>
      <button class="pg-btn">→</button>
    </div>
  </main>
</div>
<div id="toasts"></div>

<script>
  initChips('.chip');
  initSearch('#search-input', 'tbody tr', '.td-main');

  function updateBulk() {
    const checked = document.querySelectorAll('.row-cb:checked').length;
    const bar = document.getElementById('bulk-bar');
    bar.classList.toggle('visible', checked > 0);
    document.getElementById('bulk-count').textContent = `${checked} selected`;
  }
  function clearBulk() {
    document.querySelectorAll('.row-cb, #select-all').forEach(cb => cb.checked = false);
    document.getElementById('bulk-bar').classList.remove('visible');
  }
</script>
@endsection