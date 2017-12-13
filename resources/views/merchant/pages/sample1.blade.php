<!DOCTYPE html>
<html ng-app="app">

  <head>
    <script src="http://code.angularjs.org/1.3.4/angular.js"></script>
    <script src="https://cdn.rawgit.com/angular-translate/bower-angular-translate/2.5.2/angular-translate.js"></script>
    <script src="script.js"></script>
  </head>

  <body ng-controller="AppController as app">
    <h1 translate>hello</h1>
    <button ng-click="app.useLang('de')">DE</button>
    <button ng-click="app.useLang('en')">EN</button>
    <input placeholder="Regular Placeholder" translate translate-attr-placeholder="text" translate-value-browser="{{app.browser}}">
  </body>

</html>