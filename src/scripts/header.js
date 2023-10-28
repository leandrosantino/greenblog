const session = JSON.parse(window.sessionStorage.getItem("green_blog_session"))

function logout(){
  window.sessionStorage.setItem("green_blog_session", "")
  window.location.replace(`http://${window.location.host}/`)
}    

if(session.username){
  $("#user_case").html(`
    <div>
        <a href="/create_post.php">
          <button>
            Criar Post
          </button>
        </a>
        ${session.username}
        <button onclick="logout()" >Sair</button>
    </div>
  `)
}