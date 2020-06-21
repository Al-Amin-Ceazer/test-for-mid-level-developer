<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Itech Test</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            height: 100vh;
            margin: 0;
            padding: 10px;
        }
        table{
            margin-left: 45px;
        }

        td{
            border: 1px solid #eee;
            padding: 3px;
            text-align: center;
        }
        code{
            color: #007b00;
        }
        a{
            color: red;
        }
    </style>
</head>
<body>
    <div class="content">
        <table>
            <tr>
                <td>Buyer id</td>
                <td>Buyer Name</td>
                <td>Total Diary Taken</td>
                <td>Total Pen Taken</td>
                <td>Total Eraser Taken</td>
                <td>Total items Taken</td>
            </tr>

            <tr>
                <td>{{$buyer->id}}</td>
                <td>{{$buyer->name}}</td>
                <td>{{$buyer->total_diary}}</td>
                <td>{{$buyer->total_pen}}</td>
                <td>{{$buyer->total_eraser}}</td>
                <td>{{$buyer->total_item}}</td>
            </tr>

        </table>
    </div>
</body>
</html>
