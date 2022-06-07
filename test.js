var foo;
var bar;
var count = 0;

function initSession(){

    loadJSON("foo.js", "foo");
    loadJSON("bar.js", "bar");   

}

function loadJSON(url, name){

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){

        if(xhr.readyState == 4 && xhr.status == 200){  
            count++;
            window[name] = JSON.parse(xhr.responseText);;

            if (count == 2){
                success();
            } 
        }
    }

    xhr.open("GET", url, true);
    xhr.send();
}



$(document).ready(function(){
    initSession();
});



function success(){ 
    $("body").append(foo[0].option + "<br>" + bar[0].fname + " " + bar[0].lname);  
}


function getSource(callback) {
    var response, xmlhttp;

    xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState === 4 && xmlhttp.status === 200 && callback) callback(xmlhttp.responseText);
    }

    xmlhttp.open("GET", "http://www.google.com", true);
    xmlhttp.send();
}

function test()
{   var a;
    setTimeout(function () { a = 1; }, 100000000000000000); //high number for example only
    return a; // undefined, the function has completed, but the setTimeout has not run yet
    a = 1; // it's like doing this after return, has no effect
}