let session = {}
try {

  function logout() {
    window.sessionStorage.setItem("green_blog_session", "")
    window.location.replace(`http://${window.location.host}/`)
  }

  session = JSON.parse(window.sessionStorage.getItem("green_blog_session"))

  if (session.username) {
    $("#user_case").html(`
    <div id="new_post_case" ></div>
    <div id="user_info" class="dropdown">
      <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div id="user"  >
          <span class="bi bi-person-fill"></span>
        </div>
      </button>
      <ul class="dropdown-menu" id="user_menu">
        <li>
          <span class="bi bi-person-fill"></span>
          <span id="username"></span>
        </li>
        <li>
          <form method="post" action="/comments.php" >
            <input hidden name="user_id" value="${session.userid}"/>
            <button class="dropdown-item">
              Meus Comentários
              <span class="bi bi-chat-left-dots"></span>
            </button>
          </form>
          <form method="get" action="/" >
            <input hidden name="user_id" value="${session.userid}"/>
            <button class="dropdown-item">
              Posts Salvos
              <span class="bi bi-bookmark"></span>
            </button>
          </form>
          
        </li>
        <li>
          <hr/>
        </li>
        <li>
          <button class="dropdown-item" onclick="logout()" >
            Sair 
            <span id="logout_icon" class="bi bi-box-arrow-in-right"></span>
          </button>
        </li>
      </ul>
    </div>
  `)

    console.log()

    if (session.isAdmin && window.location.pathname.match('create_post') === null) {
      $('#new_post_case').html(`
      <a href="/create_post.php">
        <button id="new_post">
          <span>Criar</span>
          <span id="add_icon" class="bi bi-plus-circle"></span>
        </button>
      </a>
    `)
    }
    $('#username').html(session.username)
  }

} catch {

}
