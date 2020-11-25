const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

let authenticated = document.getElementById('authenticated').value;

let inactivityTime = function () {
  let time;
  window.onload = resetTimer;
  document.onmousemove = resetTimer;
  document.onkeypress = resetTimer;
  function logout() {
    LogoutFunction()
  }
  function resetTimer() {
    clearTimeout(time);
    time = setTimeout(logout, 600000)
  }
};
if(authenticated == 1){
    console.log('Auto logout in operation');
    inactivityTime();
}
else{
    console.log("false");
}

function LogoutFunction() {
    fetch("http://127.0.0.1:8000/logout", {
    headers:{
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-Token": csrfToken 
    },
        credentials: "same-origin",
        method: 'POST'
    });
    alert("you were automatically logged out");
location.reload();
}


if ($(".alert-success")) {
  $(".alert-success").delay(4000).slideUp(200, function() {
      $(this).alert('close');
  });
}
if ($(".alert-danger")) {
  $(".alert-danger").delay(4000).slideUp(200, function() {
      $(this).alert('close');
  });
}