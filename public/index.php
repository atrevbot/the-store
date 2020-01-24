<?php

/**
 * Main layout
 */

// Variables
$headings = ['Large', 'Medium', 'Small', 'Extra Small'];
$bodys = ['Large', 'Medium', 'Small'];
$articles = [
	[
		'image' => [ 'url' => '', 'title' => 'Placeholder IMG' ],
		'heading' => 'Article Heading',
		'subheading' => 'Subheading / Category / Date',
		'teaser' => 'Teaser copy of around two to three lines of small text...',
		'cta' => [ 'url' => '', 'title' => 'Link/CTA' ],
	],
	[
		'image' => [ 'url' => '', 'title' => '' ],
		'heading' => 'Article Heading',
		'subheading' => 'Subheading / Category / Date',
		'teaser' => 'Teaser copy of around two to three lines of small text...',
		'cta' => [ 'url' => '', 'title' => 'Link/CTA' ],
	],
];

// Markup ?>

<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="/public/styles/index.css">
	</head>

	<body>
		<script>
			window["the-store"] = { components: [], state: {} };
		</script>

		<main id="main" class="main">
			<header>
				<img src="" alt="Placeholder IMG" />
				<h1>Page Heading Hero Text</h1>
				<p>Some intro text the leads into a CTA</p>
				<a href="#" title="Click to...">Discover</a>
			</header>

			<section>
				<img src="" alt="Placeholder IMG" />
				<div>
					<h4>Intro Subheading</h4>
					<h2>Section Heading Text to Lead</h2>
					<p>Some longer body copy. Could be a couple of line is need be</p>
					<p>And maybe another line of it. And there wil be a larger image in here somewhere.</p>
					<a href="#" title="Click to...">Discover</a>
				</div>
			</section>

			<hr />

			<?php if (count($articles) > 0) : ?>
				<div class="grid">
					<?php foreach ($articles as $a) : ?>
						<article>
							<?php if (!empty($a['image'])) : ?>
								<img
									src="<?= $a['image']['url'] ?>"
									alt="<?= $a['image']['title'] ?>" />
							<?php endif; ?>
							<h3><?= $a['heading'] ?></h3>
							<h5><?= $a['subheading'] ?></h6>
							<p><?= $a['teaser'] ?></p>
							<?php if (!empty($a['cta'])) : ?>
								<a
									href="<?= $a['cta']['url'] ?>"
									title="<?= $a['cta']['title'] ?>">
									<?= $a['cta']['title'] ?>
									<em>&rarr;</em>
								</a>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			<?php endif ; ?>

			<hr />

			<?php foreach ($headings as $i => $h) : ?>
				<h<?= $i + 1 ?>>
					Heading <?= $h ?>
				</h<?= $i + 1 ?>>
			<?php endforeach; ?>
			<?php foreach ($headings as $i => $h) : ?>
				<p>
					Body <?= $h ?>
				</p>
			<?php endforeach; ?>

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
