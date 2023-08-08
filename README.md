# MatLib: The Materials Library

Welcome to the Git repo of MatLib. This document outlines where to find everything important.

## Grav

This repo is intended to work with an installation of [Grav](https://getgrav.org). Grav is a dynamic *flat-file* content management system (CMS). This means that users can interact dynamically with content, and it exposes a graphical frontend for editing files. 

Unlike similar systems (Wordpress, Drupal, etc), Grav does *not* store information in a database. Instead, all of the information is stored in plain-text [Markdown](https://commonmark.org/) files, which can be edited in your text editor of choice. (I use a combination of [VSCode](https://code.visualstudio.com/) and [Neovim](https://neovim.io/), and I suggest VSCode). This is a deliberate choice on my part: it means that all of the information in MatLib is immediately accessible without the need for any 3rd-party management tools, and everything is exposed by a casual perusal of the repository. It also means that, with some bash-fu, you could easily convert this to a [statically generated site](https://www.digitalocean.com/community/conceptual-articles/introduction-to-static-site-generators), with fewer features but more resilience and longevity.

To get this site up and running with a [fresh installation of Grav](https://learn.getgrav.org/17/basics/installation), you have several options: 

- The simplest way is to simply download the repository on your own device, copy the folders into the relevant place, and call it a day. (I don't really recommend this.) Open a terminal and type (after googling, if you've never seen them before) the following commands:
```bash
git clone https://github.com/jasper-day/matlib-pages ./tmp # copies this repository into a temporary folder
```
Then copy that temporary directory into the `user` folder of your Grav installation. 
- (preferred) [Fork](https://docs.github.com/en/get-started/quickstart/fork-a-repo) this repository, host it on your own Github, and then set up the [Grav Git Sync plugin](https://github.com/trilbymedia/grav-plugin-git-sync) to sync between your repository and your Grav installation. This is the preferred method of connecting. You can then clone your own repository to your machine and work on it from there in the traditional Git way, treating the server as a form of continuous integration.

## Site Organization

This section is useful if you don't want to run Matlib on Grav, but would prefer to migrate the data to something else.

### Data Files

All of the pages are stored in `pages/items`. The name of the page is the name of the folder the page is stored in. The name of the *file* is, by default, which template to use for the file.

The `plugins` directory contains all the plugins used by Grav. I wrote a plugin called `matlib-randomize` which allows a particular URL to redirect to an arbitrary page in a given folder.

The `themes` directory contains the Matlib theme, which is based off of Grav's default [Quark](https://github.com/getgrav/grav-theme-quark) theme. The templates use [Spectre](https://picturepan2.github.io/spectre/) as the CSS framework, which allows you to write themed HTML by putting classes on your HTML objects. For example, `<div class="btn"></div>` makes a button. This is mostly used for making grid layouts for pages.
