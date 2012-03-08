=== RSS iTunes Redirection ===
Contributors: floriansimeth (this should be a list of wordpress.org userid's)
Donate link: http://social2business.com
Tags: itunes, rss, redirection, namespace, rss 2.0, podcast, redirect, apple, feed
Requires at least: 3.3.1
Tested up to: 3.3.1
Stable tag: 0.1

If you want to change the url of an already submitted podcast (feed) in iTunes, this plugin will help you out.

== Description ==

If you are a podcaster and you already submitted a podcast to iTunes you will notice that Apple does not provide a form where you can change your feed- or podcast url. Instead you have to use a special tag in your feed to change the url. 

The RSS iTunes Redirection Plugin will add the necessary namespace (if needed) and the special redirect-tag to your RSS 2.0 feed on Wordpress.

The namespace is: xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd
The redirect-tag is: <itunes:new-feed-url> [your new feed url] </itunes:new-feed-url>

Please read the FAQ for more information.

If you have any further questions, please

* add a comment on the plugins page [RSS iTunes Redirection](http://social2business.com/wordpress-plugins/itunes-rss-redirection/)
* ask on [my Twitter Profile](http://twitter.com/floriansimeth)
* or visit my german [Lifestyle Design](http://hangout-lifestyle.de) Page

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the folder `rss-itunes-redirection` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to Settings -> iTunes Redirect and change the redirection URL

== Frequently Asked Questions ==

= How do I install the plugin? =

Please follow the steps on the "Installation" Page

= How can I stop redirection? =

Just deactivate the plugin or remove the redirection url from the "New Feed URL"-field

= My feed will not be redirected, what should I do? =

It may take a while till iTunes picks up your new feed and changes the url to the new one.

= I'm getting an error on my feed or Feedburner says that there is an error =

Please check your feed with the W3C Feed Validator (http://validator.w3.org/feed/). If there is an error, you maybe activate or deactivate the namespace.

If you activate the namespace please make sure that it's not already added to the feed from another podcast plugin. Double-Adding the namespace will cause the error.

The error will also appear when you're using the redirection plugin without a namespace. In this case check your feed with the W3C Feed Validator mentioned above and test what works for you.

== Screenshots ==

1. Isn't it easy? To redirect your podcast within iTunes, just fill this fields. Available languages: German, English

== Changelog ==

= 0.1 =
* Possibility to add the namespace to the RSS 2.0 feed of Wordpress
* Possibility to add a special iTunes-Tag to the RSS 2.0 feed of Wordpress for redirection reasons
