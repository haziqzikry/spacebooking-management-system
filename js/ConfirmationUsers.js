 function successFunction() {
    if (confirm("Are you user you want to register this user?")) {
    } else {
        alert("You pressed Cancel!");
    }
}

function resetFunction() {
    alert("User details has been reset!");
  }

function updateUser() {
  if (confirm("Are you user you want to update the user details?")) {
    alert("User details has been updated!");
} else {
    alert("You pressed Cancel!");
}
}

function deleteUser() {
    if (confirm("Are you user you want to delete this user?")) {
      alert("User details has been deleted!");
  } else {
      alert("You pressed Cancel!");
  }
  }
  