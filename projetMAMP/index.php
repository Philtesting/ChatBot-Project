<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta charset="utf-8">
        <title>{% block title %}Welcome!{% endblock %}</title>
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
                    <!--Heading-->
                    <div class="panel-heading">
                        <div class="panel-control">
                            <div class="btn-group">
                                <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#demo-chat-body"><i class="fa fa-chevron-down"></i></button>
                            </div>
                        </div>
                        <h3 class="panel-title">Chat</h3>
                    </div>
            
                    <!--Widget body-->
                    <div id="demo-chat-body" class="collapse in">
                        <div class="nano has-scrollbar" style="height:380px">
                            <div class="nano-content pad-all" tabindex="0" style="right: -17px;">
                                <ul id = "answerbox" class="list-unstyled media-block">
                                    <li class="mar-btm">
    
                                        <div class="media-body pad-hor">
                                            <div class="speech">
                                                <p>Bonjours je suis le chatbot, comment vous aidez?</p>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div></div>
            
                        <!--Widget footer-->
                        <div class="panel-footer">
                            <div class="row">
                                <form id="formtest" name = "questionValue">
                                    <div class="col-xs-9">
                                        <input id ="textbox" type="text" placeholder="Enter your text" class="form-control chat-input" name="question">
                                    </div>
                                    <div class="col-xs-3">
                                        <button id="sendMessage" name="test" class="btn btn-primary btn-block" type="submit" >Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // define variables and set to empty values
        
        if (isset($_POST["test"])) {
            $question = $_POST["question"];
            $ok = "ok";
            echo $question;
          }
        
        
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        ?>
    </body>
    <script src="script.js"></script>
</html>

