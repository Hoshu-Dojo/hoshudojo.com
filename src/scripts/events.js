const subNav = document.getElementById("subnav");
const subNavItems = subNav.querySelectorAll("a");

const openSubNav = () => {
	subNav.setAttribute("data-open", "true");
	subNav.setAttribute("aria-expanded", "true");

	for (const item of subNavItems) {
		item.setAttribute("aria-hidden", "false");
	}
};

const closeSubNav = () => {
	subNav.setAttribute("data-open", "false");
	subNav.setAttribute("aria-expanded", "false");

	for (const item of subNavItems) {
		item.setAttribute("aria-hidden", "true");
	}
};

const toggleSubNav = (e) => {
	e.stopPropagation();

	const isOpen = subNav.getAttribute("data-open") === "true";

	isOpen ? closeSubNav() : openSubNav();
};

const handleBodyClick = (e) => {
	e.stopPropagation();

	const isInSubNav = subNav.contains(e.target);

	if (!isInSubNav) {
		closeSubNav();
	}
};

subNav.addEventListener("click", toggleSubNav);
document.addEventListener("click", handleBodyClick);
document.addEventListener("keydown", (e) => {
	const navIsOpen = subNav.getAttribute("data-open") === "true";

	if (navIsOpen && e.key === "Escape") {
		toggleMenu();
	}
});
