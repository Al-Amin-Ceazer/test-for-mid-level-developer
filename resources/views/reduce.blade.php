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

    const reduce = (arr, combine, start) => {
      let result = start;
      for (const a of arr) {
        result = combine(result, a);
      }
      return result;
    }

    </pre>

    <p>
        The code above, we have the reduce function to let us set the initial value.
        Then we loop through the array to call the combine function that’s passed in.
        And we set the combined result to result .
    </p>

    <pre>
        const result = reduce([1, 2, 3], (total, a) => total + a, 0);
    </pre>
</div>
</body>
</html>
