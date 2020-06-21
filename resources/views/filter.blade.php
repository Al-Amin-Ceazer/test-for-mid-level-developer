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
    <pre>

    const filter = (arr, predicate) => {
      const results = [];
      for (const a of arr) {
        if (predicate(a)) {
          results.push(a);
        }
      }
      return results;
    }

    </pre>

    <p>predicate is a function to check if a meets some condition.</p>

    <pre>
        const arr = filter([1, 2, 3], a => a % 2 === 0);
    </pre>
</div>
</body>
</html>
