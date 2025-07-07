const contactForm = document.getElementById("contact-form");
const contactFormSubmitButton = contactForm.querySelector(
	"button[type=submit]",
);
const contactFormErrors = contactForm.querySelector(".form-errors");
const contactFormSuccess = contactForm.querySelector(".form-success");

// errors as array of fields, eg. ['name', 'email', 'captcha']
const buildContactFormErrorsElement = (errors) => {
	if (!errors.length) {
		return;
	}

	const pTag = document.createElement("p");
	const exclaimIcon = createIconElement("exclaim");

	pTag.appendChild(exclaimIcon);
	pTag.append("Please correct the following errors and re-submit:");

	const errorList = document.createElement("ul");

	if (errors.includes("name")) {
		const nameError = document.createElement("li");
		nameError.innerText = "Name is required";
		errorList.appendChild(nameError);
	}

	if (errors.includes("email")) {
		const emailError = document.createElement("li");
		emailError.innerText = "Email is required";
		errorList.appendChild(emailError);
	}

	if (errors.includes("captcha")) {
		const captchaError = document.createElement("li");
		captchaError.innerText = "Please verify the captcha";
		errorList.appendChild(captchaError);
	}

	contactFormErrors.appendChild(pTag);
	contactFormErrors.appendChild(errorList);
	contactFormErrors.focus();
};

const buildContactFormSubmitErrorElement = () => {
	const pTag = document.createElement("p");
	const exclaimIcon = createIconElement("exclaim");

	pTag.appendChild(exclaimIcon);
	pTag.append(
		"Something went wrong, your request could not be submitted. Please try again later.",
	);

	contactFormErrors.appendChild(pTag);
	contactFormErrors.focus();
};

const buildContactFormSuccessMessage = () => {
	const pTag = document.createElement("p");
	const checkIcon = createIconElement("check");

	pTag.appendChild(checkIcon);
	pTag.append("Your request has been submitted! Thank you for reaching out.");

	contactFormSuccess.appendChild(pTag);
	contactFormSuccess.focus();
};

const markContactFormErrorFields = (errors) => {
	const nameField = contactForm.querySelector(".field:has(input#contact-name)");
	const emailField = contactForm.querySelector(
		".field:has(input#contact-email)",
	);

	if (errors.includes("name")) {
		nameField.classList.add("error");
	}

	if (errors.includes("email")) {
		emailField.classList.add("error");
	}
};

const validateContactForm = (formDataObject) => {
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
		markContactFormErrorFields(validationErrors);
		buildContactFormErrorsElement(validationErrors);
		return false;
	}

	return true;
};

const handleContactFormSubmit = async (e) => {
	e.preventDefault();
	resetFormFeedback(contactFormErrors, contactFormSuccess);

	// put button in loading state
	toggleButtonLoadingState(contactFormSubmitButton, true);

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

	try {
		const formDataObject = {
			...Object.fromEntries(
				Object.entries(fields).map(([fieldKey, fieldValue]) => [
					encodeURIComponent(fieldKey),
					encodeURIComponent(fieldValue),
				]),
			),
			"interest(s)": areasOfInterest.length
				? areasOfInterest
						.map((val) => encodeURIComponent(remappedInterests[val]))
						.join("\n")
				: "None specified",
			"location(s)": locations.length
				? locations
						.map((val) => encodeURIComponent(remappedLocations[val]))
						.join("\n")
				: "None specified",
			questions: encodeURIComponent(fields.questions) || "None specified",
		};

		const isValid = validateContactForm(formDataObject);

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
		buildContactFormSuccessMessage();

		contactForm.reset();
	} catch {
		// render on screen message
		buildContactFormSubmitErrorElement();
	} finally {
		toggleButtonLoadingState(contactFormSubmitButton, false);
	}
};

contactForm.addEventListener("submit", handleContactFormSubmit);
