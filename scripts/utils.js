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

/**
 * DESKTOP NAV
 */

const determineNavAnimation = (_e) => {
	const desktopNavbar = document.getElementById("desktop-nav");
	const currentPath = document.location.pathname;

	const lastVisit = sessionStorage.getItem("lastVisit");
	const lastVisitDate = new Date(lastVisit);

	const oneWeekAgo = new Date(Date.now());
	oneWeekAgo.setDate(oneWeekAgo.getDate() - 7);

	// animation is only a nice touch on first load, but shouldn't provide a poor UX
	const isAnimating = currentPath === "/" && lastVisitDate < oneWeekAgo;

	desktopNavbar.setAttribute("data-animate", isAnimating);
	sessionStorage.setItem("lastVisit", new Date(Date.now()).toJSON());
};

determineNavAnimation();

/**
 * GENERAL FORM INTERACTIONS
 */

const toggleButtonLoadingState = (buttonEl, isLoading) => {
	if (isLoading) {
		buttonEl.setAttribute("disabled", "true");
		buttonEl.classList.add("button--loading");
	}

	if (!isLoading) {
		buttonEl.removeAttribute("disabled");
		buttonEl.classList.remove("button--loading");
	}
};

// options: 'exclaim' | 'check', or a manual file path
const createIconElement = (icon) => {
	const iconEl = document.createElement("img");
	iconEl.alt = "";
	iconEl.ariaHidden = "true";
	iconEl.classList.add("icon");

	switch (icon) {
		case "exclaim":
			iconEl.src = "/assets/icons/exclamation-circle.svg";
			break;
		case "check":
			iconEl.src = "/assets/icons/check-circle.svg";
			break;
		default:
			iconEl.src = icon;
			break;
	}

	return iconEl;
};

const resetFormFeedback = (formErrorsEl, formSuccessEl) => {
	formErrorsEl.replaceChildren();
	formSuccessEl.replaceChildren();
};
