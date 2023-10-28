const action = "/";

const emojiReplacements = {
  ":D": "&#128513;",
  ":'D": "&#128514;",
  ":\\)\\)": "&#128515;",
  "\\^\\^": "&#128516;",
  ":'\\)": "&#128517;",
  ">_<": "&#128518;",
  "O:\\)": "&#128519;",
  "3:\\)": "&#128520;",
  ";\\)": "&#128521;",
  ":P": "&#128523;",
  "\\^_\\^": "&#128525;",
  "B\\)": "&#128526;",
  ":/": "&#128527;",
  ":\\|": "&#128528;",
  "-_-": "&#128529;",
  ":\\(\\(": "&#128530;",
  "-_-'": "&#128531;",
  ":S": "&#128534;",
  ":\\*": "&#128536;",
  ":\\*\\*": "&#128538;",
  ":P": "&#128539;",
  ":PP": "&#128540;",
  ":\\(\\(": "#&128545;",
  ":'\\(": "&#128557;",
  ":clown:": "&#129313;",
  ":pinokio:": "&#129317;",
  ":crazy:": "&#129322;",
};

$(document).ready(function () {
  setInterval(function () {
    updateUserList();
    updateUnreadMessageCount();
  }, 5000);

  setInterval(function () {
    showTypingStatus();
    updateUserChat();
  }, 5000);

  $(".messages").animate(
    {
      scrollTop: $(document).height(),
    },
    "fast"
  );

  $(document).on("click", "#profile-img", function (event) {
    $("#status-options").toggleClass("active");
  });

  $(document).on("click", ".expand-button", function (event) {
    $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
  });

  $(document).on("click", "#status-options ul li", function (event) {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");
    if ($("#status-online").hasClass("active")) {
      $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
      $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
      $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
      $("#profile-img").addClass("offline");
    } else {
      $("#profile-img").removeClass();
    }
    $("#status-options").removeClass("active");
  });

  $(document).on("click", ".contact", function () {
    $(".contact").removeClass("active");
    $(this).addClass("active");
    var to_user_id = $(this).data("touserid");
    showUserChat(to_user_id);
    $(".chatMessage").attr("id", "chatMessage" + to_user_id);
    $(".chatButton").attr("id", "chatButton" + to_user_id);
  });

  $(document).on("click", ".submit", function (event) {
    var to_user_id = $(this).attr("id");
    to_user_id = to_user_id.replace(/chatButton/g, "");
    sendMessage(to_user_id);
  });

  $(".chatMessage").on("keypress", function (e) {
    if (e.which == 13) {
      $(".submit").click();
    }
  });

  $(document).on("focus", ".message-input", function () {
    var is_type = "yes";
    $.ajax({
      url: action,
      method: "POST",
      data: { is_type: is_type, action: "update_typing_status" },
      success: function () {},
    });
  });

  $(document).on("blur", ".message-input", function () {
    var is_type = "no";
    $.ajax({
      url: action,
      method: "POST",
      data: { is_type: is_type, action: "update_typing_status" },
      success: function () {},
    });
  });

  $(".search-users").on("input", function () {
    console.log("SEARCH EVENT");
    search_users($(this).val());
  });
});

function search_users(search) {
  $.ajax({
    url: "/search_contacts",
    method: "POST",
    data: {
      search,
      action: "search_contacts",
    },
    dataType: "json",
    success: function (response) {
      // var resp = $.parseJSON(response);
      $(".contact-list").html(response.search_result);
    },
  });
}

function updateUserList() {
  $.ajax({
    url: "/update_user_list",
    method: "POST",
    dataType: "json",
    data: { action: "update_user_list" },
    success: function (response) {
      var obj = response.profileHTML;
      console.log("UPdATE USER LIST ", response);
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

function sendMessage(to_user_id) {
  message = $(".message-input input").val();
  $(".message-input input").val("");
  if ($.trim(message) == "") {
    return false;
  }

  for (const key in emojiReplacements) {
    const regex = new RegExp(key, "g");
    message = message.replace(regex, emojiReplacements[key]);
  }

  $.ajax({
    url: "/send",
    method: "POST",
    data: {
      to_user_id: to_user_id,
      chat_message: message,
      action: "insert_chat",
    },
    dataType: "json",
    success: function (response) {
      var resp = $.parseJSON(response);
      $("#conversation").html(resp.conversation);
      $(".messages").animate({ scrollTop: $(".messages").height() }, "fast");
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function showUserChat(to_user_id) {
  $.ajax({
    url: "/show_chat",
    method: "POST",
    data: { to_user_id: to_user_id, action: "show_chat" },
    dataType: "json",
    success: function (response) {
      $("#userSection").html(response.userSection);
      $("#conversation").html(response.conversation);
      $("#unread_" + to_user_id).css("display", "none");
      console.log(response.userSection);
      console.log(response.conversation);
    },
    error: function (err) {
      console.log("show_chat err ", err);
    },
  });
}

function updateUserChat() {
  $("li.contact.active").each(function () {
    var to_user_id = $(this).attr("data-touserid");
    $.ajax({
      url: "/update_user_chat",
      method: "POST",
      data: { to_user_id: to_user_id, action: "update_user_chat" },
      dataType: "json",
      success: function (response) {
        $("#conversation").html(response.conversation);
        showUserChat(to_user_id);
        console.log("UPDATE USER CHAT");
      },
    });
  });
}

function updateUnreadMessageCount() {
  $("li.contact").each(function () {
    if (!$(this).hasClass("active")) {
      var to_user_id = $(this).attr("data-touserid");
      $.ajax({
        url: "/update_unread_message",
        method: "POST",
        data: { to_user_id: to_user_id, action: "update_unread_message" },
        dataType: "json",
        success: function (response) {
          if (response.count) {
            console.log("UNREAD: ", response.count);
            if (response.count > 0) {
              $("#unread_" + to_user_id).css("display", "inline");
              $("#unread_" + to_user_id).html(response.count);
            }
          }
        },
      });
    }
  });
}

function showTypingStatus() {
  $("li.contact.active").each(function () {
    var to_user_id = $(this).attr("data-touserid");
    $.ajax({
      url: action,
      method: "POST",
      data: { to_user_id: to_user_id, action: "show_typing_status" },
      dataType: "json",
      success: function (response) {
        $("#isTyping_" + to_user_id).html(response.message);
        console.log("IS TYPING radi");
      },
    });
  });
}
