<?php
require_once("../phplib/util.php");

$clientOptions = array(
  'sync' => array('Sincronizare cu DEX online', 'Acest client se poate conecta periodic la DEX online pentru a-și transfera definițiile nou adăugate.'),
  'vision' => array('Interfață pentru nevăzători', 'Acest client are o interfață prietenoasă pentru nevăzători.'),
  'regexp' => array('Expresii regulate, wildcards', 'Acest client acceptă căutări cu expresii regulate și/sau wildcards, cum ar fi «echi*» pentru echilibru, echinocțiu etc.'),
  'suggest' => array('Sugestii', 'Acest client oferă cele mai apropiate rezultate atunci când cuvântul căutat nu este găsit exact.'),
  'diacritics' => array('Cu / fără diacritice', 'Acest client oferă opțiuni pentru tastarea căutărilor cu sau fără diacritice.'),
  'full' => array('Căutare full-text', 'Acest client poate căuta nu doar cuvintele-titlu, ci și întreg textul definițiilor.'),
  'flex' => array('Căutare forme flexionare', 'Acest client poate căuta declinări și conjugări ale cuvintelor, cum ar fi «meargă» în loc de «merge».'),
  'click' => array('Clic pe cuvânt', 'Când dați clic pe un cuvânt dintr-o definiție, acest client navighează la definiția acelui cuvânt.'),
  'history' => array('Istoria căutărilor', 'Acest client ține minte ultimele cuvinte căutate și poate naviga între ele.'),
);

$clients = array(
  array('name' => array('Maestro DEX', 'http://maestrodex.ro/'),
        'available' => true,
        'urls' => array(),
        'os' => array('linux', 'windows'),
        'space' => '490 MB',
        'requires' => 'Perl, wxWidgets (numai sub Linux)',
        'authors' => array('Octavian Râșniță' => ''),
        'license' => 'GPL',
        'options' => array('vision' => 1, 'sync' => 1, 'regexp' => 1, 'suggest' => 1, 'diacritics' => 1, 'full' => 1, 'flex' => 1, 'click' => 1, 'history' => 1)),

  array('name' => array('PyDEX', 'http://pydex.lemonsoftware.eu/'),
        'available' => true,
        'urls' => array(),
        'os' => array('linux', 'mac', 'windows'),
        'space' => '250 MB',
        'requires' => 'wxPython',
        'authors' => array('Cristian Năvălici' => ''),
        'license' => 'GPLv3',
        'options' => array('vision' => 0, 'sync' => 1, 'regexp' => 0, 'suggest' => 0, 'diacritics' => 1, 'full' => 1, 'flex' => 1, 'click' => 0, 'history' => 1)),

  array('name' => array('JaDEX', 'http://www.federicomestrone.com/jadex/'),
        'available' => false,
        'urls' => array(),
        'os' => array('java', 'linux', 'mac', 'windows'),
        'space' => '250 MB',
        'requires' => 'Java',
        'authors' => array('Federico Mestrone' => ''),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 1, 'regexp' => 1, 'suggest' => 0, 'diacritics' => 1, 'full' => 0, 'flex' => 0, 'click' => 0, 'history' => 1)),

  array('name' => array('Dixit', 'http://dixit.sourceforge.net/'),
        'available' => true,
        'urls' => array(),
        'os' => array('linux', 'windows'),
        'space' => '48 MB',
        'requires' => 'QT, g++ (numai sub Linux)',
        'authors' => array('Octavian Procopiuc' => ''),
        'license' => 'GPL',
        'options' => array('vision' => 0, 'sync' => 1, 'regexp' => 1, 'suggest' => 1, 'diacritics' => 0, 'full' => 0, 'flex' => 0, 'click' => 0, 'history' => 1)),

  array('name' => array('DEX pentru Android', 'http://dex.adrianvintu.com/'),
        'available' => true,
        'urls' => array('Google Play' => 'https://play.google.com/store/search?q=pub:%22Adrian+Vintu%22'),
        'os' => array('android'),
        'space' => '3 MB',
        'requires' => '',
        'authors' => array('Adrian Vîntu' => 'http://adrianvintu.com'),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 0, 'regexp' => 1, 'suggest' => 1, 'diacritics' => 0, 'full' => 0, 'flex' => 1, 'click' => 1, 'history' => 1)),

  array('name' => array('DEX pentru Windows Phone', 'http://dex-wp.adrianvintu.com/'),
        'available' => true,
        'urls' => array('App' => 'http://www.windowsphone.com/en-US/store/publishers?publisherId=Adrian+Vintu'),
        'os' => array('windowsPhone'),
        'space' => '1 MB',
        'requires' => '',
        'authors' => array('Adrian Vîntu' => 'http://adrianvintu.com'),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 0, 'regexp' => 1, 'suggest' => 0, 'diacritics' => 0, 'full' => 0, 'flex' => 1, 'click' => 0, 'history' => 1)),

  array('name' => array('DEX Offline', 'http://www.macuser.ro/dexoffline/'),
        'available' => false,
        'urls' => array(),
        'os' => array('mac'),
        'space' => '100 MB',
        'requires' => 'MAC OS X Leopard sau mai nou, Dictionary.app',
        'authors' => array('Cristian Băluță' => ''),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 0, 'regexp' => 0, 'suggest' => 1, 'diacritics' => 1, 'full' => 0, 'flex' => 0, 'click' => 1, 'history' => 0)),

  array('name' => array('iDEX', 'https://itunes.apple.com/md/app/idex/id333262100'),
        'available' => false,
        'urls' => array(),
        'os' => array('iphone'),
        'space' => '55 MB',
        'requires' => '',
        'authors' => array('Mobile Touch' => ''),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 1, 'regexp' => 0, 'suggest' => 1, 'diacritics' => 0, 'full' => 0, 'flex' => 0, 'click' => 0, 'history' => 1)),

  array('name' => array('iDEX for iPhone', 'http://www.federicomestrone.com/product-idex'),
        'available' => false,
        'urls' => array(),
        'os' => array('iphone'),
        'space' => '70 MB',
        'requires' => '',
        'authors' => array('Federico Mestrone' => ''),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 1, 'regexp' => 1, 'suggest' => 0, 'diacritics' => 1, 'full' => 0, 'flex' => 0, 'click' => 0, 'history' => 0)),

  array('name' => array('Dex Mobile', ''),
        'available' => false,
        'urls' => array('Google Play' => 'https://play.google.com/store/apps/details?id=com.mdc.mobiledex.v1'),
        'os' => array('android'),
        'space' => '1.5 MB',
        'requires' => '',
        'authors' => array('Cosmin Mihu' => ''),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 0, 'regexp' => 0, 'suggest' => 0, 'diacritics' => 1, 'full' => 0, 'flex' => 0, 'click' => 0, 'history' => 0)),

  array('name' => array('PocketDEX', 'http://pocketdex.aamedia.ro/'),
        'available' => false,
        'urls' => array(),
        'os' => array('windowsce'),
        'space' => '21 MB',
        'requires' => '',
        'authors' => array('Alexandru Mirea' => ''),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 0, 'regexp' => 0, 'suggest' => 0, 'diacritics' => 0, 'full' => 0, 'flex' => 0, 'click' => 0, 'history' => 1)),

  array('name' => array('DEXter', 'http://dapyx-soft.com/~bogdan/dexter.zip'),
        'available' => false,
        'urls' => array(),
        'os' => array('windows'),
        'space' => '10 MB',
        'requires' => '',
        'authors' => array('Bogdan' => ''),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 0, 'regexp' => 0, 'suggest' => 0, 'diacritics' => 0, 'full' => 0, 'flex' => 0, 'click' => 0, 'history' => 0)),

  array('name' => array('DEX Offline', 'http://dexoffline.sourceforge.net/'),
        'available' => false,
        'urls' => array(),
        'os' => array('windows'),
        'space' => '10 MB',
        'requires' => 'Microsoft .NET, Microsoft MDAC',
        'authors' => array('Gecko Pointdexter' => ''),
        'license' => 'Freeware',
        'options' => array('vision' => 0, 'sync' => 1, 'regexp' => 0, 'suggest' => 0, 'diacritics' => 0, 'full' => 0, 'flex' => 0, 'click' => 0, 'history' => 1)),
);

$osNames = array('android' => 'Android', 'iphone' => 'iPhone', 'java' => 'Java', 'linux' => 'GNU / Linux', 'mac' => 'Mac',
                 'windows' => 'Windows', 'windowsce' => 'Windows CE', 'windowsPhone' => 'Windows Phone');

SmartyWrap::assign('page_title', 'Unelte');
SmartyWrap::assign('clients', $clients);
SmartyWrap::assign('clientOptions', $clientOptions);
SmartyWrap::assign('osNames', $osNames);
SmartyWrap::addCss('jqueryui');
SmartyWrap::addJs('jqueryui');
SmartyWrap::display('unelte.ihtml');
?>
