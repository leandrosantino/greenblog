try {
  const session = JSON.parse(window.sessionStorage.getItem("green_blog_session"))
  $("#user_id").prop('value', session.userid)

  if (!session.isAdmin) {
    window.location.replace(`http://${window.location.host}/`)
  }

} catch {
  window.location.replace(`http://${window.location.host}/`)
}

