try{
  const session = JSON.parse(window.sessionStorage.getItem("green_blog_session"))
  if(session.username){
    console.log(session)
    $("#user_id").prop('value', session.userid)
  }
}catch{
  window.location.replace(`http://${window.location.host}/`)
}

  