try {
  if (session.username) {
    $("#comment_field").prop('disabled', false)
    $("#send_comment_bt").prop('disabled', false)
    $("#user_id").prop('value', session.userid)
    $("#user_id2").prop('value', session.userid)
    $('#form>div>span').prop('innerHTML', '')
    $("#set_favorite_bt").show()
  }

  const post_id = $("#post_id").val()

  console.log(session.userid, post_id)

  teste(session.userid, post_id)
    .then(data => {
      console.log(data)
      if (data.is_fav) {
        $('#icon_favorite').removeClass('bi-bookmark-plus')
        $('#icon_favorite').addClass('bi-bookmark-fill')
      }
    })

  $("#set_favorite_bt").on('click', () => {
    teste(session.userid, post_id)
      .then(data => {
        console.log(data)
        if (data.is_fav) {
          console.log('1')
          $('#icon_favorite').removeClass('bi-bookmark-fill')
          $('#icon_favorite').addClass('bi-bookmark-plus')
        } else {
          console.log('2')
          $('#icon_favorite').removeClass('bi-bookmark-plus')
          $('#icon_favorite').addClass('bi-bookmark-fill')
        }
        fetch(`https://${window.location.host}/actions/fav_create.php?user_id_fav=${session.userid}&post_id=${post_id}`)
          .then(a => a.json())
          .then(a => console.log(a))
      })


  })

} catch {

}

async function teste(user, post) {
  const a = await fetch(`
    https://${window.location.host}/actions/fav_verify.php?user_id_fav=${user}&post_id=${post}
  `)
  const json = await a.json()
  return json
}

