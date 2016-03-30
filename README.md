# yii2-keycdn
A Yii2 extension for some KeyCDN lovin' that's so simple even your cat will be able to use it.

## Defining the Extension

Here is the full definition, from an example:

	'keycdn' => [
		'class' => 'sammaye\keycdn\KeyCdn',
		'apiKey' => 'your_api_key'
	]
    
## Using It
    
Everything is quite self explanatory. Let's dive straight in and use this sucker with examples.

### Example 1: `GET` zones

    var_dump(Yii::$app->keycdn->get('zones.json'));

### Example 2: `DELETE` `purgezone` by URL

    var_dump(Yii::$app->keycdn->delete(
        'zones/purgeurl/xxx.json', 
        [
            'urls' => 
            [
                'xxx-111.kxcdn.com/css/all-e007231ec83260807e00650a0c274b86.css'
            ]
        ]
    ));
    
### Responses

Responses are raw, converted from JSON to the `stdClass` primative in PHP, for example: here is the response from `purgeurl`:

    object(stdClass)[194]
      public 'status' => string 'success' (length=7)
      public 'description' => string 'Cache has been cleared for URL(s).' (length=34)
      
### Errors

The extension will throw a `yii\base\Exception` when the body of the response cannot be decoded from JSON or if the JSON field `status` is `error`.
    
## Links

- [Issue Tracker](https://github.com/Sammaye/yii2-keycdn/issues)
- [Github](https://github.com/Sammaye/yii2-keycdn)
- [Packagist](https://packagist.org/packages/sammaye/yii2-keycdn)
