=== Plugin Name ===
Contributors: blakedotvegas
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=VAQJGNKSGAKLS&lc=US&item_name=Video%20Background&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: html5, video background, mp4, webm, responsive, shortcode, overlay, fullscreen background, fullscreen, html5 video background, metabox, blake vegas, loop, mute, unmute
Requires at least: 3.2
Tested up to: 4.3.1
Stable tag: 2.2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

jQuery WordPress plugin to easily assign a video background to any element. Awesome.

== Description ==

This plugin is an easy and simple way to add a video background to any element on your website.

Note: You may need to play around with the element’s z-index for the video background to display properly.

There are 4 simple required fields:

*   Container: This fields specifies where you would like the video background. If you want it to cover the whole website, you would enter "body". If you want the video background to be in a class called ".header" you would enter ".header" 
*   MP4: Link to the .mp4 file. For Safari and IE support.
*   WEBM: Link to the .webm file. For Chrome, Firefox, and Opera support.
*   Poster: This will be used for the fallback image if video background is not supported (mobile for example)


There are also 3 additional optional fields for having a more beautiful video background:

*   Overlay: Adds a pattern overlay over the video for optimal reading of text.
*   Loop: Enable or disable the looping of your video! Play your video once, or infinite!
*   Mute: in Video Background, you now have the option to unmute your audio!

DEMO:
<http://blake.vegas/plugins/video-background>

== Installation ==

Installation is simple.

1. Upload `video-background` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Fill in the settings on the “Video Background” metabox on the page or post you'd like the video background to show up on.

== Frequently Asked Questions ==

= What size is recommended for the videos? =

15mb is usually best for me, I try to not exceed that. Any video after 15mb starts to slow down and sometimes will not load. A great compression tool for Video Background is <https://clipchamp.com>. Check with your hosting provider to make sure you have enough bandwidth for video backgrounds.

= Is this compatible with Internet Explorer? =

Video background works for Internet Explorer 9 and above. Any version below that will use the fallback image.

= How would I make a full width/height background video? =

Simply fill out the 4 easy fields. Be sure for the container you enter "body" (without the quotes)

= What filetypes are allowed for fallback images? =

Fallback images can be .jpg, .png, and .gif.

= I entered all the correct fields, but my video will still not load. What am I doing wrong? =

This can be an issue with the file size of the video you are uploading. Make sure that you video is compressed and is does not exceed 15mb. Once you get over 15mb, it takes a while to load. Check with your hosting provider to make sure you have enough bandwidth for video backgrounds.

= I want to add a video background to a class called "header", how would I do that? =

To add a video background to a class called **header** add ".header" to the container field. (without the quotes)

== Screenshots ==

1. 4 fields? That’s it? Yep, simply enter in the element you’d like the video background to be in and key in the paths to the video and fallback image. Awesome.

== Changelog ==

= 2.2.3 =
* Fixed typo in settings submenu

= 2.2.2 =
* Fixed blurred circle play button bug on iOS devices

= 2.2.1 =
* Cleaned up code
* Added donate link

= 2.2.0 =
* Fixed notices on 404 page when debug mode is set to true
* Fixed blog posts page video background. 

= 2.1.4 =
* Added toggle loop
* Added toggle mute
* Added advanced section toggle
* Got rid of the getting started row in the metabox

= 2.1.3 =
* Added last versions changelog
* Added FAQ

= 2.1.2 =
* updated links in readme.txt

= 2.1.1 =
* Added FAQ
* Added instructions on settings page
* Cleaned up code
* Changed plugin compatibility

= 2.1.0 =
* Added overlay featured
* Cleaned up code, added comments, etc.
* Dissolved OGV featured, now use video background with only MP4 and WEBM. 

= 2.0.1 =
* Added page post type  

= 2.0.0 =
* Video Background: Now in a metabox! No longer do you have to worry about generating a shortcode.

= 1.0.6 =
* Fixed path to js file

= 1.0.4 =
* Getting Started/settings page added

= 1.0.3 =
* ReadME update

= 1.0.2 =
* ReadME update

= 1.0.1 =
* Updated Assets
* Updated Readme

= 1.0 =
* Initial Release