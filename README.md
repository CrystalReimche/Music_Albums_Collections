# Music_Albums_Collections
For this project, I created a small set of web pages for managing a music collection database over the web.   

Main Web Page/Home Page
The home web page should present a nice Navigation so that the user can get to all other relevant webpages from that one web page.  This Home web page must be the return point when a user chooses to go to the home page on any of the other pages in this project.  All other pages in the project must have the return to home page option.  The text/links should be easy to read and follow.  No super small text or color choices that make it hard to read.  This being a music collection website, I would expect this first web page to set the tone and the other pages must be in tune with the home page.  (Pun intended there)

THE FUNCTIONAL PAGES

There are a series of pages that will deal with the functionality of the website.  You might find you have to add a few more pages into your system to help manage the website other than those listed here.
The All Albums Page
One page in the project should show all the albums of the music collection.
Choices to show albums in a sorted order should include:
•	order by Album Title (this one is the default)
•	order by Artist
•	order by Genre
•	order by Label
•	order by Release Date
Only these 5 items of information are listed for each of the albums.  All other information about the album will only be visible on the individual Album’s page.
Each album in the collection needs to show on this page and have the data fields shown to the user as listed above.  Show the albums information in a table format with the columns corresponding to those items.  The Album Title should be the left most column but the order of the others will be left up to you.
For the Order By on each item, the user should be able to choose ascending or descending order on any one of the items listed.  If the user changes order by in a criteria or changes the criteria to sort by, the page refreshes to show the albums listed by the new order.
•	An example would be if the page is showing albums listed in reversal alphabetical order by Name and the user switched to alphabetical order by label, the page will need to refresh.
If the user would like to see the contents of an album, they can get that information by clicking on the album title.  You may also set it up so that a button next to the album information may be clicked to got to the album’s page.  It will then take the user to the Album page where they will see all the information about the album along with a list of songs associated with that album.
The clicking on the Album Title to go to the Album’s individual page is a requirement.  The Button or other method of the linking is optional but would be nice for the user.

LIST OF SONGS PAGE

One page in the project should show the complete set of Songs in the music collection.  Listing choices to show song should include order by:
•	Title of Song (this is the default)
•	Album from which the song came from
•	Writer of the Song
Only the three fields of information about a song on this page should be those listed in the bulleted items.  All the other information about the song should only be accessible from the Single Song page.
The user should be able to go to a page for each song that will tell the user all the information about the individual song in the same way the user could go to a single album from the list of albums.  This means by clicking on the Title of the Song.  If you used a button on the albums, then use a button on the Songs too.  Keep the interface between the two methods the same.  The user interface should be a constant for the user.
The clicking on the Song Title to go to the song’s individual page is a requirement.  The Button or other method of the linking is optional but would be nice for the user.

AN INDIVIDUAL ALBUM PAGE
One page must show the contents an individual album including all songs on the album.
The Individual Album page for any album could be arrived at by clicking on the Album’s title on the All Albums page.  As the designer, you could also have a button or other method of choosing an album from that All Albums page also.  No matter the method of choice, the link would go to the Individual Album page for the chosen Album..
This page should have a link back to the All Albums page.
Choices to show songs on the individual album in a sorted order should include:
•	order by Title of Song (this is the default)
•	order by Writer of the Song
•	order by Billboard Ranking
•	order by Length
For example, a user might want to see the songs on the album from Shortest to Longest song.  The page needs to be able to change with the user input.  When the user chooses a different order or chooses a different criterion, the page will need to refresh to show the new order.
As Billboard ranking is an optional field of information, you will need to handle the no information in that field in your sorting.  How you handle it will be up to you.
Only the fields of information about a song on this page should be those listed in the bulleted items.  All the other information about the song should only be accessible from the Single Song page.
The user should be able to go to a page for each song that will tell the user all the information about the individual song in much the same way the user could go to a single album from the list of albums.  Keep the interface between the two methods the same.  If you use a button for one, you should use a button for both.  If you use a hyperlink for one, use a hyperlink for both.  The user interface should be a constant for the user.

ALL ARTIST LIST PAGE

One page must show all the artists represented in the collection.
The user could get to this page by way of the albums page, the single song page, the main home page, and any other way in the web pages where one might click on an artist’s name.
Choices to show artists a sorted order should include:
•	Order By Last Name of artist (this is the default)
•	Order By Age
•	Order By Number of Songs they have in the collection
As with the other pages, for the Order By on each item, the user should be able to choose ascending or descending order on any one of the criteria listed.  If the user changes order by criteria or changes the criteria to sort by, the page refreshes to show the artists listed by the new order.
Only the three bullet items should be shows on this list page.  Keep consistent on how the user might go to details about a specific artist.  If you use hyperlinks before, keep using them.  If you use a select box methodology, continue with that method.  The user should be able to get the information a single artist from this page.

SINGLE ARTIST PAGE

One page in the website will need to show the information about the artist in a nice table like format.  The last item on the page for each artist should be a song list of every song they have in the music collection.  A link from each song in that list should take the user to the single song page for that song.  There will not be a way on this artist page to rearrange the order of the songs or any information about the artist.  Show the songs by alphabetical order by name of the song.

NEW ALBUM ENTRY PAGE

One page of the project must allow the user to enter new information about an album.  All information needs to be collected and submitted to the database for the new album.  When a new album is added to the database through this page, the new updated album list should be shown.
Consider the fact also that the entry of a new album will require new songs to be entered for that album so you will need to make entry process as nice for the user as possible.

DELETE AN ALBUM PAGE

One page of the project must allow the user to delete an album from the collection.  When an album is deleted, any songs linked to that album needs to be deleted also.  The feedback to the user for this page should be that the album is deleted along with a list of the songs that were also deleted when the album was removed.  Be sure that the user has a chance to not delete, so include a "Are you Sure" style interface for the user on deleting an album.
If deleting an album will also remove the last song of an artist, that artist will need to be removed from the database also.  A single page can be used for the “Are you sure you want to delete all this from the database” and show all the items being deleted including the album, the songs, and possibly the artist.

A SINGLE SONG PAGE

One page in the project must allow the user to see all the information about a single song.  The use should be able to link from the song page back to the album it is part of no matter how the user might have arrived at the Song page.   Another link should also allow the user to return to the List of Songs page.

NEW SONG ENTRY PAGE

One page in the project must allow the user to enter new songs into the database and associate that song to an album.  Feedback to the user once a song is added to an album should be to show the album with all songs presently associated with the album.  Multiple songs at the same time are not required BUT a better user interface solution would be to allow the user to put in multiple new songs at a time and associate all the songs with the one album.  Use dropdown lists to enforce referential integrity regarding the Artist.
This page is to be in there in case the user forgot to enter a song for an album at album entry time.

DELETE A SONG PAGE

One page in the project must also allow for the removal of a song from an album.  The user should be allowed to delete a song from an album.  The page MAY also allow for multiple songs to be deleted at the same time but that is not required.  If all songs on an album are deleted, that does not mean that the album is removed from the database.  The album may remain in the database.  Deletion of an album is a different process.  The feedback to the user after deleting a song or songs is to show the album with the remaining songs.
As a user, I would want to know that an album has no songs on it though so while you may not be deleting the album when you delete its last song, you do need to inform the user that the last song on that album was just deleted.

NEW ARTIST ENTRY PAGE

There needs to be a page that will allow the user to enter a new artist into the music collection.  The user should be able to get to this page from the home page or any page where an artist might need to be entered before another activity can be done involving an artist.  IE you can’t enter a song without an artist.

DELETE ARTIST PAGE

There should be a list of artists who do not have any songs associated with them in the music collection because songs or albums have been deleted.  On this page, the user should be able to remove the artist from the music collection.
Only artist without songs should show up on this list and be able to be deleted.

EDITING FUNCTIONALITY:

Everyone makes mistakes, so the user needs to be able to edit the information about the artist, a song, an album, or any item you allow them to enter.  There needs to be a page that allows for this editing.  Note, this functionality can be integrated with the new item page so that editing an item and entering an item can be the same page.   You can also make it a page by itself.  Having the same page for editing and entering a new item will create a better experience for the user by having that consistency.

THE DATA TO BE STORED OVERVIEW

The information that should be collected for each album is:
•	Title of the Album
•	Artist of the Album (can be “various” artist on a single album, various can be the information in this field)
•	Label for the Album (which company put the album out)
•	Genre of Music
•	Release Date for the Album
•	Notable Fact about the Album (can be empty)
NOTES:
Albums must have a title, at least one artist but could be more than one), have a label, have a genre, and should have a release date.
Albums do not have to have a Notable Fact.

The Information that should be collected for each song is:

•	Name of the Song
•	Artist for the song (can’t have a song without an artist)
•	What album if any the song is associated with
•	Length of the Song in Minutes and Seconds
•	Comments by the user about the song
•	Highest Billboard Ranking song achieved
•	Date the Billboard Ranking was achieved
•	Song Writer's Name

Remember also that each song may be linked by to an album.  If a Song appears on more than one album, there should be a separate Song record for each album.  You need to use appropriate primary and foreign keys in the relational database.  The exact implementation is left up to the student though

NOTES:
The Billboard Rankings will not exist for every Song as some never hit the Billboard ranking system.  Those two are optional.
Users may choose not to have comments about a song.  It may be left empty and is optional.  You may also choose a default value if you want for this piece of information.
The other items are all required on the Songs.
Be sure to validate the data entry on the minutes and seconds.
 
The information that should be collected for each artist is:
•	Stage Name of Artist
•	Birth Name of Artist
•	Birthdate of Artist
•	Hometown information for artist
•	Death date of artist if deceased
•	Fun notable fact about the artist someone might find interesting

NOTES:
The Artist can have different Stage name than Birth Name.
The Artist does not have to have a Stage Name.
The Artist Must have a Birth Name and Must have a Birthdate.
The Artist may have a hometown, but one is not required.
The Artist may have a death date, but one is not required.  They could still be alive.
The Artist must have some notable fact.

NOTES ON DATA INTERACTION

Here are a few notes on how the data interacts.
A song can have more than one artist but must have at least one artist.  You cannot have a song entered in the database without an artist.  At the time the song is entered, the artist should already be in the database.  Any one artist can have zero-to-many different songs in the database.
Songs may or may not be related to an album.  For any one song, it will be on zero-to-one album and for any one album it will have at least one song.
Albums can have a special artist that reflects various artist contributions to the album.  The songs on that album should related to an artist.  For any one artist, they can have zero-to-many different albums.  For any one album, it can include one-to-many different artists.
If more than 1 artist shows up on a song, which is possible such as a duet or group, then each name of the artists needs to be on the single song page about that song
Songs do not have to have albums.  We will work on the idea that a song could have been bought singularly in some fashion.  
Your database needs to maintain referential integrity.  You should not allow for the deletion of an artist who still has at least 1 song in the music collection.  You should not allow for the deletion of an album unless all the songs are deleted first.  These are just two types of activities that would be affected by referential integrity.

TESTING DATA

You will need to create testing data for this project yourself.  There should be a minimum of 12 albums with the following criteria met.
•	Each album is to have between 7 and 12 songs.  The number of songs on an album is considered its song count.
•	There will be at least 1 album with exactly 7 songs.
•	There will be at least 1 album with exactly 8 songs.
•	There will be at least 1 album with exactly 9 songs.
•	There will be at least 1 album with exactly 10 songs
•	There will be at least 1 album with exactly 11 songs.
•	There will be at least 1 album with exactly 12 songs.
•	There will some song counts that are duplicated so that you reach the minimum of 12 albums.
There should be at least 8 different artists represented
•	There will be an album that utilizes the Various Artist feature
You may create more albums and artists than the minimums.  
The testing should include adding and deleting from the music collection as well as editing the music collection.
You should be sure to test the border cases such as trying to edit information that you have already deleted which should not be possible.  That is only one example of items you need to include in your testing.
