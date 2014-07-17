#Gravatar for Craft CMS

A [Craft CMS](http://buildwithcraft.com/) plugin to return a **G**lobally **R**ecgonized **Avatar** ([Gravatar](http://gravatar.com/)) based on email address.

##Parameters
* **email** (required): The email address of the user
* **options** (optional): Object of Gravatar settings

###Options

| Option	| Type		| Default 	| Description |
| ---------	| :-------:	| :-------:	| ----------------------------------------------------------------- |
| size	 	| string	| 80		| Size in pixels [ 1 - 2048 ]|
| default	| string	| mm		| Default imageset to use [ 404 | **mm** | identicon | monsterid | wavatar ]|
| rating	| string	| g			| Maximum rating (inclusive) [ **g** | pg | r | x ] |

##Usage

###.url()

Returns a Gravatar image URL with default settings to use within your own markup:

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

###.img()

Returns a Gravatar image in an `<img>` tag:

```
{{ craft.gravatar.img('email@domain.com') }}
```

The `.img()` method has an additional option:

| Option	| Type		| Default 	| Description |
| ---------	| :-------:	| :-------:	| ----------------------------------------------------------------- |
| attr	 	| object	| `null`	| Additional key/value attributes to include in the IMG tag (optional) |

Users loop with additional attributes:

```
{% set users = craft.users() %}
	
{% for user in users %}
	
	{{ craft.gravatar.img(user.email, {'attr': {'class': 'gravitated', 'id': 'author-' ~ user.id}}) }}
	
{% endfor %}	
```

##Feedback?

Contact me on Twitter: [@ryanshrum](https://twitter.com/ryanshrum) or [@ehousestudio](https://twitter.com/ehousestudio)

##License

This work is licenced under the MIT license.