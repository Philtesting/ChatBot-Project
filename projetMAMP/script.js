
var textbox = document.getElementById("textbox");
var button = document.getElementById("sendMessage");
var answerbox = document.getElementById("answerbox");
var d = new Date();
var scroll = document.getElementById("scrolltop");

var convertir = document.getElementById("convertir");

const CLIENT_TOKEN = 'ODFJVKZRIHQ63W7UHJYZFTQE3D3XXOOR'
const uri = 'https://api.wit.ai/message?q=';
const auth = 'Bearer ' + CLIENT_TOKEN;

function pressEnter(evt) {
    if(evt.keyCode == 13){
        updateChat()
    }
}

convertir.addEventListener("click", function(){
    textbox.value="Convertir de la monnaie"
    updateChat()
});

button.addEventListener("click", function(){
    updateChat()
});

function updateChat(){
    var start = new Date().getTime();
    console.log(start)

    if(textbox.value.lenght === 0 || !textbox.value.trim()){
        textbox.value = '';
        return
    }
    clientQuestion(textbox.value)
    sendToApi(textbox.value)
    textbox.value = '';

    var end = new Date().getTime();
    console.log("cela a pris " + (end - start) + " milliseconds pour executer");
} 

function clientQuestion(msg){

    var marBtn = document.createElement("li");
     marBtn.classList.add("mar-btm");
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
     newMessage.innerHTML = msg;
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
    /*
    d.setTime(d.getTime() + (60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "data="+ formQ.value +";"+ expires;
    */
}

function sendToApi(msg){
    let q = encodeURIComponent(msg);
    fetch(uri+q, {
        headers: {
            Authorization: auth
        }
    })
    .then(res => res.json())
    
    .then(function(data) {
        let entities = data.entities
        if(Object.entries(entities).length === 0 && entities.constructor === Object){
            chatBotResponse("Désoler je ne comprend pas ce que vous voulez dire par "+ data._text)
        }
        else{
            if (entities.intent[0].confidence < 0.5){
                chatBotResponse("Je ne me suis pas encore assez entrainer pour repondre a votre demande ")
            }
            else{
                treatIntent(entities)
            }
        }
    })
    
    .catch(err => {
        console.log(err)
        chatBotResponse("Je ne suis pas sûre d'avoir bien compris. Pourriez-vous préciser votre demande?")
    });
    
}


function treatIntent(entities){
    if(entities.intent[0].value == "exchange_money"){
        if (entities.hasOwnProperty('phrase_monnaie')){
            chatBotResponse("Très bien donnez moi le montant de la somme d’argent que vous souhaitez convertir et en quelle devise ?")
        }
        else{
            var before = entities.amount_before[0].entities.amount_exchange[0].value;
            var after = entities.amount_exchange[0].value;
            var amount = entities.amount_before[0].entities.amount_number[0].value;
            amount.trim()
            fetch("https://currency-converter5.p.rapidapi.com/currency/convert?format=json&from="+before+"&to="+after+"&amount="+amount, {
                "method": "GET",
                "headers": {
                    "x-rapidapi-host": "currency-converter5.p.rapidapi.com",
                    "x-rapidapi-key": "c3827751ecmshde9d57ab3e2ef66p13eaf6jsnbaddb15549a0"
                }
            })
            .then(res => res.json())
            .then(function(data) {
                let exchange;
                for (const [key, value] of Object.entries(data.rates)) {
                    exchange = value.rate_for_amount
                }
                msg = amount+" "+before+" = "+exchange+" "+after
                chatBotResponse(msg)
            })
            .catch(err => {
                chatBotResponse("Indiquer moi la devise de entré et de sortis s'il vous plait")
            });
        }
    }

}


function chatBotResponse(msg){
    
    var marBtn = document.createElement("li");
    marBtn.classList.add("mar-btm");
    answerbox.appendChild(marBtn);

    var positionMessage = document.createElement("div");
    positionMessage.classList.add("media-body");
    positionMessage.classList.add("pad-hor");
    marBtn.appendChild(positionMessage);

    var catBox = document.createElement("div");
    catBox.classList.add("media-left");
    positionMessage.appendChild(catBox);

    var imgBot = document.createElement("img");
    imgBot.setAttribute('src','bot.jpeg')
    imgBot.classList.add("img-circle");
    imgBot.classList.add("img-sm");
    imgBot.setAttribute('alt','Profile Picture')
    catBox.appendChild(imgBot)

    var messageBox = document.createElement("div");
    messageBox.classList.add("speech");
    positionMessage.appendChild(messageBox);

    var newMessage = document.createElement("p");
    newMessage.setAttribute('id','question')
    let i = 0
    var typing = setInterval(function(){ 
        newMessage.innerHTML += msg.charAt(i);
        i++;
        if (i >= msg.length ) {
            clearInterval(typing)
        }
    }, 60)
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
