/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

var textbox = document.getElementById("textbox");
var button = document.getElementById("sendMessage");
var answerbox = document.getElementById("answerbox");
var d = new Date();

button.addEventListener("click", function(){
    if(textbox.value.length === 0 || !textbox.value.trim()){
        return
    }
    createResponse()
    sendToAPI()
    textbox.value = "";
});

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
     newMessage.innerHTML = textbox.value;
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

function sendToAPI(message){
    d.setTime(d.getTime() + (1*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "data="+ textbox.value +";"+ expires;
    console.log(expires)
}