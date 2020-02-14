export default class {
	constructor({
		id,
	}) {
		const el = document.getElementById(id);
		const productTiles = el.querySelectorAll('article.product-tile');
		const orientations = Array.from(productTiles)
			.reduce((acc, cur) => (
				acc.concat(Array.from(cur.querySelectorAll('nav img')))
			), []);

		function handleHover(e) {
			const orientation = e.currentTarget;
			const featured = orientation
				.closest('article.product-tile')
				.querySelector('a > img');

			featured.setAttribute('src', orientation.getAttribute('src'));
		}

		orientations.forEach(o => {
			o.addEventListener('mouseover', handleHover);
		});
	}
}
