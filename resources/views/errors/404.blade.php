<!DOCTYPE html>
<html>
    <head>
        <title>SaveMyRecipe | 404 - Page not found</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100,300" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 300;
                font-family: 'Lato';
            }

            a {
                font-weight: 300;
                text-decoration: underline;
                color: #8e57bf;
                font-size: 150%;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 122px;
                margin-bottom: 40px;
                font-weight: 100;
            }
            .subtitle {
                font-size: 22px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Ooops!</div>
                <div class="subtitle">The page your are searching for wasn't found.</div>
                <p><a href="{{ url('') }}">Go to Homepage</a></p>
            </div>
        </div>
    </body>
</html>
