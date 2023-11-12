const session = JSON.parse(window.sessionStorage.getItem("green_blog_session"))

function logout() {
  window.sessionStorage.setItem("green_blog_session", "")
  window.location.replace(`http://${window.location.host}/`)
}

if (session.username) {
  $("#user_case").html`
    <a href="/create_post.php">
      <button id="new_post">
        <span>Criar</span>
        <span id="add_icon" class="bi bi-plus-circle"></span>
      </button>
    </a>
    <div id="user_info" class="dropdown">
      <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div id="user"  >
          <span class="bi bi-person-fill"></span>
        </div>
      </button>
      <ul class="dropdown-menu">
        <li>
          <span id="username"></span>
        </li>
        <li>
          <button class="dropdown-item">
            meus posts 
            <span class="bi bi-postcard"></span>
          </button>
        </li>
        <li>
          <button class="dropdown-item">
            tema
            <span class="bi bi-moon-stars"></span>
          </button>
        </li>
        <li>
          <hr/>
        </li>
        <li>
          <button class="dropdown-item" onclick="logout()" >
            sair 
            <span id="logout_icon" class="bi bi-box-arrow-in-right"></span>
          </button>
        </li>
      </ul>
    </div>
  `
  $('#username').html(session.username)
}

