
var textbox = document.getElementById("textbox");
var button = document.getElementById("sendMessage");
var answerbox = document.getElementById("answerbox");



var convertir = document.getElementById("convertir");
var banqMoi = document.getElementById("banqMoi");
var banqPret = document.getElementById("pret");

var calcBtn = document.getElementById("sendConv");

const CLIENT_TOKEN = 'ODFJVKZRIHQ63W7UHJYZFTQE3D3XXOOR'
const uri = 'https://api.wit.ai/message?q=';
const auth = 'Bearer ' + CLIENT_TOKEN;

function pressEnter(evt) {
    if(evt.keyCode == 13){
        updateChat()
    }
}

function sendCurrency(){
    var baseCurrencyInput = document.getElementById('currency-1');
    var secondCurrencyInput = document.getElementById('currency-2');
    var amountInput = document.getElementById('amount');
    
    var amount = amountInput.value;
    if(amount == '0' || amount.length === 0 || !amount.trim()){
        return
    }
    var before = baseCurrencyInput.value;
    var after = secondCurrencyInput.value;
    textbox.value= amount+" "+before+" en "+after
    updateChat()
}

convertir.addEventListener("click", function(){
    textbox.value="Convertir de la monnaie"
    updateChat()
});

banqPret.addEventListener("click", function(){
    textbox.value="Eligibilité au prêt bancaire"
    updateChat()
});

banqMoi.addEventListener("click", function(){
    textbox.value="Quelle banque pour moi ?"
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

    var d = new Date();
    var h = addZero(d.getHours());
    var min = addZero(d.getMinutes());
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
            chatBotResponse("Désolé je ne comprends pas ce que vous voulez dire par "+ data._text)
        }
        else{
            if (entities.intent[0].confidence < 0.5){
                chatBotResponse("Je ne me suis pas encore assez entrainé pour répondre à votre demande")
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
    console.log(entities)
    if(entities.intent[0].value == "exchange_money"){
        if (entities.hasOwnProperty('phrase_monnaie')){
            chatBotResponse("Poser votre question de cette forme:§§1€ en $§§Ou bien remplicer cela:")
            var marBtn = document.createElement("li");
            marBtn.classList.add("mar-btm");
            answerbox.appendChild(marBtn);
        
            var positionMessage = document.createElement("div");
            positionMessage.classList.add("media-body");
            positionMessage.classList.add("pad-hor");
            positionMessage.classList.add("greenBox");
            marBtn.appendChild(positionMessage);
        
            var catBox = document.createElement("div");
            catBox.classList.add("media-left");
            positionMessage.appendChild(catBox);

            var inputCurr = document.createElement("input");
            inputCurr.setAttribute('type','number')
            inputCurr.setAttribute('id','amount')
            catBox.appendChild(inputCurr)

            var selectCurrency1 = document.createElement("select");
            selectCurrency1.setAttribute('id','currency-1')
            catBox.appendChild(selectCurrency1)

            var option1EUR = document.createElement("option");
            option1EUR.innerHTML = "EUR"
            selectCurrency1.appendChild(option1EUR);
            var option1USD = document.createElement("option");
            option1USD.innerHTML = "USD"
            selectCurrency1.appendChild(option1USD);
            var option1GBP = document.createElement("option");
            option1GBP.innerHTML = "GBP"
            selectCurrency1.appendChild(option1GBP);

            var labelCvrt = document.createElement("label");
            labelCvrt.innerHTML = "==>"
            catBox.appendChild(labelCvrt);

            var selectCurrency2 = document.createElement("select");
            selectCurrency2.setAttribute('id','currency-2')
            catBox.appendChild(selectCurrency2)

            var option2EUR = document.createElement("option");
            option2EUR.innerHTML = "EUR"
            selectCurrency2.appendChild(option2EUR);
            var option2USD = document.createElement("option");
            option2USD.innerHTML = "USD"
            selectCurrency2.appendChild(option2USD);
            var option2GBP = document.createElement("option");
            option2GBP.innerHTML = "GBP"
            selectCurrency2.appendChild(option2GBP)

            var sendBtn = document.createElement("button");
            sendBtn.classList.add("btn")
            sendBtn.classList.add("btn-primary")
            sendBtn.classList.add("mb-2")
            sendBtn.innerHTML = "Envoyer";
            sendBtn.setAttribute('id','sendConv')
            sendBtn.setAttribute('onclick','sendCurrency()')
            catBox.appendChild(sendBtn);
        }
        else{
            var before = entities.amount_before[0].entities.amount_exchange[0].value;
            var after = entities.amount_exchange[0].value;
            var amount = entities.amount_before[0].entities.amount_number[0].value;
            amount.trim()
            convertCurrency(before,after,amount)
        }
    }
    if(entities.intent[0].value == "greeting"){
        chatBotResponse("Bonjour en quoi puis je vous aider?")

    }

}

function convertCurrency(before,after,amount){
    
    fetch("https://currency-converter5.p.rapidapi.com/currency/convert?format=json&from="+before+"&to="+after+"&amount="+amount, {
        "method": "GET",
        "headers": {
            "x-rapidapi-host": "currency-converter5.p.rapidapi.com",
            "x-rapidapi-key": "c3827751ecmshde9d57ab3e2ef66p13eaf6jsnbaddb15549a0"
        }
    })
    .then(res => res.json())
    .then(function(data) {
        console.log(data)
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
    imgBot.setAttribute('src','bot.png')
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
        if(msg.charAt(i) == "§"){
            newMessage.appendChild(document.createElement("br"))
        }
        else{
            newMessage.innerHTML += msg.charAt(i);
        } 
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

    var d = new Date();
    var h = addZero(d.getHours());
    var min = addZero(d.getMinutes());

    var timeOfMessage = document.createTextNode(h+":"+min);
    timeBox.appendChild(timeOfMessage);
}

function addZero(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}




