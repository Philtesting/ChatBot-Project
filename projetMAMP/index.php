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
    <div class="container chatPos">
        <div class="col-xs-12 .col-sm-12 col-md-8 col-lg-9" style="float: right;">
            <div class="panel">

                <!--Widget body-->
                <div id="demo-chat-body" class="collapse">
                    <div id="scrolltop" class="nano " style="height:380px">
                        <div class="nano-content pad-all" tabindex="0">
                            <ul id="answerbox" class="list-unstyled media-block">
                                <li class="mar-btm">
                                    <div class="media-body pad-hor mar-btm">
                                        <div style="margin-bottom: 10px;">
                                            <div class="media-left">
                                                <img src="bot.png" class="img-circle img-sm" alt="Profile Picture">
                                            </div>
                                            <div class="speech">
                                                <p>
                                                    Bonjour 😊 Je suis votre assistant virtuel prêt à vous aider dans le cadre de vos activités financières ?<br>
                                                    <br>
                                                    Je vous invite à choisir une des fonctionnalités suivantes 👇
                                                </p>
                                            </div>
                                        </div>
                                        <ul>
                                            <li id="convertir" class="btn btn-primary" style="margin-bottom: 10px">
                                                💸 Conversion d’argent
                                            </li>
                                            <li id="pret"class="btn btn-primary " style="margin-bottom: 10px;">
                                                ❓Eligibilité au prêt bancaire
                                            </li>
                                            <li id="banqMoi" class="btn btn-primary " style="margin-bottom: 10px;">
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
                            <div class="col-xs-8">
                                <input id="textbox" onkeypress="pressEnter(event)" type="text" placeholder="Enter your text" class="form-control chat-input" name="question">
                            </div>
                            <div class="col-xs-4">
                                <button id="sendMessage" name="test" class="btn btn-primary btn-block" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Heading-->
                <div class="panel-control">
                    <div class="sticky-top">
                        <img src="bot.png" class="img-circle" style="width: 90px; height: 90px;" data-toggle="collapse" data-target="#demo-chat-body" alt="Profile Picture">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>

</html>