---
title: Getting Started with MatLib
author: Jasper Day
---

Hello, and congratulations on taking over the MatLib project! This is an exciting opportunity to work with interesting materials, and expose a broader public to the excitement of science education.

This document is intended to get you caught up with the back-end technologies (the technologies running on the server) that make MatLib possible. However, I also expect that this project will grow and evolve, and the choices that seemed best in the summer of 2023 will not necessarily hold up now. Thus, I've also written this document to help you migrate the information that already exists on MatLib on to some different server.

## Organization

### Items

First, you'll need to know how the project is organized. The currency of MatLib is **items**, which are physical things that you can touch and feel. Some examples of items:

- Rubber bands
- Steel failure specimens
- Silly putty

These items are stored somewhere (as of now, in a box in Fleeming Jenkin TLJ). One of the key ideas of MatLib is that physical aspect: everything in the library should be something that you can go and touch or play with.

### Materials

What can we say about the items? Well, since the project is run by materials professors, the items are chosen for the interesting ways in which they use materials. So the most important thing about the various items in the library is *what they're made of*, i.e., the **materials** composing that item.

TODO ![Box chart: Item -> Materials]()

Note that an item might be made of a single material (e.g. a rubber band), or made of multiple materials. If the item is made of multiple materials, all of those materials will be listed separately. A good example of this is the 
