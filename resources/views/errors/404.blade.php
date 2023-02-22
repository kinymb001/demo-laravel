<!DOCTYPE html>
<html>
<head>
  <style>
    .error-message {
      text-align: center;
      font-size: 36px;
      color: #555;
      margin-top: 50px;
    }
    .error-code {
      font-size: 72px;
      color: #F44336;
    }
    .go-back-button {
      background-color: #F44336;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      text-align: center;
      cursor: pointer;
      display: inline-block;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="error-message">
    <div class="error-code">404</div>
    <p>Page Not Found</p>
  </div>
  <button class="go-back-button" onclick="window.history.back();">Go Back</button>
</body>
</html>
