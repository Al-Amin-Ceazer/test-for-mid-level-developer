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
    <pre class="">

    const map = (arr, fn) => {
      const results = [];
      for (const a of arr) {
        results.push(fn(a));
      }
      return results;
    }

    </pre>

    <p>In our function, we call <code>fn</code> on each entry of our array and push the results into a new array.</p>

    <pre>
        const arr = map([1, 2, 3], a => a ** 2);
    </pre>
</div>
</body>
</html>
