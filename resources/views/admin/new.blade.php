<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .modalpop-body {background: brown;margin:30px;font-size:24px;}
    </style>
</head>
<body>
<form id="form1" runat="server">
    <div class="row modalpop-body">
        <div class="col-md-4 col-sm-4 col-xs-4">
            Start Position
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            Type of Scramble
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            Scrambling Required
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <textarea class="form-control" rows="3" id="comment"></textarea>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                </ul>
            </div>
        </div>
    </div>
</form>
</body>
</html>
