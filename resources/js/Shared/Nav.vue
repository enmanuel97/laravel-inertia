<template>
	<nav>
		<ul class="flex space-x-6">
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
			<li>
				<NavLink
					href="/logout"
					method="post"
					as="button"
				>
					Log Out
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
