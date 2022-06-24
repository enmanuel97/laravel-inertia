<template>
	<nav>
		<ul class="flex list-disc space-x-4 list-inside">
			<li>
				<NavLink
					href="/"
					:active="$page.url === '/'"
				>
					Home
				</NavLink>
			</li>
			<li>
				<NavLink
					href="/users"
					:active="$page.url === '/users'"
				>
					Users
				</NavLink>
			</li>
			<li>
				<NavLink
					href="/settings"
					:active="$page.url === '/settings'"
				>
					Settings
				</NavLink>
			</li>
		</ul>
	</nav>
</template>
<script>
import NavLink from './NavLink';
export default {
	components: {
		NavLink
	}
}
</script>
