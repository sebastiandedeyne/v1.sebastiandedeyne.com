<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400" rel="stylesheet">
    <style>
      body {
        align-items: center;
        color: #353535;
        display: flex;
        justify-content: center;
        margin: 0;
        padding: 0;
      }

      header {
        font-family: 'IBM Plex Sans';
        line-height: 1.2;
        margin-left: 15vw;
        margin-right: 28vw;
      }

      h1 {
        font-size: 5vw;
        font-weight: normal;
        margin-bottom: 3vw;
        margin-top: 0;
      }

      span {
        color: #c74f4f;
        font-size: 2.5vw;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>{{ $post->title }}</h1>
      <span>Sebastian De Deyne</span>
    </header>
  </body>
</html>
