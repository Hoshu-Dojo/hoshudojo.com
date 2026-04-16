// Meta/oEmbed API is hot garbage, let's just set up a programmatic rotation of photos from a local directory
const pictureElements = document.querySelectorAll(
	".photo-feed__photo-grid picture",
);

const reducedMotionPreference = window.matchMedia(
	"(prefers-reduced-motion: reduce)",
);

const photoSources = document.querySelectorAll("#photo-feed-vars div");
const photoSourceNames = [];

for (const source of photoSources) {
	const filename = source.getAttribute("data-filename");
	photoSourceNames.push(filename);
}

const changePhotoSources = (pictureEl, newSourceName) => {
	const sourceEl = pictureEl.querySelector("source");
	const imgEl = pictureEl.querySelector("img");

	// fade out
	pictureEl.classList.add("fade-out");

	// NOTE: delay is tied to animation transition on picture::before element
	// wait 0.4 seconds for animation to finish
	setTimeout(() => {
		sourceEl.setAttribute("srcset", `/assets/img/insta/${newSourceName}.webp`);
		imgEl.setAttribute("src", `/assets/img/insta/${newSourceName}.jpg`);

		waitForImageRender(imgEl, () => {
			// fade in
			pictureEl.classList.remove("fade-out");
			pictureEl.removeAttribute("class");
		});
	}, 400);
};

const waitForImageRender = (imgEl, callback) => {
	let completeInterval = null;
	let renderedInterval = null;
	let count = 0;
	const maxIterations = 200;

	completeInterval = setInterval(() => {
		++count;

		// cancel check if already complete, or hasn't loaded fast enough
		if (imgEl.complete || count > maxIterations) {
			clearInterval(completeInterval);
			completeInterval = null;
			count = 0;

			if (count > maxIterations) {
				console.error(`ERROR: photo feed failed to load image ${imgEl.src}`);
				return;
			}

			// since imgEl.complete = true, we need to check the natural width/height
			renderedInterval = setInterval(() => {
				if (imgEl.naturalWidth > 0 && imgEl.naturalHeight > 0) {
					clearInterval(renderedInterval);
					renderedInterval = null;

					// if we have the natural width/height, we can proceed!
					callback();
				}
			});
		}
	});
};

const getNewPhotoSource = (pictureElem) => {
	const currentSourceName = pictureElem
		.querySelector("img")
		.getAttribute("src")
		.replaceAll(/\/assets\/img\/insta\/|\.jpg/g, "");

	// find in source list
	const currentIndex = photoSourceNames.findIndex(
		(name) => name === currentSourceName,
	);

	let newIndex = currentIndex + pictureElements.length;

	// if advancing through the list exceeds the list length, loop around
	if (newIndex > photoSourceNames.length - 1) {
		const remainder = photoSourceNames.length - currentIndex;
		newIndex = pictureElements.length - remainder;
	}

	const newSourceName = photoSourceNames[newIndex];

	return newSourceName;
};

// only animate for users who don't have reduced motion preferences
if (
	reducedMotionPreference !== true &&
	reducedMotionPreference.matches !== true
) {
	for (const [index, elem] of Object.entries(pictureElements)) {
		const delay = 150 * index;
		const timeBetweenTransitionsInMS = 12000;

		// initialize with updated image sources
		changePhotoSources(elem, photoSourceNames[index]);

		// set up recurring image transitions
		setTimeout(
			() => {
				setInterval(() => {
					const newPhotoSource = getNewPhotoSource(elem);
					changePhotoSources(elem, newPhotoSource);
				}, timeBetweenTransitionsInMS);
			},
			delay + timeBetweenTransitionsInMS / 2,
		);
	}
}
