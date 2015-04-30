musicCentre
===========
CP1406/CP2010 Group Assignment

**Important Folders**
- .html : CP1406 Code
- .jamiesAssignment1 : Jamie's Assignment 1 for reference

**User Accounts**
- User level : user@email.com
- Member level : member@email.com
- Admin level : admin@email.com
- Passwords : password

**(Mostly) Finished Functionality**
- Login/Logout
- User add/edit
- Artist display
- Artist add/edit
- Access control
- Header/Footer

**Remove your .idea folder from git syncing if using Intelli J please!**

Changelog
=========

**29/04/15 - Jamie**

- more elegant way to handle applying .active in header.php
- move css to subfolder
- moved full header and footer content into respective files
- remove div #menu from header and css, unnecessary
- removed width:100% from <button> in css
- removed fixed height from #header
- integrated container, row and col properly
- switched index main area from multiple divs to one col with hr
- setup narrow col as sidebar
- adjusted image size and align on index.php
- made adams login inputs the default input style and removed duplicates
- gave <img> element 10px margin
- created new sidebar.php to house module includes and sidebar content
- sideNav.php becomes userMenu.php
- user status for admin should be 2 not 3 (eg user, member, admin = 0, 1, 2)
- all references to "band" changed to "artist"
- register user and edit user rolled into one page: editUser.php
- added exit; after every header redirect to stop execution
- changed naming convention: moduleName.php & editTable.php
- moved bandDisplay.php into artists.php
- moved bandEditPanel.php and bandEditModule.php into editArtist.php
- created external processName files for POST processing
- changed order of database tables in user and artist to better suit logical form layout
- removed artist_contact preference, not required and adding complication to processing
- removed terms.php, can be integrated into main form later if necessary
- moved noPermit.php into moduleNoAccess.php
- fixed all the main pages to display columns correctly
- cleaned up css
- removed unused files (keeping admin files for now, for reference)