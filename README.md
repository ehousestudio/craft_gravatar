# Gravatar for CraftCMS v1.1

[Craft CMS](http://buildwithcraft.com/) plugin allowing you to easily insert an avatar url or image from [Gravatar](http://gravatar.com/) based on email address.

# Methods

## .url()
Returns a Gravatar image URL with default settings to use within your own markup:

### Parameters
* **email** (required): The email address of the user
* **options** (optional): Object of Gravatar settings

### Options

| Option	| Type		| Default 	| Description |
| ---------	| :-------:	| :-------:	| ----------------------------------------------------------------- |
| size	 	| string	| 80		| Size in pixels (Values: 1 - 2048)|
| default	| string	| mm		| Default imageset to use (Values: 404,  mm, identicon, monsterid, wavatar)|
| rating	| string	| g		| Maximum rating (inclusive) (Values: g, pg, r, x) |

### Usage

```
{{ craft.gravatar.url('email@domain.com') }}
```

This can also be used within the entry model:

```
{{ craft.gravatar.url(entry.author.email) }}
```

Lastly, it can be used with the user module:

Return *all* users' Gravatars:

```
{% set users = craft.users() %}
```

Return *one* user's Gravatar:

```
{% set users = craft.users({username: 'username'}) %}
```

Run the for loop for the set users:

```
{% for user in users %}
			
	{{ craft.gravatar.url(user.email) }}
	
{% endfor %}

```
Adding options:

```
{{ craft.gravatar.url('email@domain.com', {'size': '100', 'default': 'monsterid'}) }}
```

## .img()
Returns a Gravatar image in an `<img>` tag:
### Parameters
* **email** (required): The email address of the user
* **options** (optional): Object of Gravatar settings

### Options

| Option	| Type		| Default 	| Description |
| ---------	| :-------:	| :-------:	| ----------------------------------------------------------------- |
| size	 	| string	| 80		| Size in pixels (Values: 1 - 2048)|
| default	| string	| mm		| Default imageset to use (Values: 404,  mm, identicon, monsterid, wavatar)|
| rating	| string	| g		| Maximum rating (inclusive) (Values: g, pg, r, x) |

The `.img()` method has an additional option:

| Option	| Type		| Default 	| Description |
| ---------	| :-------:	| :-------:	| ----------------------------------------------------------------- |
| attr	 	| object	| `null`	| Additional key/value attributes to include in the IMG tag (optional) |



### Usage
```
{{ craft.gravatar.img('email@domain.com') }}
```

Users loop with additional attributes:

```
{% set users = craft.users() %}
	
{% for user in users %}
	
	{{ craft.gravatar.img(user.email, {'attr': {'class': 'gravitated', 'id': 'author-' ~ user.id}}) }}
	
{% endfor %}	
```


## .exists()
Checks if an email address has an avatar associated with it. Returns `true` if avatar exists and `false` if not.
### Parameters
* **email** (required): The email address of the user


### Usage
```
{% if(craft.gravatar.exists(currentUser.email)) %}
	.....
{% endif %}	
```

## Feedback?

Contact us on Twitter: [@ehousestudio](https://twitter.com/ehousestudio)

## License

This work is licenced under the MIT license.
