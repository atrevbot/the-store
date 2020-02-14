<?php

/**
 * Main layout
 */

// Variables
$products = [
    [
        'thumbs' => [
            ['url' => '/public/images/products/1a.jpg', 'title' => ''],
            ['url' => '/public/images/products/1b.jpg', 'title' => ''],
            ['url' => '/public/images/products/1d.jpg', 'title' => ''],
            ['url' => '/public/images/products/1c.jpg', 'title' => ''],
        ],
        'name' => 'Product 1',
        'url' => '/products/1'
    ],
    [
        'thumbs' => [
            ['url' => '/public/images/products/1a.jpg', 'title' => ''],
            ['url' => '/public/images/products/1b.jpg', 'title' => ''],
            ['url' => '/public/images/products/1d.jpg', 'title' => ''],
            ['url' => '/public/images/products/1c.jpg', 'title' => ''],
        ],
        'name' => 'Product 2',
        'url' => '/products/2',
    ],
    [
        'thumbs' => [
            ['url' => '/public/images/products/1a.jpg', 'title' => ''],
            ['url' => '/public/images/products/1b.jpg', 'title' => ''],
            ['url' => '/public/images/products/1d.jpg', 'title' => ''],
            ['url' => '/public/images/products/1c.jpg', 'title' => ''],
        ],
        'name' => 'Product 3',
        'url' => '/products/3',
    ],
];
$processSteps = [
    ['heading' => 'Choose your design.'],
    ['heading' => 'Schedule your date.'],
    ['heading' => 'Ship helmet via provided label.'],
    ['heading' => 'Your design is completed the same day.'],
    ['heading' => 'Helmet is returned to you within 2 days*.'],
];

// Markup?>

<!doctype html>
<html class="no-js" lang="">
    <?php include '../templates/_components/head.php'; ?>

	<body>
		<script>
			window["the-store"] = { components: [], state: {} };
		</script>

		<main id="main" class="main">
			<header class="hero">
				<img src="" alt="Placeholder IMG" />
				<h1>Page Heading Hero Text</h1>
				<p>Some intro text the leads into a CTA</p>
				<a href="#" title="Click to...">Discover</a>
			</header>

			<section class="intro">
				<h2>We Make Helmets</h2>
				<p>Some information about the helpmets that we like to make and what our process is.</p>
				<a href="/shop" title="Show Collections">Show Collections</a>
			</section>

			<?php
            // <section class="overview">
            // 	<img src="" alt="Placeholder IMG" />
            // 	<div>
            // 		<h4>Intro Subheading</h4>
            // 		<h2>Section Heading Text to Lead</h2>
            // 		<p>Some longer body copy. Could be a couple of line is need be</p>
            // 		<p>And maybe another line of it. And there wil be a larger image in here somewhere.</p>
            // 		<a href="#" title="Click to...">Discover</a>
            // 	</div>
            // </section>
            ?>

			<?php if (count($products) > 0) : ?>
				<section class="grid">
					<?php foreach ($products as $p) : ?>
						<?php $featured = $p['thumbs'][0] ?? null; ?>

						<article class="product-tile">
							<?php if ($featured) : ?>
								<a
									href="<?= $p['url'] ?>"
									title="<?= $p['name'] ?>">
									<img
										src="<?= $featured['url'] ?>"
										alt="<?= $p['name'] ?> product image" />
								</a>
							<?php endif; ?>
							<?php if (count($p['thumbs']) > 1) : ?>
								<nav>
									<?php foreach ($p['thumbs'] as $t) : ?>
										<img
											src="<?= $t['url'] ?>"
											alt="<?= $p['name'] ?> product image" />
									<?php endforeach; ?>
								</nav>
							<?php endif; ?>
							<h3><?= $p['name'] ?></h3>
						</article>
					<?php endforeach; ?>
				</section>
			<?php endif ; ?>

			<section class="background-callout">
				<div>
					<h2>Create Your Own</h2>
					<p>Custom designs starting at $200</p>
					<a href="/contact" title="Contact">Contact</a>
				</div>
			</section>

			<section class="ordered-list">
				<h2>How it works</h2>
				<?php if (count($processSteps) > 0) : ?>
					<ol>
						<?php foreach ($processSteps as $i => $s) : ?>
							<li>
								<em><?= $i ?></em>
								<h3><?= $s['heading'] ?></h3>
							</li>
						<?php endforeach; ?>
					</ol>
				<?php endif; ?>
				<a href="/process" title="Learn More">Learn More<em>&rarr;</em></a>
			</section>

			<hr />

			<section id="form">
				<form action="/public#form" method="get">
					<h3>Some heading about the form.</h3>
					<label for="name">Your name</label>
					<input
						required
						id="name"
						type="text"
						name="name"
						placeholder="George Costanza"
						value="<?= $_GET['name'] ?? '' ?>" />
					<label for="living">Your living situation</label>
					<input
						id="living"
						type="text"
						name="living"
						placeholder="At home w/ my parents."
						value="<?= $_GET['living'] ?? '' ?>" />
					<label for="employed">Are you currently employed?</label>
					<fieldset>
						<label for="yes">
							<input
								id="yes"
								type="radio"
								name="employed"
								value="Yes"
								<?= $_GET['employed'] ?? '' === 'Yes' ? 'checked' : '' ?> />
							Yes
						</label>
						<label for="no">
							<input
								id="no"
								type="radio"
								name="employed"
								value="No"
								<?= $_GET['employed'] ?? '' === 'No' ? 'checked' : '' ?> />
							No
						</label>
					</fieldset>
					<label for="message">How can we help?</label>
					<textarea
						id="number"
						name="message"
						placeholder="If I had known that sort of thing was frowned on here..."
						><?= $_GET['message'] ?? '' ?></textarea>
					<label for="pester">Can we call you at home?</label>
					<fieldset>
						<label for="yes">
							<input
								id="yes"
								type="checkbox"
								name="pester"
								value="Yes"
								<?= $_GET['pester'] ?? '' === 'Yes' ? 'checked' : '' ?> />
							Yes
						</label>
					</fieldset>
					<fieldset>
						<input type="reset" value="Cancel" />
						<input type="submit" value="Submit" />
					</fieldset>
				</form>
			</section>

			<script>
				window["the-store"].components.push({
					handle: "main",
					id: "main",
				});
			</script>
		</main>

		<script src="/public/scripts/index.js"></script>
	</body>
</html>
