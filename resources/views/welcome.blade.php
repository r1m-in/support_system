<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R1M</title>
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
            background-color: #000;
        }

        #main {
            position: relative;
            height: 100vh;
        }

        #main .main {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .main {
            max-width: 520px;
            width: 100%;
            line-height: 1.4;
            text-align: center;
        }

        .main .main-one {
            position: relative;
            height: 240px;
        }

        .main .main-one h1 {
            font-family: 'Montserrat', sans-serif;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 252px;
            font-weight: 900;
            margin: 0px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: -40px;
            margin-left: -20px;
        }

        .main .main-one h1>span {
            text-shadow: -8px 0px 0px #000;
        }

        .main .main-one h3 {
            font-family: 'Cabin', sans-serif;
            position: relative;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
            margin: 0px;
            letter-spacing: 3px;
            padding-left: 6px;
        }

        .main h2 {
            font-family: 'Cabin', sans-serif;
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
            color: #fff;
            margin-top: 0px;
            margin-bottom: 25px;
        }

        @media only screen and (max-width: 767px) {
            .main .main-one {
                height: 200px;
            }

            .main .main-one h1 {
                font-size: 200px;
            }
        }

        @media only screen and (max-width: 480px) {
            .main .main-one {
                height: 162px;
            }

            .main .main-one h1 {
                font-size: 162px;
                height: 150px;
                line-height: 162px;
            }

            .main h2 {
                font-size: 16px;
            }
        }
    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="main">
        <div class="main">
            <div class="main-one">
                <h1><span>P</span><span>I</span><span>K</span><span>B</span><span>I</span><span>K</span><span>E</span>
                </h1>
            </div>
        </div>
    </div>
</body>

</html>
