# User Donate Link

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/tagecode/flarum-donate.svg)](https://packagist.org/packages/tagecode/flarum-donate) [![Total Downloads](https://img.shields.io/packagist/dt/tagecode/flarum-donate.svg)](https://packagist.org/packages/tagecode/flarum-donate)

A [Flarum](http://flarum.org) extension. This is a flarum extension to add user donate link in profile page.

## Description

When some of your discussions or posts on the forum helps someone,
he can invite you to have a cup of coffee through the donation link.

The following values are recommended about Donate Link:
1. Your Personal PayPal Link.
2. Stripe Payment Link.
3. Your payment QR code link.

## Installation

Install with composer:

```sh
composer require tagecode/flarum-donate:"*"
```

## Updating

```sh
composer update tagecode/flarum-donate:"*"
php flarum migrate
php flarum cache:clear
```

## Preview

Mainly in these three places, personal homepage, user card page and edit user information page.

![1](https://raw.githubusercontent.com/tagecode/assets/main/mark-down-images/flarum-donate-1.png)



![2](https://raw.githubusercontent.com/tagecode/assets/main/mark-down-images/flarum-donate-2.png)



![3](https://raw.githubusercontent.com/tagecode/assets/main/mark-down-images/flarum-donate-3.png)



## Links

- [Packagist](https://packagist.org/packages/tagecode/flarum-donate)
- [GitHub](https://github.com/tagecode/flarum-donate)
- [Discuss](https://discuss.flarum.org)

## FAQ

If the value is set normally, it will be displayed according to the situation.

1. When not logged in, the link will be displayed when the valid value is set normally.
2. After logging in, the current login person’s own link is **not displayed** on his own information page, and the values set by other people are displayed normally.

## Reference

- [flarum-add-web3-address-to-user-profile](https://www.sitepoint.com/flarum-add-web3-address-to-user-profile/)
- [FriendsOfFlarum/user-bio](https://github.com/FriendsOfFlarum/user-bio)
