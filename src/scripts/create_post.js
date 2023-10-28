try{
  const session = JSON.parse(window.sessionStorage.getItem("green_blog_session"))
}catch{
  window.location.replace(`http://${window.location.host}/`)
}

  