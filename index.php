<?php
  $data = file_get_contents("data.json");
?>

<!doctype html>
<html lang="no">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Viralizr</title>
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <style>
    html,
    button { font-family: 'Comfortaa', cursive; }
    body { text-align: center; }
    h1 { margin-top: 4rem; }
    blockquote {
      padding: 2rem;
      margin: 3rem 0;
      font-size: 1.2rem;
      background: repeating-linear-gradient(45deg,#eaebee,#eaebee 20px,#eff0f3 0,#eff0f3 40px);
    }
    button {
      padding: 1rem 2rem;
      margin: 2rem;
      border: 0;
      background-color: gold;
      font-size: 1rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-radius: 4px;
      cursor: pointer;
    }
    .share {
      display: block;
    }
    small {
      display: block;
      margin-top: 20px;
    }
    code {
      padding: 10px;
      display: inline-block;
      background-color: #f9f9f9;
      margin: 15px;
      color: #5d5d5d;
    }
  </style>
</head>
<body>
  <header>
    <h1>🤘Viralizr🤘</h1>
    <h2>For those shit hot blog post titles that everyone will want to read!</h2>
  </header>
  <main>
    <blockquote>
      <span id="results">Click below to generate your title...</span>
    </blockquote>
    <button id="button" onClick="createTitle()">Make me famous!</button>
    <a class="share" id="share" href="https://twitter.com/intent/tweet?text=Generate viral blog posts with Viralizr: http://goo.gl/80Rk3v">Tweet this</a>
    <small>API available at <a href="api.php?amount=5">/api</a></small>
    <code>example: /api.php?amount=3</code>
  </main>
  <script>
    var resultsEl = document.getElementById('results');
    var shareEl = document.getElementById('share');
    var buttonEl = document.getElementById('button');

    createTitle = function(){
      var title = buildTitle();
      resultsEl.innerHTML = title;
      buttonEl.innerHTML = getRandomItem(buttonTexts);
      shareEl.href = 'https://twitter.com/intent/tweet?text="' + title + '" - Made with viralizr: http://goo.gl/80Rk3v';
    };

    buildTitle = function(){
      return getRandomItem(data.intro) + ' ' + getRandomItem(data.middle) + ' ' + getRandomItem(data.outro);
    }

    getRandomItem = function(arr){
      return arr[Math.floor(Math.random() * arr.length)];
    }

    var buttonTexts = ['Try again..', 'One more!', 'Another one!'];
    var data = JSON.parse(<?php print json_encode($data); ?>);
  </script>

  <!-- Analytics, because you know.. -->
  <script async="" src="//www.google-analytics.com/analytics.js"></script>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-71569627-1', 'auto');
      ga('send', 'pageview');
  </script>
</body>
</html>