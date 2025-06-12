const contactForm = document.getElementById("contact-form");
const submitButton = contactForm.querySelector("button[type=submit]");
const formErrors = contactForm.querySelector(".form-errors");
const formSuccess = contactForm.querySelector(".form-success");

// errors as array of fields, eg. ['name', 'email', 'captcha']
const buildFormErrorsElement = (errors) => {
	if (!errors.length) {
		return;
	}

	const pTag = document.createElement("p");
	const exclaimIcon = document.createElement("img");
	exclaimIcon.src = "/assets/icons/exclamation-circle.svg";
	exclaimIcon.alt = "";
	exclaimIcon.ariaHidden = "true";
	exclaimIcon.classList.add("icon");

	pTag.appendChild(exclaimIcon);
	pTag.append("Please correct the following errors and re-submit:");

	const errorList = document.createElement("ul");

	const nameError = document.createElement("li");
	nameError.innerText = "Name is required";

	const emailError = document.createElement("li");
	emailError.innerText = "Email is required";

	const captchaError = document.createElement("li");
	captchaError.innerText = "Please verify the captcha";

	if (errors.includes("name")) {
		errorList.appendChild(nameError);
	}

	if (errors.includes("email")) {
		errorList.appendChild(emailError);
	}

	if (errors.includes("captcha")) {
		errorList.appendChild(captchaError);
	}

	formErrors.appendChild(pTag);
	formErrors.appendChild(errorList);
	formErrors.focus();
};

const buildFormSubmitErrorElement = () => {
	const pTag = document.createElement("p");
	const exclaimIcon = document.createElement("img");
	exclaimIcon.src = "/assets/icons/exclamation-circle.svg";
	exclaimIcon.alt = "";
	exclaimIcon.ariaHidden = "true";
	exclaimIcon.classList.add("icon");

	pTag.appendChild(exclaimIcon);
	pTag.append(
		"Something went wrong, your request could not be submitted. Please try again later.",
	);

	formErrors.appendChild(pTag);
	formErrors.focus();
};

const buildFormSuccessMessage = () => {
	const pTag = document.createElement("p");
	const checkIcon = document.createElement("img");
	checkIcon.src = "/assets/icons/check-circle.svg";
	checkIcon.alt = "";
	checkIcon.ariaHidden = "true";
	checkIcon.classList.add("icon");

	pTag.appendChild(checkIcon);
	pTag.append("Your request has been submitted! Thank you for reaching out.");

	formSuccess.appendChild(pTag);
	formSuccess.focus();
};

const markErrorFields = (errors) => {
	const nameField = contactForm.querySelector(".field:has(input#contact-name)");
	const emailField = contactForm.querySelector(
		".field:has(input#contact-email",
	);

	if (errors.includes("name")) {
		nameField.classList.add("error");
	}

	if (errors.includes("email")) {
		emailField.classList.add("error");
	}
};

const resetFormErrors = () => {
	const formErrors = contactForm.querySelector(".form-errors");
	formErrors.replaceChildren();
};

const validate = (formDataObject) => {
	const validationErrors = [];

	if (!formDataObject.name.trim()) {
		validationErrors.push("name");
	}

	if (!formDataObject.email.trim()) {
		validationErrors.push("email");
	}

	if (!formDataObject["h-captcha-response"]) {
		validationErrors.push("captcha");
	}

	if (validationErrors.length) {
		markErrorFields(validationErrors);
		buildFormErrorsElement(validationErrors);
		return false;
	}

	return true;
};

const handleSubmit = async (e) => {
	e.preventDefault();
	resetFormErrors();

	// put button in loading state
	submitButton.setAttribute("disabled", "true");

	const remappedInterests = {
		jodo: "Jodo",
		"daito-ryu": "Daito Ryu",
	};

	const remappedLocations = {
		portland: "Hoshu Dojo Portland",
		seattle: "Hoshu Dojo Seattle",
		vancouver: "Hoshu Dojo Vancouver",
		other: "Other (see comments)",
	};

	const formData = new FormData(e.target);

	// get multi-checkbox values
	const areasOfInterest = formData.getAll("interest");
	const locations = formData.getAll("location");

	const { location, interest, ...fields } = Object.fromEntries(
		formData.entries(),
	);

	const formDataObject = {
		...fields,
		"interest(s)": areasOfInterest.length
			? areasOfInterest.map((val) => remappedInterests[val]).join("\n")
			: "None specified",
		"location(s)": locations.length
			? locations.map((val) => remappedLocations[val]).join("\n")
			: "None specified",
		questions: fields.questions || "None specified",
	};

	try {
		const isValid = validate(formDataObject);

		if (!isValid) {
			return;
		}

		const response = await fetch("https://api.web3forms.com/submit", {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				Accept: "application/json",
			},
			body: JSON.stringify(formDataObject),
		});
		const jsonResponse = await response.json();

		if (!jsonResponse.success) {
			throw new Error("Submit failed");
		}

		// render success message
		buildFormSuccessMessage();

		contactForm.reset();
	} catch {
		// render on screen message
		buildFormSubmitErrorElement();
	} finally {
		submitButton.removeAttribute("disabled");
	}
};

contactForm.addEventListener("submit", handleSubmit);
