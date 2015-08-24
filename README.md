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
composer require austinallover/firebase-php-gae master
```

#### The MIT License (MIT)
```
Copyright (c) 2012-2015 Tamas Kalman

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
```