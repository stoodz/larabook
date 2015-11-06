<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container">
  <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">Larabook</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{ route('statuses_path') }}">My Statuses<span class="sr-only">(current)</span></a></li>
              <li><a href="{{ route('users_path') }}">Users</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
            @if($currentUser)
              <li class="dropdown">


                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar() }}" alt="{{ $currentUser->username }}">

                    {{ $currentUser->username }} <span class="caret"></span></a>

                <ul class="dropdown-menu">
                  <li>{{ link_to_route('profile_path', "Your Profile", $currentUser->username) }}</li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/logout">Logout</a></li>
                </ul>
              </li>
            </ul>
            @else
                <li>{{ link_to_route('register_path', 'Register') }}</li>
                <li>{{ link_to_route('login_path', 'Login') }}</li>
            @endif
  </div>
</nav>