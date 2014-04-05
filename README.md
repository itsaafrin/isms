Malaysian SMS Gateway API (Laravel 4 Package)
====
<strong>Introduction</strong>
<br/>
This is Laravel 4 Package that can be used to integrate Malaysian SMS gateway to your project. The following package is utilizing the SMS gateway service provided by ISMS (isms.com.my)


<strong>Installation</strong>
<br/>
In the require key of composer.json file add the following
<pre>"itsaafrin/isms": "dev-master"</pre>
Next run the composer update command to fetch and update the package into your project
<pre>composer update</pre>
In your config/app.php add 'Itsaafrin\Isms\IsmsServiceProvider' to the end of the $providers array
<pre>'providers' => array(

    'Illuminate\Foundation\Providers\ArtisanServiceProvider',
    'Illuminate\Auth\AuthServiceProvider',
    ...
    'Itsaafrin\Isms\IsmsServiceProvider',

),</pre>
At the end of config/app.php add 'ISMS' =&gt; 'Itsaafrin\Isms\IsmsFacade' to the $aliases array
<pre>'aliases' => array(

    'App'        => 'Illuminate\Support\Facades\App',
    'Artisan'    => 'Illuminate\Support\Facades\Artisan',
    ...
    'ISMS' => 'Itsaafrin\Isms\IsmsFacade',

),</pre>
Navigate to vendor/itsaafrin/isms/src/config/config.php and add your username and password of the isms.com.my account
<pre>'username' => 'your_username',
'password' => 'your_password',</pre>
<strong>Usage</strong>
<br/>
To send sms:
<pre>ISMS::SendSMS("destination no", "message to be sent", "sms type");</pre>
<ul>
	<li>The first parameter (destination_no) : The number where the message should be sent.</li>
	<li>The second parameter (message to be sent) : The content of the message.</li>
<li>The third parameter (sms type) : 1 for ASCII and 2 for UNICODE</li>
</ul>

To check balance:
<pre>
ISMS::CheckBalance();
</pre>
Both the function above will return http result and http code as an array. For sending message, empty response for http result indicates message sent successfully. 

<strong>Example</strong>
<br/>
Sending message:
<pre>
public function SendTestMsg(){
$result = ISMS::SendSMS("0123456789", "Hello World", "2");
dd($result);
}
</pre>

Checking Balance:
<pre>
public function CheckTestBalance(){
$result = ISMS::CheckBalance();
dd($result);
}
</pre>

<strong>Bugs & Errors</strong>
<br/>
Raise any bugs or erros <a href="https://github.com/itsaafrin/isms" target="_blank">here</a>.

Note: This is just an initial release and more functionality will be added as the time goes. Feel free to raise any feature request or suggestion. More info -- http://www.laravelmy.com/2014/04/05/malaysian-sms-gateway-api-laravel-4-package/
