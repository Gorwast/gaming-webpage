$(document).on("click", ".submit", function (event) {
  var to_user_id = $(this).attr("id");
  to_user_id = to_user_id.replace(/chatButton/g, "");
  sendMessage(to_user_id);
});

function updateUserList() {
  $.ajax({
    url: "chat_action.php",
    method: "POST",
    dataType: "json",
    data: { action: "update_user_list" },
    success: function (response) {
      var obj = response.profileHTML;
      Object.keys(obj).forEach(function (key) {
        // update user online/offline status
        if ($("#" + obj[key].userid).length) {
          if (
            obj[key].online == 1 &&
            !$("#status_" + obj[key].userid).hasClass("online")
          ) {
            $("#status_" + obj[key].userid).addClass("online");
          } else if (obj[key].online == 0) {
            $("#status_" + obj[key].userid).removeClass("online");
          }
        }
      });
    },
  });
}

function updateUserChat() {
  $("li.contact.active").each(function () {
    var to_user_id = $(this).attr("data-touserid");
    $.ajax({
      url: "chat_action.php",
      method: "POST",
      data: { to_user_id: to_user_id, action: "update_user_chat" },
      dataType: "json",
      success: function (response) {
        $("#conversation").html(response.conversation);
      },
    });
  });
}

function updateUnreadMessageCount() {
  $("li.contact").each(function () {
    if (!$(this).hasClass("active")) {
      var to_user_id = $(this).attr("data-touserid");
      $.ajax({
        url: "chat_action.php",
        method: "POST",
        data: { to_user_id: to_user_id, action: "update_unread_message" },
        dataType: "json",
        success: function (response) {
          if (response.count) {
            $("#unread_" + to_user_id).html(response.count);
          }
        },
      });
    }
  });
}

$(document).on("focus", ".message-input", function () {
  var is_type = "yes";
  $.ajax({
    url: "chat_action.php",
    method: "POST",
    data: { is_type: is_type, action: "update_typing_status" },
    success: function () {},
  });
});
