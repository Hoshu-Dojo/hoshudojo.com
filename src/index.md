---
layout: layouts/default
scripts: [
    "./scripts/map.js",
    "./scripts/photo-feed.js",
    "./scripts/contact-form.js",
    "./scripts/mailing-list-form.js",
    "https://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"
]
---

{% include "sections/home/hero" %}
{% include "sections/home/benefits" %}
{% include "sections/home/arts" %}
{% include "sections/home/photo-feed" %}
{% include "sections/home/leadership" %}
{% include "sections/home/locations" %}
{% include "sections/home/contact" %}