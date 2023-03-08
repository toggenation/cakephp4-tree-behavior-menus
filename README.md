# CakePHP 4 - Tree Behavior Video Code

The CakePHP Tree Behavior implements MPTT (Modified Preorder Tree Traversal) Logic.

Using the Tree Behavior can create things like menus and other hierarchical structures easily.

## Video Subjects
1. **CakePHP 4 - Using the Tree Behavior to create a Bootstrap 5 menu** [https://youtu.be/RYu7Aec0hqg](https://youtu.be/RYu7Aec0hqg)
2. **CakePHP 4 - Enable the Tree Behavior in a table with existing records** [https://youtu.be/XVqG_EypeKA](https://youtu.be/XVqG_EypeKA)

This repository contains the code to the above mentioned Youtube Tutorial Videos


## Video 1. Subjects Covered with Timings

```
00:00 Intro
01:04 php-dotenv
03:10 Create a migration for a table that supports the Tree behavior
06:47 Fixing a php-dotenv error
08:42 Adding a Bootstrap Navbar, JS and CSS
12:54 Overriding the default PaginatorHelper widget templates
20:08 Creating a Database Seeder that works with the Tree Behavior
27:53 Fixing the "No active transactions" error in the MenuSeed
29:00 Displaying the parent / child relationships in index view and select input lists
30:04 Storing the nesting level of a node in a database field
34:20 Implement Tree Behavior methods: moveUp, moveDown, removeFromTree
40:53 Styling the flash alerts with Bootstrap
42:00 Fixing incorrect level values using either recover or by updating descendants
50:30 Making the Menu Tree available to all  views
53:52 Disabling DebugKit Panels
56:15 CakePHPizing the sample Bootstrap navbar code
01:15:115 Ordering menu items correctly
01:18:30 Using a custom Helper to provide controller:action CakePHP menus
```

## Video 2. Subjects Covered with Timings
```
00:00 Intro - What will be covered
01:00 Create Trees table using a migration
02:35 Bake the Model/View (templates)/Controllers for the Trees table
05:00 Create a migration to Tree Behavior enable the Trees table
07:00 Add Tree Behavior to TreesTable Class
08:30 Get CakePHP 4 to build the tree structure using recover()
09:00 Add a @mixin annotation to a class to get Tree Behavior vscode method auto-complete working
11:00 Protect the tree structure in the database by making lft and rght not-nullable
14:00 Add parent_id field to allow linking an item to a parent
17:20 Remove mass assignment protection to allow parent_id to save
18:15 Add visual indication of parent / child relationship to index template
20:00 Using the getLevel method to find the level of an tree node
22:20 How Tree Behavior methods manages lft and rght values
24:20 Transferring moveUp/moveDown/removeFromTree actions into the TreesController and index template
28:15 Conclusion: The lft and rght fields are managed by the Tree Behavior

```





