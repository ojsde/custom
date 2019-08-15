## custom
Theme Plugin for OJS 3. Extends the official Default Theme Plugin with a number of settings for journal managers.

## About

An OJS theme that allows customizing the OJS default theme. 

## Settings

- Header Colour (adopted by Default Theme Plugin)
- Heading: custom heading / Title / hero claim, in addition to logo
- Heading Colour: colour for custom heading
- Mobile Hader: wether to keep logo or custom heading on small mobiles (resposive behaviour)
- Position Journal Description: display journal description above or below announcements, or not at all
- Footer Colour: background color of the footer
- Link colour: colour of links
- Text colour: colour of text in paragraphs
- Colour h1 h2 h3
- Font Headings: a selection of fonts to choose from
- Font Body: a selction of fonts to choose from
- Base Font Size
- Borders: borders as in default plugin or only vertical/horizontal borders
- Sidebar Position: left or right
- Hero Header: on or off (user homepage image as hero image, use custom heading as hero claim)

## Installation

Installalion via OJS GUI:
 - download custom-[version].tar.gz from https://github.com/ojsde/custom/releases
 - install plugin in OJS (journal management -> plugins -> „install new plugin“ -> upload cedistheme-[version].tar.gz)
 
Installation via command line without Git:
 - download archive from https://github.com/ojsde/custom
 - unzip the archive to plugins/themes and rename the main plugin folder to "custom" if necessary
 - from your application's installation directory, run the upgrade script (it is recommended to back up your database first): 
   php tools/upgrade.php upgrade or php tools/installPluginVersion.php (see https://github.com/pkp/pkp-lib/issues/2503)

Installation with Git:
 - cd [my_ojs_installation]/plugins/themes
 - git clone https://github.com/ojsde/custom
 - cd dnb
 - git checkout [branch]
 - cd [my_ojs_installation]
 - php tools/upgrade.php upgrade or php tools/installPluginVersion.php (s. https://github.com/pkp/pkp-lib/issues/2503, it is recommended to back up your database first)


## License

This plugin is licensed under the GNU General Public License v3. See the file LICENSE for the complete terms of this license.

## Contact/Support

Documentation, bug listings, and updates can be found on this plugin's homepage
at <http://github.com/ojsde/custom>.
