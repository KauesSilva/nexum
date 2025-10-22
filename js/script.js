//Expand Header Navgation Function
function expandNavgation() {
	let navgation = document.querySelector(".header .main-navgation");
	let toggleMenu = document.querySelector(".header .burger-menu");
	let icon = toggleMenu.querySelector(".icon");
	let closed = true;

	toggleMenu.addEventListener("click", () => {
		// Change Icon
		if (icon.classList.contains("bi-list")) {
			icon.className = "bi bi-x";
		} else {
			icon.className = "bi bi-list";
		}

		// Open Or Close Navgation Menu
		let navgationHeight = navgation.scrollHeight;
		if (closed) {
			navgation.style.height = `${navgationHeight}px`;
		} else {
			navgation.style.height = "";
		}
		closed = !closed;
	});
	// Close Navgation For Devices Greater Than 992px Width.
	window.addEventListener("resize", () => {
		if (window.innerWidth > 992) {
			icon.className = "bi bi-list icon";
			navgation.style.height = "";
			closed = true;
		}
	});
}
expandNavgation();