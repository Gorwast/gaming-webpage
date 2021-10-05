$(".message a").click(function () {
  $("form").animate({ height: "toggle", opacity: "toggle" }, "fast");
});

/*
$("signup").click(function(){
  $.post("login.php",
  {
    signup: true,
  },
  function(data, status){
    alert("Data: " + data + "\nStatus: " + status);
  });
});

$.ajax({
  url: root + '/posts/1',
  method: 'GET'
}).then(function(data) {
  console.log(data);
 $("p").text(data.title)
});
*/

