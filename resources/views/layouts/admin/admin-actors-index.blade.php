
@extends('layouts.admin.admin')

@section('content')


  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">People</p>
        <h1>Actors</h1>
        <p>Manage all actors and performers in the database.</p>
      </div>
      <div class="ph-actions">
        <a href="admin-actors-create.html" class="btn btn-primary">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          Add Actor
        </a>
      </div>
    </div>

    <div class="filter-bar fu fu1">
      <input type="text" placeholder="Search by name…" id="search-input" style="max-width:260px">
      <select style="width:auto;min-width:150px;margin-left:auto">
        <option>Sort: A–Z</option>
        <option>Sort: Most Films</option>
        <option>Sort: Recently Added</option>
      </select>
    </div>

    <div class="table-wrap fu fu2">
      <table>
        <thead>
          <tr>
            <th style="width:36px"><input type="checkbox" id="select-all" onchange="updateBulk()"></th>
            <th class="td-avatar">Photo</th>
            <th>Name</th>
            <th>Nationality</th>
            <th>Born</th>
            <th>Films</th>
            <th style="width:100px">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($actors as $actor)
          <tr>
            <td><input type="checkbox" class="row-cb" onchange="updateBulk()"></td>
            <td><div class="actor-avatar-cell"><img src="{{ asset('storage/' . $actor->photo) }}" ></div></td>
            <td><span class="td-main">{{ $actor->first_name }}</span></td>
            <td>{{ $actor->nationality }}</td>
            <td>{{ $actor->dob }}</td>
            <td><span class="badge badge-gold">12</span></td>
            <td><div style="display:flex;gap:.4rem">
              <a href="admin-actors-edit.html" class="btn btn-ghost btn-sm btn-icon">✎</a>
              <button class="btn btn-ghost btn-sm btn-icon" onclick="confirmAction('Delete actor?', () => toast('Deleted','success'))">🗑</button>
            </div></td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>

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
  initSearch('#search-input', 'tbody tr', '.td-main');
  function updateBulk() {}
</script>
@endsection