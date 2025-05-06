// grab .slide-fade-in elements
const slideFaders = document.querySelectorAll(".slide-fade-in");

// define observer
const slideFadeObserver = new IntersectionObserver(
	(entries, slideFadeObserver) => {
		for (const entry of entries) {
			// if not intersecting, do nothing
			if (!entry.isIntersecting) {
				return;
			}

			// once intersecting, bring into view
			entry.target.classList.remove("slide-fade-in--hidden");
			slideFadeObserver.unobserve(entry.target);
		}
	},
	{
		rowMargin: "0 0 -350px 0",
	},
);

// observe all .slide-fade-in elements
for (const slider of slideFaders) {
	slideFadeObserver.observe(slider);
}
