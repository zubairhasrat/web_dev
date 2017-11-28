<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel='stylesheet' href='css/app.css'>
        
    </head>
    <body>
        <div id="app" class='container'>

            <h1>Chatroom</h1>
            <chat-log :messages='messages'></chat-log>
            <chat-composer v-on:messagesent="addMessage"></chat-composer>
        </div>
        <script src='js/app.js'></script>
    </body>
</html>
