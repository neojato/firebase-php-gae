# GAE Firebase PHP Client

forked from: [ktamas77/firebase-php](https://github.com/ktamas77/firebase-php)

unit tests are included in `tests` directory.

Based on the [Firebase REST API](https://www.firebase.com/docs/rest-api.html).

Reworked for use on Google App Engine PHP Runtime by replacing cURL requests with GAE's URL Fetch API.
See [GAE URL Fetch PHP API](https://cloud.google.com/appengine/docs/php/urlfetch/) for more information.

### Supported Commands
```php
// -- Firebase API commands

$firebase->set($path, $value);   // stores data in Firebase
$value = $firebase->get($path);  // reads a value from Firebase
$firebase->delete($path);        // deletes value from Firebase
$firebase->update($path, $data); // updates data in Firebase
$firebase->push($path, $data);   // push data to Firebase

// -- Firebase PHP Library commands

$firebase->setToken($token);     // set up Firebase token
$firebase->setBaseURI($uri);     // set up Firebase base URI (root node)
$firebase->setTimeOut($seconds); // set up maximum timeout / request
```

Please refer to [ktamas77/firebase-php](https://github.com/ktamas77/firebase-php) for further details.

### Add using composer

```bash
cd <your_project>
composer require neojato/firebase-php-gae master
```
