<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
    <title>Google Translation</title>
</head>
<body>
	<form >
    <div id="google_translate_element" style="display: none">
    </div>
    
    <div class="container">
        <a href="http://twitcount.com/btn" class="twitcount-button" data-count="horizontal" data-size="" data-url="" data-text="" data-related="" data-hashtag="" data-via="iAmJames_35836">TwitCount Button</a><script type="text/javascript" src="https://static1.twitcount.com/js/button.js"></script>
    </div>
    
    <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        function translateLanguage(lang) {

            var $frame = $('.goog-te-menu-frame:first');
            if (!$frame.size()) {
                alert("Error: Could not find Google translate frame.");
                return false;
            }
            $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
            return false;
        }
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
        }
    </script>
    <ul>
        <li><a href="javascript:;" id="Croatia" onclick="translateLanguage(this.id);"><span>Spanish
        </span>
            <img src="img/flags/spain_flag.jpg" alt="" /></a> </li>
        <li><a href="javascript:;" id="English" onclick="translateLanguage(this.id);"><span>Russian
        </span>
            <img src="img/flags/russia_flag.jpg" alt="" /></a> </li>
    </ul>
    
    </form>
    <div>
    	 concluded that the most disputed articles on the English Wikipedia tended to be broader issues, while on other language Wikipedias the most disputed articles tended to be regional issues; this is due to the English language's status as a global concluded that the most disputed articles on the English Wikipedia tended to be broader issues, while on other language Wikipedias the most disputed articles tended to be regional issues; this is due to the English language's status as a global concluded that the most disputed articles on the English Wikipedia tended to be broader issues, while on other language Wikipedias the most disputed articles tended to be regional issues; this is due to the English language's status as a global
    </div>
</body>
</html>