const mailingListForm = document.getElementById("mc-embedded-subscribe-form");
const mailingListSubmitButton = mailingListForm.querySelector(
	"button[type=submit]",
);
const mailingListFormErrors = mailingListForm.querySelector(".form-errors");
const mailingListFormSuccess = mailingListForm.querySelector(".form-success");

const buildMailingListFormErrorsElement = (errors) => {
	if (!errors.length) {
		return;
	}

	const pTag = document.createElement("p");
	const exclaimIcon = createIconElement("exclaim");

	pTag.appendChild(exclaimIcon);
	pTag.appendChild("Please correct the following errors and re-submit:");

	const errorList = document.createElement("ul");

	if (errors.includes("email")) {
		const emailError = document.createElement("li");
		emailError.innerText = "Email is required";
		errorList.appendChild(emailError);
	}

	mailingListFormErrors.appendChild(pTag);
	mailingListFormErrors.appendChild(errorList);
	mailingListFormErrors.focus();
};

const buildMailingListFormSubmitErrorElement = (message) => {
	const pTag = document.createElement("p");
	const exclaimIcon = createIconElement("exclaim");

	pTag.appendChild(exclaimIcon);
	pTag.append(
		message ||
			"Something went wrong, your request could not be submitted. Please try again later.",
	);

	mailingListFormErrors.appendChild(pTag);
	mailingListFormErrors.focus();
};

const buildMailingListFormSuccessMessage = (message) => {
	const pTag = document.createElement("p");
	const checkIcon = createIconElement("check");

	pTag.appendChild(checkIcon);
	pTag.appendChild(
		message ||
			"Your subscription request has been submitted! Thank you for your interest.",
	);

	mailingListFormSuccess.appendChild(pTag);
	mailingListFormSuccess.focus();
};

const markMailingListFormErrorFields = (errors) => {
	const emailField = mailingListForm.querySelector(
		".field:has(input#mce-EMAIL)",
	);

	if (errors.includes("email")) {
		emailField.classList.add("error");
	}
};

const validateMailingListForm = (formDataObject) => {
	const validationErrors = [];

	if (!formDataObject.EMAIL.trim()) {
		validationErrors.push("email");
	}

	if (validationErrors.length) {
		markMailingListFormErrorFields(validationErrors);
		buildMailingListFormErrorsElement(validationErrors);
		return false;
	}

	return true;
};

const handleMailingListSubmit = async (e) => {
	e.preventDefault();
	resetFormFeedback(mailingListFormErrors, mailingListFormSuccess);

	// put button in loading state
	toggleButtonLoadingState(mailingListSubmitButton, true);

	const formData = new FormData(e.target);
	const { EMAIL, FNAME, LNAME, ...rest } = Object.fromEntries(
		formData.entries(),
	);

	try {
		const formDataObject = {
			EMAIL: encodeURIComponent(EMAIL.trim()),
			...Object.fromEntries(
				Object.entries(rest).map(([fieldKey, fieldValue]) => [
					encodeURIComponent(fieldKey),
					encodeURIComponent(fieldValue),
				]),
			),
		};

		if ((FNAME || "").trim()) {
			formDataObject.FNAME = encodeURIComponent(FNAME.trim());
		}

		if ((LNAME || "").trim()) {
			formDataObject.LNAME = encodeURIComponent(LNAME.trim());
		}

		const isValid = validateMailingListForm(formDataObject);

		if (!isValid) {
			return;
		}

		let mailchimpURL = mailingListForm.getAttribute("action");
		mailchimpURL = mailchimpURL.replace("/post?u=", "/post-json?u=");

		// submit to Mailchimp
		const response = await fetch(mailchimpURL, {
			method: "POST",
			body: JSON.stringify(formDataObject),
		});
		const jsonResponse = await response.json();

		if (!jsonResponse.result !== "success") {
			throw new Error(jsonResponse.result.msg);
		}

		// render success message
		buildMailingListFormSuccessMessage(jsonResponse.result.msg);

		mailingListForm.reset();
	} catch (error) {
		let errorMessage;

		if (error instanceof Error && error.message !== "Failed to fetch") {
			errorMessage = error.message;
		}

		// render on screen message
		buildMailingListFormSubmitErrorElement(errorMessage);
	} finally {
		toggleButtonLoadingState(mailingListSubmitButton, false);
	}
};

mailingListForm.addEventListener("submit", handleMailingListSubmit);
