/**
 * SLIDE-IN ELEMENTS
 */

// grab .slide-fade-in elements
const slideFaders = document.querySelectorAll(".slide-fade-in");

// first, apply hidden class to all slideFaders once we know JS is enabled
for (const slider of slideFaders) {
	slider.classList.add("slide-fade-in--hidden");
}

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

/**
 * MOBILE NAV
 */

const mobileNavLauncher = document.querySelector("#mobile-nav > button");
const mobileNavMenu = document.querySelector("#mobile-nav nav");
const mobileNavLinks = document.querySelectorAll("#mobile-nav a");
const svg = document.getElementById("menu-icon");
const menuToHam = document.getElementById("x-to-ham");
const menuToClose = document.getElementById("ham-to-x");

const toggleHamburgerAnimate = (isOpen) => {
	if (!isOpen) {
		menuToClose.beginElement();
		mobileNavLauncher.setAttribute("aria-label", "Close menu");
	}

	if (isOpen) {
		menuToHam.beginElement();
		mobileNavLauncher.setAttribute("aria-label", "Open menu");
	}
};

const stopBubbling = (e) => {
	e.stopPropagation();
};

const openNav = () => {
	mobileNavMenu.setAttribute("data-open", "true");

	// trap focus to header elements
	const nonHeaderItems = document.querySelectorAll("body > :not(header)");

	for (const item of nonHeaderItems) {
		item.setAttribute("inert", "true");
	}
};

const closeNav = () => {
	mobileNavMenu.setAttribute("data-open", "false");

	// remove focus trapping
	const nonHeaderItems = document.querySelectorAll("body > :not(header)");

	for (const item of nonHeaderItems) {
		item.removeAttribute("inert");
	}
};

const toggleMenu = () => {
	const isOpen = mobileNavMenu.getAttribute("data-open") === "true";

	toggleHamburgerAnimate(isOpen);

	if (isOpen) {
		closeNav();
	}

	if (!isOpen) {
		openNav();
	}
};

mobileNavLauncher.addEventListener("click", toggleMenu);
document.addEventListener("keydown", (e) => {
	const navIsOpen = mobileNavMenu.getAttribute("data-open") === "true";

	if (navIsOpen && e.key === "Escape") {
		toggleMenu();
	}
});

for (const link of mobileNavLinks) {
	link.addEventListener("click", toggleMenu);
}
