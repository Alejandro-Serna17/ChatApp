function updateMessage(name, password, content){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('error').value = this.responseText;
        }
    };
    xmlhttp.open("GET", "ChatApp.php?type=write&name=" + name + "&password=" + password + "&content=" + content, true);
    xmlhttp.send();
}

var interval = null;
function listenMessage(name){
    if (name == '') return;
    clearInterval(interval);
    let isRequestInProgress = false;
    interval = setInterval(function () {
        if (isRequestInProgress) return;
        isRequestInProgress = true;
        var xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.getElementById('content2').value = this.responseText;
                isRequestInProgress = false;
            }
        };
        xmlhttp2.open("GET", "ChatApp.php?type=read&name=" + name + "&t=" + new Date().getTime(), true);
        xmlhttp2.send();
    }, 250);
}

function getNames() {
    var xmlhttp3 = new XMLHttpRequest();
    xmlhttp3.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('active').innerHTML = this.responseText;
        }
    };
    xmlhttp3.open("GET", "ChatApp.php?type=name", true);
    xmlhttp3.send();
}
