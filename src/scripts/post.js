
if(session.username){
  $("#comment_field").prop('disabled', false)
  $("#send_comment_bt").prop('disabled', false)
  $("#user_id").prop('value', session.userid)
  $('#form>div>span').prop('innerHTML', '')
}