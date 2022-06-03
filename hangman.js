
//do zmiennych poniżej powinny zostać wrzucone słowa z bazy

var xhr = new XMLHttpRequest ();
xhr.open("POST", "getword.php");
xhr.onload = function() {
    var jsvar = this.response;
}
xhr.send();

var bar = new XMLHttpRequest ();
bar.open("POST", "password.php");
bar.onload = function() {
    var jsvar = this.response;
}
bar.send();

var password = "Le Coffre";
var translation = "Skrzynia";

function pdmiana()
{
    password = jsvar

    translation = jsvar
}

var mistake_count = 0;

password = password.toUpperCase();
translation = translation.toUpperCase();

var password_length = password.length;
var hiddenpassword = "";

for (i=0; i<password_length; i++)
{
    if(password.charAt(i) == " ") hiddenpassword += " ";
    else hiddenpassword += "-";
}

function show_words()
{   
    document.getElementById("translation").innerText = translation;
    document.getElementById("password").innerText = hiddenpassword;
}

window.onload = start;

var polish_letters = new Array(35);

polish_letters[0] = "Q";
polish_letters[1] = "W";
polish_letters[2] = "E";
polish_letters[3] = "R";
polish_letters[4] = "T";
polish_letters[5] = "Y";
polish_letters[6] = "U";
polish_letters[7] = "I";
polish_letters[8] = "O";
polish_letters[9] = "P";
polish_letters[10] = "Ó";
polish_letters[11] = "Ź";
polish_letters[12] = "A";
polish_letters[13] = "S";
polish_letters[14] = "D";
polish_letters[15] = "F";
polish_letters[16] = "G";
polish_letters[17] = "H";
polish_letters[18] = "J";
polish_letters[19] = "K";
polish_letters[20] = "L";
polish_letters[21] = "Ł";
polish_letters[22] = "Ę";
polish_letters[23] = "Ą";
polish_letters[24] = "Z";
polish_letters[25] = "X";
polish_letters[26] = "C";
polish_letters[27] = "V";
polish_letters[28] = "B";
polish_letters[29] = "N";
polish_letters[30] = "M";
polish_letters[31] = "Ś";
polish_letters[32] = "Ń";
polish_letters[33] = "Ć";
polish_letters[34] = "Ż";

var french_letters = new Array(42);

french_letters[0] = "A";
french_letters[1] = "Z";
french_letters[2] = "E";
french_letters[3] = "R";
french_letters[4] = "T";
french_letters[5] = "Y";
french_letters[6] = "U";
french_letters[7] = "I";
french_letters[8] = "O";
french_letters[9] = "P";
french_letters[10] = "À";
french_letters[11] = "Â";
french_letters[12] = "Ç";
french_letters[13] = "Ô";
french_letters[14] = "Q";
french_letters[15] = "S";
french_letters[16] = "D";
french_letters[17] = "F";
french_letters[18] = "G";
french_letters[19] = "H";
french_letters[20] = "J";
french_letters[21] = "K";
french_letters[22] = "L";
french_letters[23] = "M";
french_letters[24] = "Î";
french_letters[25] = "Ï";
french_letters[26] = "Ÿ";
french_letters[27] = "Æ";
french_letters[28] = "W";
french_letters[29] = "X";
french_letters[30] = "C";
french_letters[31] = "V";
french_letters[32] = "B";
french_letters[33] = "N";
french_letters[34] = "É";
french_letters[35] = "È";
french_letters[36] = "Ê";
french_letters[37] = "Ë";
french_letters[38] = "Û";
french_letters[39] = "Ù";
french_letters[40] = "Ü";
french_letters[41] = "Œ";

function french_keyboard()
{
    var div_content ="";


    for (i=0; i<=41; i++)
    {
        var element = "letter" + i;

        div_content += '<div class="keyboard_button" onclick="check('+i+')" id="'+element+'">'+ french_letters[i] +'</div>';

        if (i==13 || i==27) div_content += '<div style="clear:both;"></div>';
        if (i==13) div_content += '<div class="keyboard_spacing_secound_row"></div>';
        if (i==27) div_content += '<div class="keyboard_spacing_third_row"></div>';
    }

    document.getElementById("keyboard").innerHTML = div_content;

    show_words();
}

function polish_keyboard()
{

    var div_content ="";


    for (i=0; i<=34; i++)
    {
        var element = "letter" + i;

        div_content += '<div class="keyboard_button" onclick="check('+i+')" id="'+element+'">'+ polish_letters[i] +'</div>';

        if (i==11 || i==23) div_content += '<div style="clear:both;"></div>';
        if (i==11) div_content += '<div class="keyboard_spacing_secound_row"></div>';
        if (i==23) div_content += '<div class="keyboard_spacing_third_row"></div>';
    }

    document.getElementById("keyboard").innerHTML = div_content;

    show_words();
}

function start()
{
    polish_keyboard();
    pdmiana();
}

String.prototype.setCharacter = function(position, character)
{
    if (position > this.length - 1) return this.toString();
    else 
    {
        return this.substr(0, position) + character + this.substr(position+1);
    }
}

function check(nr)
{
    var guessed = false;

    for(i=0; i<password_length; i++)
    {
        if (password.charAt(i) == polish_letters[nr])
        {
            hiddenpassword = hiddenpassword.setCharacter(i,polish_letters[nr])
            guessed = true;
        }
    }

    if (guessed == true)
    {
        var element = "letter" + nr;
        document.getElementById(element).className="keyboard_button guessed";
        document.getElementById(element).setAttribute("onclick",";");

        show_words();
    }
    else
    {
        var element = "letter" + nr;
        document.getElementById(element).className="keyboard_button not_guessed";

        mistake_count++;

        var image_number = "Gallows/s" + mistake_count + ".png";
        document.getElementById("gallows_image").innerHTML = '<img src="'+image_number+'" alt="" />';
        document.getElementById(element).setAttribute("onclick",";");
    }
    
    //Win
    if (password == hiddenpassword)
    {
        document.getElementById("board").innerHTML = "Tak jest! Podano prawidłowe hasło: "+password+'<br /><br /><span class="reset" onclick="location.reload()">JESZCZE RAZ?</span>';
        for(i=0; i<=34; i++)
        {
            var element = "letter" + i;
            document.getElementById(element).className="keyboard_button win";
            document.getElementById(element).setAttribute("onclick",";");
        }
    }

    //Loss
    if (mistake_count>=9)
    {
	    document.getElementById("board").innerHTML  = "Przegrana! Prawidłowe hasło: "+password+'<br /><br /><span class="reset" onclick="location.reload()">JESZCZE RAZ?</span>';
        for(i=0; i<=34; i++)
        {
            var element = "letter" + i;
            document.getElementById(element).className="keyboard_button loss";
            document.getElementById(element).setAttribute("onclick",";");
        }
    }
}

