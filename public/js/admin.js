$(document).ready(function () {
  $(document).on("click", ".user", function () {
    $(".user").removeClass("active");
    $(this).addClass("active");
    var to_user_id = $(this).data("touserid");
    showUserData(to_user_id);
  });

  $("#cbtest-19").change(function () {
    var to_user_id = $(this).data("userid");
    console.log(to_user_id, this.checked);
    approveUser(to_user_id, this.checked);
    showUserData(to_user_id);
  });
});

function showUserData(to_user_id) {
  $.ajax({
    url: "/show_data",
    method: "POST",
    data: { to_user_id: to_user_id, action: "show_data" },
    dataType: "json",
    success: function (response) {
      $("input[name='username']").val(response.user.username);
      $("input[name='email']").val(response.user.email);
      $("input[name='role']").val(response.user.role);
      $("input[name='status_message']").val(response.user.status_message);
      $("#cbtest-19").data("userid", response.user.userid);
      response.user.allowed
        ? $("#cbtest-19").prop("checked", true)
        : $("#cbtest-19").prop("checked", false);
      console.log($("#cbtest-19").data("userid"));
      console.log(response.isAllowed);
      if (response.isAllowed) {
        $(".log-in").css("visibility", "visible");
        $(".checkbox-wrapper-19").show();
      } else {
        $(".log-in").css("visibility", "hidden");
        $(".checkbox-wrapper-19").hide();
      }
    },
  });
}

function approveUser(to_user_id, value) {
  $.ajax({
    url: "/approve_user",
    method: "POST",
    data: { to_user_id: to_user_id, value: value, action: "approve_user" },
    dataType: "json",
    success: function () {
      //   console.log(response.userid, response.value);
      console.log("USER APPROVED");
    },
  });
}
