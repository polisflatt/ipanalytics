# ipanalytics
PHP resources which allow the analytics of users and their unique strings.
## ipanalytics

ipanalytics is a PHP resource which allows for the logging and storing of unique user strings, also known as IP Addresses. This program is not to be used for malicious purposes, but for analytical analysis of user demographics and/or attackers on your website.

It can record IP addresses, with time, and on a specific date. It organizes these into a folder of your choice and by date. You can use another program to format this, as the information is stored as (not readable by humans?) JSON. The default folder of storage is src/logs. If you are to be using this program, create that folder now.

The advantage is that it is extremely stealthy, modular, minimal, extensive, open source (to the person using on others, at least, which is why it is under MIT license), modifiable, and server-friendly. Other IP analytics programs are associated with "l33t hax0r" websites and are extremely rogue and reputation ruining. There is nothing wrong with IP logging, when you have many people possibly trying to sabotage your website, or if you just simply want to know who's coming to your website.

Utilizing is not very friendly to people who are not familiar to PHP, but it can be done with careful reading and meticulous effort. When you want to log users, import *src/log.php* into any PHP file that may receive a request. When you do this, the IP of the requester will be stored and put into the system. Putting the program in path may be a good action to do, so you can import it whenever you'd like, then host the program to format the data on a separate port.

In order to view logs, open *index.php* in a web browser, and if, on your httpd, PHP is enabled, it will show a list of folders, of which contain dates and the respective logs in them. If you are to click on one of them, you will sent a GET request to *view.php* with the respective attributes and values. This will give you a table containing the IP addresses and their respective information.
![Example of an entry](https://i.ibb.co/yWgnTX6/2019-05-05-121853-1621x98-scrot.png)

The information is obtained using https://ipinfo.io, which normally is free. However, if you are receiving a large amount of traffic (let's say, 1000+ requests), you may want to use another service, which you can edit into *src/lib/settings.php*. Then, edit the table on index.php so that it matches with your new service. Or, if you have money to spend, purchase a membership with https://ipinfo.io (not sponsored).

 ## Installation

No formal installation is available now, because PHP is a huge pain. Put the folder contents on your httpd folder (I recommend Apache, always), host on a separate port, make it private, and then, when you need to, reference it using direct paths.

For instance, on another .php file of mine, I could do
`require "/srv/www/apache/private/ipanalytics/src/log.php";`
   
Such would work correctly, but I believe you could put the file in path, in order for it to work properly and not be such a hassle with paths. You can do this, because all of the libraries use `dirname(__FILE__)` when including each other, as to not confuse relative paths. (I got angry about this in the comments of my source, check the comments).


 
