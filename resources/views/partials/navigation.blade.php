<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">   
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">See, learn.</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left nav-search" role="search">
        <div class="input-group input-group-sm" style="min-width:300px;">
          <input type="text" class="form-control input-search" placeholder="Search" name="srch-term" id="srch-term">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
      @if (null !== ($user = auth()->user()))
        <li class="profile-list">
          <img src="{{ $user->avatar or '/img/avatar.png' }}" class="profile-image img-circle">
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ $user->name }}
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/user/{{ $user->id }}/edit">Profile</a></li>
            <li><a href="/logout">Sign Out</a></li>
          </ul>
        </li>
      @else
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register  </a></li>
      @endif
      </ul>
    </div>
  </div>
</nav>