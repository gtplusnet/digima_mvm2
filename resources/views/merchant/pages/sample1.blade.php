<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
html, body {
    height: 100%;
    padding: 0;
    margin: 0;
}
ul {
    padding:0;
    margin: 0;
    list-style: none;
}
#nav {
    position:fixed;
    top: 50%;
    right: 0;
    width: 120px;
}
#nav ul {
    width: 200px;
    background: grey;
    position:absolute;
    left:-9999em;
}
#nav a {
    display:block;
    padding:5px 10px;
}
#nav ul li {
    position:relative;
}
#nav li:hover > ul {
    left:-200px;
    top:0;
}
#nav li:hover > a {
    background:yellow;
    cursor:pointer
}
#button-one a {
    display: block;
    padding:5px 10px;
    background: tomato;
}
</style>
</head>

<body>
<ul id='nav'>
  <li id='button-one'><a>Sub menu title</a>
    <ul>
      <li><a>Link</a></li>
      <li><a>Submenu</a>
        <ul>
          <li><a href=''>Link 1</a></li>
          <li><a href=''>Link 2</a></li>
          <li><a href=''>Link 3</a></li>
          <li><a href=''>Link 4</a></li>
        </ul>
      </li>
    </ul>
  </li>
</ul>
</body>
</html>