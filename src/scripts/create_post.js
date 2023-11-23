try {

  if (!session.isAdmin) {
    window.location.replace(`http://${window.location.host}/`)
  }

} catch {
  window.location.replace(`http://${window.location.host}/`)
}
