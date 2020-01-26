export default class {
	constructor({
		id,
	}) {
		const el = document.getElementById(id);

		const grid = el.querySelector('.grid');

		setTimeout(() => {
			grid.classList.add("in-view");
		}, 0);
	}
}
