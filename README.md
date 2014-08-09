# Action-Model-View, an MVC Framework for PHP                           #
# ===================================================================== #
# Author:  Roderic Linguri <rod@linguri.com>                            #
# Date:    Fri Aug 8 18:41:36                                           #
# License: Use, distribute, modify, but please keep my headers intact.  #

# INTRODUCTION #

After attempting to integrate several PHP frameworks into my workflow, 
I finally decided to create my own. Everyone works differently, but this
works for me. Please tell me how I can make it better for you.

# DOCUMENTATION #

I am working on it... a few things to remember:

Create your action classes in ./app/action/

As is, it is designed to work with a four letter naming convention, so if you're
creating a class called Login, you can shorten it to Logn and create a file called
'logn.php'. In that file, name your classes 'LognActionCtrl', 'LognModelCtrl', 
'LognViewCtrl', etc. Then when you call an action through an HTTP request, use the 
parameter 'action' with the value 'logn'. The bootstrapper will automatically load
the file and construct the 'LognActionCtrl' class.

Examples:
POST <input type="hidden" name="action" value="logn">
GET: <a href="index.php?action=logn">Log In</a>

In your Action Controller, you could decide what to do based on whether the request
comes as GET or POST. Just an idea.

I've provided some action examples, I'll work on more, so that the framework becomes
more extensible, but this is where I start every PHP web project. 


# DIRECTORY STRUCTURE #

app         Controller classes specific to the application
- action    HTTP requests are routed through action classes
- model     Database tables are controlled through ModelCtrl classes
- view      ViewCtrl classes assemble and display your view elements
lib         The Framework
- base      Abstract classes that can be extended in app classes
- dom       Pre-constructed DOM objects
- ctrl      Adaptable controllers for layouts and complex repetitive operations
usr         User Directory
- conf      All user configuration definitions
- includes  A place to store textual files that you want to include
- plugin    Plugins can be consolidated into this directory
var         A place for files that may change often
- files     Uploads, etc
- logs      Log files
- temp      Temporary storage area
- sqlite	SQLite database files
www	        The public directory
- index.php The main application bootstrapper
- css       Cascading style sheets
- fonts     Fonts
- img       Images
- js        Javascripts
