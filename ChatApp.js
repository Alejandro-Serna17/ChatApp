function updateMessage(name, password, content) {
 var xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange = function() {
 if (this.readyState == 4 && this.status == 200) {
     console.log(this.responseText);
     document.getElementById('error').value = this.responseText;
}
};
xmlhttp.open("GET", "AssignmentFive.php?type=write&name=" + name + "&password=" + password + "&content=" + content, true);
xmlhttp.send();
}
var interval = null;
function listenMessage(name) {
 if(name == '') return;
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
    console.log(this.responseText);
    document.getElementById('content2').value = this.responseText;
}
};
clearInterval(interval);
interval = setInterval(function () {
xmlhttp2.open("GET", "AssignmentFive.php?type=read&name=" + name, true);
xmlhttp2.send();
}, 500);
}
function getNames() {
 var xmlhttp3 = new XMLHttpRequest();
 xmlhttp3.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   console.log(this.responseText);
   document.getElementById('active').innerHTML = this.responseText;
}
};
xmlhttp3.open("GET", "AssignmentFive.php?type=name", true);
xmlhttp3.send();
}