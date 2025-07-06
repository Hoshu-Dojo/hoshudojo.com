# hoshudojo.com

This site was built using the static site generator, 11ty (Eleventy).

To run locally, use...

```shell
npm i
npm start
```

## Developing

Stylesheets for this project are generated using Sass. You can update the CSS stylesheets as you make changes using:

```shell
npm run sass:compile # compile once
npm run sass:watch # compile once and watch for changes
```

Depending on your configuration, you may need to install Sass globally and add it to your PATH.

## Image optimization

To help maintain a strong Lighthouse score and provide a generally smoother performance, images should be:

- Sized appropriately for their use-case (eg. hero sections vs. headshots)
- Have 2–3 size variants for responsive sizing, and/or pixel density
- Be saved in both WEBP and JPG/PNG formats (WEBP first with JPG/PNG fallback; when image URLs are defined in SCSS, use media queries to only use WEBP when supported)
- Per the above, use `<picture>` and `<source>` elements accordingly

Use a service like [FreeConvert](https://www.freeconvert.com/webp-converter/download) or [CloudConvert](https://cloudconvert.com/jpg-to-webp) to handle WEBP conversion. If you have control over the settings, use a max width of 1000px and a quality of roughly 70%, per your best judgment. Also be sure to strip out any EXIF data, if available.

## Instagram feed

Due to Meta's oEmbed API being fairly restrictive to use, our Instagram gallery section needs to maintained more manually. A script has been written to show a select few on first load, then cycle through an archived folder to transition what is currently shown. Images will need to be saved from the [Hoshu Dojo Instagram page](https://www.instagram.com/hoshudojo) and copied to the `src/assets/img/insta/` directory using the naming convention `<year><month><day>_<iteration>`, eg. `20250705_01.jpg` and `20250705_01.webp`. Once saved, the filename WITHOUT any extension should be added to the `photoFeed.featured` list in `site.json`. Files do not necessarily needed to be listed in chronological order if there is a certain selection you would like to appear first; put these in the first 8 slots in the list to have them appear on first load (when Javascript is enabled, else the placeholder images will be the fallback).

## Iconography

Icons are used minimally at the moment, but all SVGs have been saved from [Ant Design Icons](https://github.com/ant-design/ant-design-icons/tree/master/packages/icons-svg/svg/outlined). For design consistency, continue using this collection as much as possible for future icon needs.

## Form management

The landing page has two forms:

- A contact form for general outreach by prospective students
- A newsletter sign-up form, handled via Mailchimp

The contact form uses the free tier of [Web3Forms](https://web3forms.com/) with a generated public token. While hCaptcha is in place, there is still a chance spam could slip past their filters. [Per the Web3Forms documentation](https://docs.web3forms.com/getting-started/customizations/spam-protection/report-spam), any spam should be forwarded to support@web3forms.com. 