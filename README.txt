THIS JUST IN! v2.7
A WordPress theme by WordPress Hacker (wphackr.com)

Please also see the ChangeLog at the bottom of this document.

-----------------------------------------------------------------------------------------
REQUIREMENTS:
This theme has been designed for and tested on WordPress version 2.7 and higher, and is
designed to take advantage of some of the newer features of WordPress v2.7, such as threaded
comments and sticky posts. It very well may work on WordPress v2.6, but I can't make any guarantees.
-----------------------------------------------------------------------------------------

-----------------------------------------------------------------------------------------
MAJOR FEATURES:
1. SEO - Great care was taken to ensure this theme is optimized for search engines. We
    were able to acheive an incredibly well-optimized theme without sacraficing design.
    
2. JAVASCRIPT ENABLED
    Don't worry all you accessibility nuts out there, this theme will function just fine if
    your visitors do not have JavaScript enabled.
    JavaScript is used for:
    		a. Better tooltips over the RSS and RSS via email subscribe buttons,
    		    which can be found left of the header image (must be uncommented in header.php).
		b. "Allowed Tags" display (see #7 below)
		c. Archives page for easy switching between viewing archives by month, category,
		    tag, or all.
		d. Archives page for toggling of post excerpts.
		
3. DYNAMIC ARCHIVES PAGE
    The archives page has been designed for easy browsing and navigation. By default,
    all posts are listed in order by month with month names and year headers. Clicking
    the "show excerpts" link near page top will toggle on/off excerpts so visitors can
    see a quick summary, in addition to the title, of any post before viewing it.
    Clicking "By Month" or "By Category" will display posts ordered by month and by
    category, respectively. Clicking "By Tag" displays a list of active tags for exploring the
    archives by post tag.
    *Note: Since the dynamic archives page displays a list of all posts, both sorted by month
    and by category, blogs with a large number of posts may experience delayed load times.
    If this happens to you, just switch your archives page template to "Original Archives", which
    is a traditional archives template.
    
4. ROTATING HEADER IMAGES
    Feel free to replace with your own! 
    Just replace the images in /images/header_images/ with your own.
    
5. GRAVATAR SUPPORT
    Displays avatars next to visitor comments if commentators have an avatar set up 
    with gravatars.com
    
6. STYLED AUTHOR COMMENTS
    Author comments are styled differently than visitor comments for easier comment
    scanning.
    
7. CATEGORY & POST DESCRIPTIONS
    If a post has an excerpt, that excerpt will be displayed in a box above the post when viewing
    the single post page, which can be used as a quick summary.
    
    Also, if a category has a description, that description will be displayed in a box when on
    that category's main page.
    
7. "ALLOWED TAGS" DISPLAY
    Encourages commentator involvement by displaying a list of tags allowed comments,
    located next to the new comment text area. This list will automatically update to reflect 
    the currently allowed comment tags.
    
8. COMMENT MODERATION NOTIFICATION
    Notifies visitors of the status of comment moderation as set in the WordPress admin.
    Displays "All comments are moderated before being shown" if all comments must be approved.
    Displays "New comments are moderated before being shown" if only new commentators'
    comments must be approved.
    Hidden if comments are not moderated.
    This field updates automatically based on settings in the WordPress admin.
    
9. ATTENTION TO DETAIL - That is...you shouldn't find any quirks or hiccups because I've poured
    through every line of code in this theme several times and tested it under a variety
    of different conditions to ensure that it functions as expected and all common markup
    elements have been accounted for. Nonetheless, if you find anything I missed, by all 
    means, let me know at http://wphackr.com/contact/


-----------------------------------------------------------------------------------------
INSTALLATION:
Installation is a snap:

1. Upload the theme files to your "themes" directory and unzip.

2. Activate the theme via the WordPress admin

3. Page creation (the following page links exist in header.php but are commented out - this is
	an easy way to add some pages, although you certainly don't have to do it this way):
    	a. Create an Archives page with page slug "archives" using page template "Archives"
		b. Create an About page with page slug "about" using the Default Template
		c. Create a Sitemap page with page slug "sitemap" - This theme has styles already
		    set for the Sitemap Generator Plugin for WordPress by Dagon Design, which you
		    can download at here:
		    	
				http://www.dagondesign.com/articles/sitemap-generator-plugin-for-wordpress/

4. Change the RSS via email link to yours or disable the link in "header.php" if you don't offer
    RSS via email.
5. Now you should be good to go. Enjoy!
-----------------------------------------------------------------------------------------

-----------------------------------------------------------------------------------------
SOME USEFUL NOTES:

Use of JavaScript:
This theme uses a limited amount of JavaScript to provide a better user experience.
Please keep in mind that this theme was designed in such a way that even if your visitors 
do not have javascript enabled, the theme WILL STILL FUNCTION PERFECTLY. To see a list of 
features in this theme that utilize JavaScript or to see what features will not appear for 
visitors without JavaScript enabled, please visit this theme's homepage at WordPress Hacker:
http://wphackr.com/themes/this-just-in/

RSS via Email:
Be sure and change the email feed link to yours or remove it altogether. Otherwise your 
visitors will be subscribing to wphackr.com, although there's certainly nothing 
wrong with that ;-)

Do not add a title to either the RSS or RSS by email links or their corresponding images 
as this will interfere with the much better looking JavaScript tooltips.
-----------------------------------------------------------------------------------------

-----------------------------------------------------------------------------------------
MORE INFORMATION:
More information on this theme can be found at wphackr.com:
	http://wphackr.com/themes/this-just-in/
-----------------------------------------------------------------------------------------

A WordPress Hacker Experience

=========================================================================================
=========================================================================================

CHANGELOG - v2.7:
#[CHANGED] - this version solves the issue some people were having with comment forms not showing up and no ability to link to comments

CHANGELOG - v2.6:
#[CHANGED] - changed the credit link again at the request of WordPress.org 

CHANGELOG - v2.5:
#[CHANGED] - changed credit link to point at wphackr.com instead of wordpresshacker.com - I had to change my domain name to something without "WordPress" in
it or else the powers that be at WordPress.org wouldn't host my theme
	
CHANGELOG - v2.4:
#[FIXED] - wrapped masthead in div and edited #masthead and h2#tagline styles to prevent things looking strange when the masthead and tagline take up more than 1 line
#[ADDED] - added <br /> before tags are output so they appear on new line
#[ADDED] - added background color and border to .wp-caption for image captions
#[REMOVED] - removed bottom border from p.wp-caption-text to prevent duplicate bottom border after .wp-caption border
#[CHANGED] - updated spacing and sizing on heading elements
#[CHANGED] - shrunk caption text from .8em to .7em and changed color to #777 to further differentiate captions from regular text
#[CHANGED] - updated pre and code tags
#[ADDED] - added default table styles
#[FIXED] - added bottom margin to first-level sidebar list items
#[FIXED] - added overflow: hidden; to #nav_menu selector to prevent nav tabs overflowing container at certain browser zoom levels
#[FIXED] - added !important to .aligncenter selector's margin-left and margin-right properties to fix problem with images in posts not aligning to center
#[CHANGED] - changed small.attr display property to block and margin-top property to -5px to tuck it in closer to headings
#[ADDED] - added styles for abbr, acronym, and pre selectors
#[ADDED] - added span.code selector for inline code styling
#[ADDED] - added <?php post_class(); ?> to post elements in loop on all templates for WordPress v2.7 post class support
#[ADDED] - added image.php template
#[ADDED] - added links.php template
#[ADDED] - added support for comment threading:
			- renamed comments.php to legacy.comments.php and created new comments.php file
			- added filter in functions.php to check if fancy comments function exists and display correct comments file
			- added "if ( is_singular() ) wp_enqueue_script( 'comment-reply' );" to header to support javascript functionality in comments
			- added <?php comment_id_fields(); ?> before </form> in comments
			- wrapped comment form in div id="respond"
			- replaced <h3 id="respond">Leave a Comment</h3> with <?php comment_form_title( 'Leave a Comment', 'Reply to %s' ); ?>
			- added <div id="cancel-comment-reply"><small>< ?php cancel_comment_reply_link() ?></small></div> just below that to show the cancel leave a comment button
#[CHANGED] - changed password protection check at top of comments file