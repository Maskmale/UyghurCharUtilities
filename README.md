# Extend Uyghur characters for unsupported mobile devices

===================


# ئىشلىتىش ئۇسۇلى

ھۈججەت مۇندەرىجىسى تۆۋەندىكىدەك:

```php
UyghurCharUtilities
     config
    	browsers.php
    	devices.php
    	systems.php
    composer.json
    ExtendUyghurCharacters.class.php
    README.md
    test
    	test.php
    	testExtendUyghurCharacters.php
    UyghurCharUtilities.class.php
    UyghurCharUtilities2.class.php
```


1. ئاۋال config ئىچىدىكى ئۈچ چۈججەتنىڭ ئىچىگە كىرىپ ئۇيغۇرچە خەت تونىمايدىغان تور كۆرگۈچ، تېلېفۇن، سىستېمېلارنى تەڭشەيمىز.
چوقۇم User Agent تىكى مۇناسىۋەتلىك ئۇچۇرنى موشۇ يەرگە array شەكلىدە كىرگۈزۈشكە توغرا كېلىدۇ.

بۇنىڭ ئىچىدە پروگرامما ئاۋال تور كۆرگۈچنى ئاندىن تېلېفۇننى ئەڭ ئاخىرىدا سيستېمىنى تەكشۈرەيدۇ. يەنى ئۇيغۇرچە قوللىمايدىغان تور كۆرۈگۈچ بوپ قالغان ئەھۋال ئاستىدا سىستېما ۋە تېلېفۇنلارنى تەكشۈرمەيدۇ.

```php
return array(
	'MQQBrowser'
);

return array(
	'Android 2.3',
	'Android 4.0.4',
);
```

2. تۆۋەندىكى ئىككى كىلاسنى include  قىلىپ ئەكىرىمىز.

```php
include"../UyghurCharUtilities.class.php";
include"../ExtendUyghurCharacters.class.php";
```

3. ExtendUyghurCharacters دېگەن كىلاسنى ئىشلىتىپ ئۇيغۇرچە خەتنى كېڭەيتىلگەن رايونغا ئايلاندۇرساق بولىدۇ.

```php
$extendInstance = ExtendUyghurCharacters::getInstance();
$extendedString = $extendInstance->getExtendedMessage($str);
```



ئىشلىتىش جەھەتتە مەسىلىگە يولۇققاندا info@otkur.biz ئارقىلىق ئالاقىلەشسىڭىز بولىدۇ.