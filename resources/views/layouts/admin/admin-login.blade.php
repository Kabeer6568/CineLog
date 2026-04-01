
@extends('layouts.user.user')

@section('content')
<div class="layout-user">
  

  <main class="admin-main">
    <div class="page-header fu">
      <div>
        <p class="ph-eyebrow">Are you admin?</p>
        <h1>Admin login</h1>
      </div>
      <div class="ph-actions">
        <a href="admin-genres-index.html" class="btn btn-ghost">← Back</a>
      </div>
    </div>

    <div class="form-layout-login fu fu1">
      <form style="width: 33%" method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="card">
          <div class="card-body">
            <div class="section-title">Login To Dashboard</div>
            <div class="form-grid">
              
              <div class="form-group">
                  <label> Name *</label>
                  <input type="text" name="login" placeholder="e.g. Neo-Noir" id="genre-name-input" oninput="updatePreview()">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" placeholder="auto-generated" name="password" id="slug-input" style="color:var(--text-dim)">
                </div>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:.75rem;justify-content:flex-end;margin-top:1.5rem">
          <a href="admin-genres-index.html" class="btn btn-ghost">Cancel</a>
          <button type="submit" class="btn btn-primary" onclick="toast('Genre created!','success'); setTimeout(() => location.href='admin-genres-index.html',1200)">Login</button>
        </div>
</form>

      
    </div>
  </main>
</div>
<div id="toasts"></div>


@endsection