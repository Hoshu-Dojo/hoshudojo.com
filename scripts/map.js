// get the pin groups
const mapPins = document.querySelectorAll(".locations__map-pin");

// define event handler
const handlePinClick = (e, popup, parentPin) => {
	e.preventDefault();
	e.stopPropagation();

	// either 'true' or 'false'
	const popupState = popup.getAttribute("data-open");

	if (popupState === "true") {
		popup.setAttribute("data-open", "false");
	}

	if (popupState === "false") {
		popup.setAttribute("data-open", "true");
	}

	// close any other open pop-ups
	for (const pin of mapPins) {
		const pinPopup = pin.querySelector(".map-pop-up");

		// close any open pop-ups that are not the current
		if (pin.id !== parentPin.id) {
			pinPopup.setAttribute("data-open", "false");
		}
	}
};

for (const pin of mapPins) {
	const button = pin.querySelector("button.map-pin");
	const popup = pin.querySelector(".map-pop-up");

	// assign event handler to button
	button.addEventListener("click", (e) => handlePinClick(e, popup, pin));
}

// allow 'un-focused' click to close open pop-ups
const handleBodyClick = (e) => {
	e.stopPropagation();

	const targetParent = e.target.closest(".locations__map-pin");

	for (const pin of mapPins) {
		const popup = pin.querySelector(".map-pop-up");

		// close pop-ups except if it's part of the event target
		if (targetParent?.id !== pin.id) {
			popup.setAttribute("data-open", "false");
		}
	}
};

document.addEventListener("click", handleBodyClick);

// --------------

// get location list links
const locationLinks = document.querySelectorAll("[data-dojo-link]");

// add attribute to the related pin
const handleMouseEnter = (mapPin) => {
	mapPin.setAttribute("data-link-hovered", "true");
};

// remove attribute to the related pin
const handleMouseLeave = (mapPin) => {
	mapPin.removeAttribute("data-link-hovered");
};

for (const link of locationLinks) {
	const slug = link.getAttribute("data-dojo-link");
	const matchingPin = document.querySelector(
		`.locations__map-pin--${slug} button`,
	);

	// listen to mouse events for links
	link.addEventListener("mouseenter", () => handleMouseEnter(matchingPin));
	link.addEventListener("mouseleave", () => handleMouseLeave(matchingPin));
}
