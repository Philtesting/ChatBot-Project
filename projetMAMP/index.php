<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta charset="utf-8">
        <title>ChatBot</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
	<body>
        <div class="container">
            <div class="col-md-12 col-lg-6">
                <div class="panel">

                    <!--Widget body-->
                    <div id="demo-chat-body" class="collapse">
                        <div id = "scrolltop" class="nano has-scrollbar" style="height:380px">
                            <div class="nano-content pad-all" tabindex="0" style="right: -17px;">
                                <ul id = "answerbox" class="list-unstyled media-block">
                                    <li class="mar-btm">
                                        <div class="media-body pad-hor mar-btm">
                                            <div style="margin-bottom: 10px;">
                                                <div class="media-left">
                                                    <img src="bot.jpeg" class="img-circle img-sm" alt="Profile Picture">
                                                </div>
                                                <div class="speech">
                                                    <p>
                                                    Bonjour 😊 Je suis votre assistant virtuel prêt à vous aider dans le cadre de vos activités financières ?<br>
                                                    <br> 
                                                    Je vous invite à choisir une des fonctionnalités suivantes 👇
                                                    </p>
                                                </div>
                                            </div>
                                            <ul >
                                                <li id="convertir" class="btn btn-primary" style="margin-bottom: 10px">
                                                💸 Conversion d’argent 
                                                </li>
                                                <li class="btn btn-primary " style="margin-bottom: 10px;">
                                                ❓Eligibilité au prêt bancaire
                                                </li>
                                                <li class="btn btn-primary "  style="margin-bottom: 10px;">
                                                🏦 Quelle banque pour moi ? 
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                   </ul>
                            </div>
                            <div class="nano-pane">
                                <div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);">
                                </div>
                            </div>
                        </div>
            
                        <!--Widget footer-->
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-9">
                                    <input id ="textbox" onkeypress="pressEnter(event)" type="text" placeholder="Enter your text" class="form-control chat-input" name="question">
                                </div>
                                <div class="col-xs-3">
                                    <button id="sendMessage" name="test" class="btn btn-primary btn-block" type="submit" >Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Heading-->
                    <div class="panel-heading">
                        <div class="panel-control">
                            <div class="btn-group">
                                <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#demo-chat-body">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                            </div>
                        </div>
                        <h3 class="panel-title">Chat</h3>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="script.js"></script>
</html>

