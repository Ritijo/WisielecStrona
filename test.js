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

    xhr.open("GET", test.php, true);
    xhr.send();
}



$(document).ready(function(){
    initSession();
});



function success(){ 
    $("body").append(foo[0].option + "<br>" + bar[0].fname + " " + bar[0].lname);  
}