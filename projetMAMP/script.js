/*
var textbox = document.getElementById("textbox");
var button = document.getElementById("sendMessage");
*/
var answerbox = document.getElementById("answerbox");
var formQ = document.forms["questionValue"]["question"];
var formId = document.getElementById('formtest');
var d = new Date();


formId.addEventListener("submit", function(){
    cookieTime()
    docformIdment.getElementById("myForm").submit();
    createResponse()
});
/*
button.addEventListener("click", function(){
    createResponse()
});
*/
function createResponse(){
    var marBtn = document.createElement("li");
     marBtn.classList.add("mar-btn");
     answerbox.appendChild(marBtn);

     var positionMessage = document.createElement("div");
     positionMessage.classList.add("media-body");
     positionMessage.classList.add("pad-hor");
     positionMessage.classList.add("speech-right");
     marBtn.appendChild(positionMessage);

     var messageBox = document.createElement("div");
     messageBox.classList.add("speech");
     positionMessage.appendChild(messageBox);

     var newMessage = document.createElement("p");
     newMessage.setAttribute('id','question')
     newMessage.innerHTML = document.cookie;
     messageBox.appendChild(newMessage);

     var timeBox = document.createElement("p");
     timeBox.classList.add("speech-time");
     messageBox.appendChild(timeBox);

     var timeIcon = document.createElement("i");
     timeIcon.classList.add("fa");
     timeIcon.classList.add("fa-clock-o");
     timeIcon.classList.add("fa-fw");
     timeBox.appendChild(timeIcon);

     var h = d.getHours();
     var min = d.getMinutes();
     var timeOfMessage = document.createTextNode(h+":"+min);
     timeBox.appendChild(timeOfMessage);

}

function cookieTime(){
    d.setTime(d.getTime() + (60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "data="+ formQ.value +";"+ expires;
}