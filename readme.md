# Symfony_Eliza

This is a 
Requirements
------------

* PHP 8.0
* PDO-SQLite PHP extension enabled;
* [Git][2]
* [Composer][3]
* [Symfony CLI][4]
* and the [usual Symfony application requirements][5].


Installation
------------

[Download Symfony][4] to install the `symfony` binary on your computer and run
this command:

```bash
$ git clone https://github.com/ybjozee/Symfony_Eliza.git
$ cd Symfony_Eliza
$ composer install
```


Usage
-----

Make a local version of the `.env` file

```bash
$ cp .env .env.local
```

Update the relevant Twilio keys in `.env.local`

``` ini
TWILIO_WHATSAPP_NUMBER="INSERT_TWILIO_WHATSAPP_NUMBER"
TWILIO_ACCOUNT_SID="INSERT_TWILIO_ACCOUNT_SID"
TWILIO_AUTH_TOKEN="INSERT_TWILIO_AUTH_TOKEN"
```

Run your application
```bash
$ symfony serve
```

Alternatively, you can chat with Eliza via terminal by running the following command. 

```bash
symfony console eliza
```

To end the chat with Eliza, press `Enter`

[2]: https://git-scm.com/
[3]: https://getcomposer.org/
[4]: https://symfony.com/download
[5]: https://symfony.com/doc/current/reference/requirements.html
