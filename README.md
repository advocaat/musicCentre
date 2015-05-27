musicCentre
===========
CP1406/CP2010 Group Assignment

**Important Folders**
- .html : CP1406 Code
- .cameronsWork : Cams updated HTML
- .jamiesAssignment1 : Jamie's Assignment 1 for reference on columns

**User Accounts**
- User level : user@email.com
- Member level : member@email.com
- Admin level : admin@email.com
- Passwords : password

**Still To To**
- Add comments to bulletinDetail.php ?
- Delete confirmation?
- Alt tags for images?


Changelog
=========

**27/05/15 - Jamie**

- updated css to make it more responsive
- finished header.php
- fixed lots of css to make ready for submission: margins, column sizes, colors etc
- added navigation buttons to the bottom of detail pages
- edited process pages to return to referrer page without get parameters. fixes admin edit bugs.
- reordered menu links to match user menu
- added adminMenu.php
- added admin pages
- switched artist categories to single comma separated field
- fixed processing logic to accommodate admin editing
- added filter on artist page for categories

**25/05/15 - Adam**
- Added donate links to members.php
- Admin settings page - done (for category)
- Make "Category" in editArtist.php a dropdown field
- Fix buy tickets url
- added pagination to artists

**22/05/15 - Jamie**

- dropped size of featured photo to 33% max width
- fixed up events page layout
- added sponsors to sidebar.php
- added members page text
- fixed events and bulletin add/edit
- added photo processing and upload
- fixed editBulletin.php permission issue
- created bulletinDetail.php
- fixed issue causing photos to be required
- Delete photos automatically when deleting events/artists/bulletins
- Hide bulletins after one month
- Hide events after event date
- Made "Featured Artist" in editEvent.php a dropdown field.
- Added featured artist link on event pages when set.
- Fixed text input bugs. Escaped quotes, nl2br(), string replace.
- Made images on detail pages larger.

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