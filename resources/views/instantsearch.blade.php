<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instant Search</title>
	
	<style>
	.Input{
		position: relative;
	}
	.search-input-text {
		display: block;
		margin: 0;
		padding: 0.8rem 1.6rem;
		color: inherit;
		width: 100%;
		font-family: inherit;
		font-size: 2.1rem;
		font-weight: inherit;
		line-height: 1.8;
		border: none;
		border-radius: 0.4rem;
		transition: box-shadow 300ms;
		border: 1px solid grey;
	}
	.search-input-text:focus{
		outline: none;
	}


</style>
</head>
<body>
	<div id="app">
		<ais-index app-id="{{ config('scout.algolia.id') }}"
		api-key="{{ env('ALGOLIA_SEARCH') }}"
		index-name="contacts">
		<div class="Input">
			<ais-input placeholder="Search contacts..." id="search-input" 
			:class-names="{
			'ais-input': 'search-input-text',

		}
		">
	</div>

</ais-input>

<ais-results>
	<template scope="{ result }">
		<div>
			<h1>@{{ result.name }}</h1>
			<h4>@{{ result.company }} - @{{ result.state }}</h4>
			<ul>
				<li>@{{ result.email }}</li>
			</ul>
		</div>
	</template>
</ais-results>


</ais-index>
</div>
<script src="/js/instantsearch.js"></script>

</body>
</html>